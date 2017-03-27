<?php

class Staff extends Base
{
	public static $softDelete = true;

    public static $table = 'staffs';

  // default get all field excerpt username && password
    public static function fields($field = array(
        'id',
        'slug',
        'ic',
        'salutation',
        'first_name',
        'last_name',
        'display_name',
        'gender',
        'job_title',
        'report_to',
        'personal_assistant',
        'position',
        'management',
        'description',
        'scheme',
        'grade',
        'division',
        'branch',
        'sector',
        'unit',
        'email',
        'telephone',
        'fax',
        'status',
        'role',
        'account',
        'view',
        'created',
        'updated',
        'rating',
        'message'
        ))
    {
        $fields = array();
        foreach ($field as $column) {
            $fields[] = Base::table('staffs.' . $column);
        }
        return $fields;
    }

    public static function id($id)
    {
        return static::get('id', $id);
    }

    public static function setid($name)
    {
        if (empty(trim($name))) {
            return;
        }
        if ( $staff = static::where('display_name', 'like', $name)->where('status', '=', 'active')->fetch()) {
            return $staff->id;
        }
    }

    public static function slug($slug)
    {
        return static::get('slug', $slug);
    }

    public static function email($email)
    {
        return static::where('email', 'REGEXP', $email, true)
            ->fetch(array(static::fields()));
    }

    public static function lists($fields = null)
    {
    	$fields = $fields ?: static::fields();

        return static::fetch($fields);
    }

    private static function get($row, $val)
    {
        return static::where($row, '=', $val)
        ->fetch(array(static::fields()));
    }

    public static function listing($page = 1, $per_page = 10, $hierarchy = null, $top = null)
    {

        $query = static::where(Base::table('staffs.status'), '=', 'active')
                       ->where(Base::table('staffs.email'), '<>', '')
                       ->where(Base::table('staffs.telephone'), '<>', '');

        $get = array(static::fields());

        if ($top) {
            $query = $query->where(Base::table('staffs.management'), '=', '1');
        } else {
            $query = $query->left_join(
                    Base::table('divisions'),
                    Base::table('divisions.id'), '=', Base::table('staffs.division'));

            if ( isset($hierarchy['division']) && $division = $hierarchy['division']) {
                $query->where(Base::table('staffs.division'), '=', $division->id);
            }
            array_push($get, Base::table('divisions.slug as division_slug'), Base::table('divisions.title as division_title'));

            $query = $query->left_join(
                    Base::table('branchs'),
                    Base::table('branchs.id'), '=', Base::table('staffs.branch'));

            if ( isset($hierarchy['branch']) && $branch = $hierarchy['branch']) {
                $query->where(Base::table('staffs.branch'), '=', $branch->id);
            }
            array_push($get, Base::table('branchs.slug as branch_slug'), Base::table('branchs.title as branch_title'));

            $query = $query->left_join(
                    Base::table('sectors'),
                    Base::table('sectors.id'), '=', Base::table('staffs.sector'));
            if ( isset($hierarchy['sector']) && $sector = $hierarchy['sector']) {
                $query->where(Base::table('staffs.sector'), '=', $sector->id);
            }
            array_push($get, Base::table('sectors.slug as sector_slug'), Base::table('sectors.title as sector_title'));

            $query = $query->left_join(
                    Base::table('units'),
                    Base::table('units.id'), '=', Base::table('staffs.unit'));
            if ( isset($hierarchy['unit']) && $unit = $hierarchy['unit']) {
                $query->where(Base::table('staffs.unit'), '=', $unit->id);
            }
            array_push($get, Base::table('units.slug as unit_slug'), Base::table('units.title as unit_title'));
        }

        $total = $query->count();

    	// get staffs
        $staffs = $query->sort(Base::table('staffs.grade'), 'desc')->sort(Base::table('staffs.sort'), 'desc');

        if (! is_public() || is_public() && substr_count(Uri::current(), '/') >= 2) {
			$staffs = $staffs->take($per_page)->skip(--$page * $per_page);
    	}

    	$staffs = $staffs->get($get);

        return array($total, $staffs);
    }

