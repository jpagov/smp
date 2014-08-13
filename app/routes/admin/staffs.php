<?php

Route::collection(array('before' => 'auth,csrf'), function() {

    /*
        List staffs
    */
    Route::get(array('admin/staffs', 'admin/staffs/(:num)'), function($page = 1) {

        $vars['messages'] = Notify::read();
        $vars['staffs'] = Staff::paginate($page, Config::get('meta.staffs_per_page'));
        $vars['divisions'] = Division::listing();
        $vars['status'] = 'all';

        return View::create('staffs/index', $vars)
            ->partial('header', 'partials/header')
            ->partial('footer', 'partials/footer');
    });

    /*
    List staffs by department and paginate through them
    */
    Route::get(array(
        'admin/staffs/division/(:any)',
        'admin/staffs/division/(:any)/(:num)',
        'admin/staffs/division/(:any)/status/(:any)',
        'admin/staffs/division/(:any)/status/(:any)/(:num)'), function(
            $slug,
            $status = 1,
            $page = 1) {

        $statuses = false;
        $pager = $status;

        if (!ctype_digit($status)) {
            $pager = $page;
            $statuses = true;
        }

        $division = Division::slug($slug)->id;

        $query = Staff::where('division', '=', $division);

        if ($statuses) {
            $query = $query->where('status', '=', $status);
        }

        $perpage = Config::meta('staffs_per_page');
        $total = $query->count();
        $staffs = $query->sort('grade', 'desc')->take($perpage)->skip(($pager - 1) * $perpage)->get();

        $url = Uri::to('admin/staffs/division/' . $slug);

        if ($statuses) {
            $url .= '/' . 'status/' . $status;
        }

        $pagination = new Paginator($staffs, $total, $pager, $perpage, $url);

        $vars['messages'] = Notify::read();
        $vars['staffs'] = $pagination;
        $vars['divisions'] = Division::listing();
        $vars['division'] = $slug;
        $vars['status'] = $statuses ? $status : 'all';

        return View::create('staffs/index', $vars)
          ->partial('header', 'partials/header')
          ->partial('footer', 'partials/footer');

    });

    /*
    List staffs by status and paginate through them
    */
    Route::get(array(
        'admin/staffs/status/(:any)',
        'admin/staffs/status/(:any)/(:num)'), function($status, $page = 1) {

        $query = Staff::where('status', '=', $status);

        $perpage = Config::meta('staffs_per_page');
        $total = $query->count();
        $staffs = $query->sort('grade', 'desc')->take($perpage)->skip(($page - 1) * $perpage)->get();
        $url = Uri::to('admin/staffs/status/' . $status);

        $pagination = new Paginator($staffs, $total, $page, $perpage, $url);

        $vars['messages'] = Notify::read();
        $vars['staffs'] = $pagination;
        $vars['status'] = $status;

        return View::create('staffs/index', $vars)
          ->partial('header', 'partials/header')
          ->partial('footer', 'partials/footer');

    });



    /*
        Edit staff
    */
    Route::get('admin/staffs/edit/(:num)', function($id) {
        $vars['messages'] = Notify::read();
        $vars['token'] = Csrf::token();
        $vars['staff'] = Staff::find($id);
        $vars['fields'] = Extend::fields('staff', $id);
        $division_roles = array();

        if ($branch = Branch::find($vars['staff']->branch)) {
          $vars['staff']->branch = $branch->title;
        }

        if ($sector = Sector::find($vars['staff']->sector)) {
          $vars['staff']->sector = $sector->title;
        }

        if ($unit = Unit::find($vars['staff']->unit)) {
          $vars['staff']->unit = $unit->title;
        }

        // get current staff division role
        if ($staff_roles = Role::where('staff', '=', $id)->get(array('division'))) {
          foreach ($staff_roles as $div) {
            $division_roles[] = $div->division;

          }
        }

        $vars['division_roles'] = $division_roles;

        /*
        $hierarchies = Hierarchy::where('staff', '=', $id)->fetch();

        $vars['staff']->division = $hierarchies->division;
        $vars['staff']->branch = $hierarchies->branch;
        $vars['staff']->sector = $hierarchies->sector;
        $vars['staff']->unit = $hierarchies->unit;
        */
        foreach (array('Scheme', 'Division', 'Branch', 'Sector', 'Unit') as $hierarchy) {
          $vars[strtolower($hierarchy) . 's'] = $hierarchy::dropdown();
          //array_unshift($vars[strtolower($hierarchy) . 's'], __('staffs.please_select'));

          $vars[strtolower($hierarchy) . 's'] = array_unshift_assoc($vars[strtolower($hierarchy) . 's'], '0', __('staffs.please_select'));
        }

        $vars['genders'] = array(
            'M' => __('staffs.male'),
            'F' => __('staffs.female')
        );

        $vars['statuses'] = array(
            'inactive' => __('global.inactive'),
            'active' => __('global.active')
        );

        $vars['roles'] = array(
            'administrator' => __('global.administrator'),
            'editor' => __('global.editor'),
            'staff' => __('global.staff')
        );

        return View::create('staffs/edit', $vars)
            ->partial('header', 'partials/header')
            ->partial('footer', 'partials/footer');
    });

    Route::post('admin/staffs/edit/(:num)', function($id) {

        $input = Input::get(array(
            'salutation',
            'first_name',
            'last_name',
            'display_name',
            'gender',
            'email',
            'telephone',
            'status',
            'slug',

            'scheme',
            'grade',
            'job_title',
            'position',
            'description',
            'division',

            'account'
        ));

        $account_enable = false;
            $password_reset = false;

        if(empty($input['slug'])) {
          $input['slug'] = $input['display_name'];
        }

        $input['slug'] = slug($input['slug']);

        if ($input['account']) {
          $account_enable = true;
          $input['role'] = Input::get('role');
        } else {
          $input['role'] = 'staff';
        }

        if ($account_enable) {
          if($username = Input::get('username')) {
            $input['username'] = $username;
          }

          if($password = Input::get('password')) {
            $input['password'] = $password;
            $password_reset = true;
          }
        }

        $validator = new Validator($input);

        $validator->add('safe', function($str) use($id) {
            return ($str != 'inactive' and Auth::user()->id == $id);
        });

        $validator->check('email')
          ->is_email(__('staffs.email_missing'));

        $validator->check('telephone')
          ->is_max(4, __('staffs.telephone_missing', 4));

        if($account_enable) {
            $validator->check('username')
                ->is_max(2, __('staffs.username_missing', 2));
        }

        if($password_reset) {
            $validator->check('password')
                ->is_max(6, __('staffs.password_too_short', 6));
        }

        if($errors = $validator->errors()) {
            Input::flash();

            Notify::warning($errors);

            return Response::redirect('admin/staffs/edit/' . $id);
        }

        if($password_reset) {
            $input['password'] = Hash::make($input['password']);
        }

        $hierarchy = array(
          'branch' => 0,
          'sector' => 0,
          'unit' => 0,
        );

        if ($branch = Input::get('branch')) {
          $input['branch'] = Branch::id($branch);
          $hierarchy['branch'] = $input['branch'];
        }

        if ($sector = Input::get('sector')) {
          $input['sector'] = Sector::id($sector);
          $hierarchy['sector'] = $input['sector'];
        }

        if ($unit = Input::get('unit')) {
          $input['unit'] = Unit::id($unit);
          $hierarchy['unit'] = $input['unit'];
        }

        Staff::update($id, $input);

        Extend::process('staff', $id, $input['email']);

        if ($division = $input['division']) {

            $hierarchy['division'] = $division;

            // hierarchy
            if ($exist = Hierarchy::where('staff', '=', $id)->fetch()) {
                Hierarchy::update($exist->id, $hierarchy);
            } else {
                Hierarchy::create($hierarchy);
            }

            Division::counter();

        }

        // division roles
        if($inputroles = Input::get('roles')) {

            $roles = array();
            Role::where('staff', '=', $id)->delete();

            foreach ($inputroles as $div) {
                $roles['staff'] = $id;
                $roles['division'] = $div;
                Role::create($roles);
            }
        }

        Notify::success(__('staffs.updated'));

        return Response::redirect('admin/staffs/edit/' . $id);
    });

    /*
        Add staff
    */
    Route::get('admin/staffs/add', function() {
        $vars['messages'] = Notify::read();
        $vars['token'] = Csrf::token();

        // extended fields
        $vars['fields'] = Extend::fields('staff');

        foreach (array('Scheme', 'Division', 'Branch', 'Sector', 'Unit') as $hierarchy) {
            $vars[strtolower($hierarchy) . 's'] = $hierarchy::dropdown();
            array_unshift($vars[strtolower($hierarchy) . 's'], __('staffs.please_select'));
        }

        $vars['genders'] = array(
            'M' => __('staffs.male'),
            'F' => __('staffs.female')
        );

        $vars['statuses'] = array(
            'inactive' => __('global.inactive'),
            'active' => __('global.active')
        );

        $vars['roles'] = array(
            'administrator' => __('global.administrator'),
            'editor' => __('global.editor'),
            'staff' => __('global.staff')
        );

        return View::create('staffs/add', $vars)
            ->partial('header', 'partials/header')
            ->partial('footer', 'partials/footer');
    });

    Route::post('admin/staffs/add', function() {

        $input = Input::get(array(
            'salutation',
            'first_name',
            'last_name',
            'display_name',
            'gender',
            'email',
            'telephone',
            'status',

            'scheme',
            'grade',
            'job_title',
            'position',
            'description',

            'division',
            'branch',
            'sector',
            'unit',

            'account'
        ));

        if(empty($input['slug'])) {
          $input['slug'] = $input['display_name'];
        }

        $input['slug'] = slug($input['slug']);

        $account_enable = false;
        $password_reset = false;

        if ($input['account']) {
          $account_enable = true;
        } else {
          $input['account'] = 0;
          unset($input['role']);
        }

        if($role = Input::get('role')) {
          $input['role'] = $role;
        }

        if ($account_enable) {
          if($username = Input::get('username')) {
            $input['username'] = $username;
          }

          if($password = Input::get('password')) {
            $input['password'] = $password;
            $password_reset = true;
          }
        }

            $validator = new Validator($input);

        if ($account_enable) {

          $validator->check('username')
            ->is_max(2, __('staffs.username_missing', 2));

          $validator->check('password')
          ->is_max(6, __('staffs.password_too_short', 6));

          $input['password'] = Hash::make($input['password']);

        }

            $validator->check('email')
                ->is_email(__('staffs.email_missing'));

        $validator->check('telephone')
          ->is_max(4, __('staffs.telephone_missing', 4));

            if($errors = $validator->errors()) {
                Input::flash();

                Notify::warning($errors);

                return Response::redirect('admin/staffs/add');
            }

        $hierarchy = array(
          'branch' => 0,
          'sector' => 0,
          'unit' => 0,
        );

        if ($branch = Input::get('branch')) {
          $input['branch'] = Branch::id($branch);
          $hierarchy['branch'] = $input['branch'];
        }

        if ($sector = Input::get('sector')) {
          $input['sector'] = Sector::id($sector);
          $hierarchy['sector'] = $input['sector'];
        }

        if ($unit = Input::get('unit')) {
          $input['unit'] = Unit::id($unit);
          $hierarchy['unit'] = $input['unit'];
        }

        $input['created'] = Date::mysql('now');

        $staff = Staff::create($input);

        Extend::process('staff', $staff->id, $staff->email);

        if ($division = $input['division']) {
          $hierarchy['staff'] = $staff->id;
          $hierarchy['division'] = $division;
          Hierarchy::create($hierarchy);

          Division::counter();
        }

        // division roles
        if( $account_enable and $inputroles = Input::get('roles') ) {

          $roles = array();
          Role::where('staff', '=', $staff->id)->delete();

          foreach ($inputroles as $div) {
            $roles['staff'] = $staff->id;
            $roles['division'] = $div;
            Role::create($roles);
          }
        }

        Notify::success(__('staffs.created'));

        return Response::redirect('admin/staffs');
    });

    /*
        Delete staff
    */
    Route::get('admin/staffs/delete/(:num)', function($id) {
        $self = Auth::user();

        if($self->id == $id) {
            Notify::warning(__('staffs.delete_error'));

            return Response::redirect('admin/staffs/edit/' . $id);
        }

        Staff::where('id', '=', $id)->delete();
        Hierarchy::where('staff', '=', $id)->delete();
        Role::where('staff', '=', $id)->delete();

        Notify::success(__('staffs.deleted'));

        return Response::redirect('admin/staffs');
    });

});