    public static function search($term, $page = 1, $per_page = 10, $object = false, $filter = array(), $field = array())
    {

        // valid field to search
        $valid = array('display_name', 'slug', 'email', 'telephone', 'description', 'status');

        // default we search for name only
        if (empty($field)) {
            $field = array('display_name');
        }
        $search = array_intersect($valid, $field);

        $filter = array_filter($filter);

        $query = Query::table(static::table());

        if ($term) {
            // word
            //$query->where($search, 'REGEXP', '[[:<:]]' . $term . '[[:>:]]', true);
            $query->where($search, 'REGEXP', $term, true);
        }

        if (isset($filter['division'])) {
            $division = $filter['division'];

            if (is_array($division)) {
                //modify array and convert to their id respectively
                $division = array_map(function($var) {

                    return ( !ctype_digit($var) && ($item = Division::slug($var))) ? $item->id : $var;

                }, $filter['division']);

                if (count($division) == 1 && !empty($division[0])) {
                    $query->where('division', '=', $division[0]);
                } else {
                    $query->where_in('division', $division, 'AND ');
                }
            } else {
                if (!ctype_digit($division)) {
                    $division = Division::slug($division)->id;
                }
                $query->where('division', '=', $division);
            }
            unset($filter['division']);
        }

        if (isset($filter['branch'])) {
            $branch = $filter['branch'];

            if (is_array($branch)) {
                $branch = array_map(function($var) {

                    return ( !ctype_digit($var) && ($item = Branch::slug($var))) ? $item->id : $var;

                }, $filter['branch']);

                if (count($branch) == 1 && !empty($branch[0])) {
                    $query->where('branch', '=', $branch[0]);
                } else {
                    $query->where_in('branch', $branch, 'AND ');
                }
            } else {
                if (!ctype_digit($branch)) {
                    $branch = Branch::slug($branch)->id;
                }
                $query->where('branch', '=', $branch);
            }
            unset($filter['branch']);
        }

        if (isset($filter['sector'])) {
            $sector = $filter['sector'];

            if (is_array($sector)) {
                $sector = array_map(function($var) {

                    return ( !ctype_digit($var) && ($item = Sector::slug($var))) ? $item->id : $var;

                }, $filter['sector']);

                if (count($sector) == 1 && !empty($sector[0])) {
                    $query->where('sector', '=', $sector[0]);
                } else {
                    $query->where_in('sector', $sector, 'AND ');
                }
            } else {
                if (!ctype_digit($sector)) {
                    $sector = Sector::slug($sector)->id;
                }
                $query->where('sector', '=', $sector);
            }
            unset($filter['sector']);
        }

        if (isset($filter['unit'])) {
            $unit = $filter['unit'];

            if (is_array($unit)) {
                $unit = array_map(function($var) {

                    return ( !ctype_digit($var) && ($item = Unit::slug($var))) ? $item->id : $var;

                }, $filter['unit']);

                if (count($unit) == 1 && !empty($unit[0])) {
                    $query->where('unit', '=', $unit[0]);
                } else {
                    $query->where_in('unit', $unit, 'AND ');
                }
            } else {
                if (!ctype_digit($unit)) {
                    $unit = Unit::slug($unit)->id;
                }
                $query->where('unit', '=', $unit);
            }
            unset($filter['unit']);
        }

        $status = isset($filter['status']) ? $filter['status'] : 'active';

        if ($status != 'all') {
            $query->where('status', '=', $status);
        }

        //dd($query->get());
        //dd($query);

        $count = $query->count();

        $query->sort('grade', 'desc');
        $query->sort('sort', 'desc');

        $staffs = $query->take($per_page)
        ->skip(--$page * $per_page)
        ->get(array(static::fields()));

        // fix: why this $page start with 0 on admin only? even we set default to 1?
        if (strpos(Uri::current(), 'admin/staffs') !== false) {
            $page = $page+1;
        }

        return ($object) ? new Paginator($staffs, $count, $page, $per_page, Uri::to('admin/staffs')) : array($count, $staffs);
    }

    public static function paginate($page = 1, $perpage = 10)
    {
        $query = Query::table(static::table());

        $count = $query->count();

        $results = $query->take($perpage)
            ->skip(($page - 1) * $perpage)
            ->sort('grade', 'desc')
            ->sort('sort', 'desc')
            ->get(array(static::fields()));

        return new Paginator($results, $count, $page, $perpage, Uri::to('admin/staffs'));
    }

    public static function related($id, $page = 1, $perpage = 6)
    {
        $staff = static::find($id);
        //dd(substr($staff->position, strpos($staff->position, '(')));
        $query = Query::table(static::table())->where('status', '=', 'active');

        if ($staff->management == 1) {
            $query->where('position', 'like', '%' . substr($staff->position, 0, -1) . '%')
                ->where('grade', '<', $staff->grade);
        } else {
            if ($staff->unit) {
                $query->where('unit', '=', $staff->unit);
            }

            if ($staff->sector) {
                $query->where('sector', '=', $staff->sector);
            }

            if ($staff->branch) {
                $query->where('branch', '=', $staff->branch);
            }
        }

		$query = Query::table(static::table())->where('status', '=', 'active')->where('id', '!=', $staff->id);

		if ($staff->grade <= site_meta('related_min_grade', 41)) {

			if ($staff->branch) {
				$query = $query->where('unit', '=', $staff->unit);
			}

			if ($staff->sector) {
				$query = $query->where('sector', '=', $staff->sector);
			}

			if ($staff->branch) {
				$query = $query->where('branch', '=', $staff->branch);
			}

			if ($staff->division) {
				$query = $query->where('division', '=', $staff->division);
			}

			$query = $query->where('id', '!=', $staff->report_to);


		} else {
			$query = $query->where('report_to', '=', $staff->id);
		}

        $count = $query->count();

        $results = $query->take($perpage)
            ->skip(($page - 1) * $perpage)
            ->sort('grade', 'desc')
            ->sort('sort', 'desc')
            ->get(array(static::fields()));

        return new Paginator($results, $count, $page, $perpage, Uri::to('staffs'));
    }

    public static function rating($id)
    {
        $rates = Config::app('rating');

        $staff = static::find($id);

        $view = (int) $staff->view;

        $rating = 1; // default rating

        switch ($view) {
            case in_array($view, range(1,4999)):
                # code...
                break;

            case in_array($view, range(5000,19999)):
                $rating = 2;
                break;

            case in_array($view, range(20000,49999)):
                $rating = 3;
                break;

            case in_array($view, range(50000,79999)):
                $rating = 4;
                break;

            case ($view > 80000):
                $rating = 5;
                break;

            default:
                $rating = 1;
                break;
        }

        return $rating;
    }

    public static function editors($division = null, $fields = null)
    {
    	$fields = $fields ?: static::fields();

        $query = Query::table(static::table())
    		->where('role', '=', 'editor')
        	->where('status', '=', 'active');

       	if ($division) {
       		$query = $query->where('division', '=', $division);
       	}

        $editors = $query->get($fields);

        return $editors;
    }
}
