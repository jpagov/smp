<?php
set_time_limit(0);

use Hariadi\Siapa as Siapa;

Route::collection(array('before' => 'auth'), function() {
    /*
    Admin JSON API
    */
    Route::get(array('admin/import', 'admin/import/(:num)'), function($page = 1) {

        /* ############################################################
           WARNING: THIS WILL DELETE YOUR EXISTING DATA. BACKUP FIRST.
           ############################################################ */

        $loop = round(Migrate::count()/100);

        $migrates = Migrate::paginate($page, 100);
        foreach ($migrates->results as $staff) {

        	if ($staff->id == 487) continue;
        	//dd($staff);

            $s = new Siapa($staff->nama);
            $s->setMiddle('b.');
            $input = array(
                'id' => $staff->id,
                'slug' => slug($s->givenName()),
                'salutation' => $s->salutation(),
                'display_name' => $s->givenName(true),
                'first_name' => $s->first(),
                'last_name' => $s->last(),
                'gender' => $s->gender(),
                'job_title' => $staff->jawatan,
                'position' => $staff->gelaran,
                'management' => (filter_var($staff->atasan, FILTER_VALIDATE_BOOLEAN)) ? 1 : 0,
                'jusa' => jusa($staff->gred),
                'description' => reportTo($staff->tugas),
                'report_to' => Migrate::parser(reportTo($staff->tugas)),
                'scheme' => $staff->skim,
                'grade' => $staff->gred,
                'division' => $staff->bahID,
                'branch' => Branch::id($staff->cawangan),
                'sector' => Sector::id($staff->seksyen),
                'unit' => Unit::id($staff->unit),
                'email' => $staff->emel,
                'telephone' => $staff->telefon,
                'status' => (filter_var($staff->status, FILTER_VALIDATE_BOOLEAN)) ? 'active' : 'inactive',
                'role' => 'staff',
                'view' => $staff->kaunter,
                'sort' => $staff->urutan,
                'created' => Date::mysql('now'),
                );

            $input = array_filter($input);

            $name = strtolower(trim($staff->nama));

            if (!$exist = Staff::where('id', '=', $staff->id)->fetch(array('id'))) {

            	if (strpos($name, 'kosong') === false) {

            		Staff::create($input);

            	}

            } else {

            	if (strpos($name, 'kosong') !== false) {

            		Staff::where('id', '=', $exist->id)->delete();
					Hierarchy::where('staff', '=', $exist->id)->delete();
					Role::where('staff', '=', $exist->id)->delete();

					// and delete they avatar too
					$path = PATH . 'content' . DS . 'avatar' . DS;
					$image = $path . preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->emel) . '.jpg';

					$removed = $path . 'removed/' . preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->emel) . '.jpg';

					if (file_exists($image)) {
						rename($image, $removed);
					}
					continue;

            	} else {

					Staff::update($exist->id, $input);

            	}

            }

            // we upload avatar manually, just update the staff meta in db
            if (isset($staff->emel) and !empty($staff->emel) and isset($input['slug'])) {

            	$meta = array(
            		'staff' => $staff->id,
            		'extend' => 1,
            		'data' => Json::encode(array(
		            	'name' => $input['slug'],
		            	'filename' => preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->emel) . '.jpg'
		            )),
            	);

		        if (!$meta_exist = Meta::where('staff', '=', $staff->id)->where('extend', '=', 1)->fetch(array('id'))) {

		    		Meta::create($meta);

		    	} else {

		    		Meta::update($meta_exist->id, $meta);

		    	}

            }


            $hierarchy = array(
                'staff' => $staff->id
            );

            if (isset($input['division'])) {
                $hierarchy['division'] = $input['division'];
            }

            if (isset($input['branch'])) {
                $hierarchy['branch'] = $input['branch'];
            }

            if (isset($input['sector'])) {
                $hierarchy['sector'] = $input['sector'];
            }

            if (isset($input['unit'])) {
                $hierarchy['unit'] = $input['unit'];
            }

            $hierarchsm = array_intersect_key($input, array_flip(array('division', 'branch', 'sector', 'unit')));

            if (!$hierarchy_update = Hierarchy::search($hierarchsm)) {
            	Hierarchy::create($hierarchy);
            } else {
            	Hierarchy::update($hierarchy_update->id, $hierarchy);
            }

            Division::counter();

            if (isset($staff->emel) and !empty($staff->emel)) {
            	Encode::email2image($staff->emel);
            }
        }


        if ($page < $loop) {
            sleep(1);
            return Response::redirect('admin/import/' . ($page+1) );
        }

        //exit();
        $json = Json::encode($input);
        return Response::create($json, 200, array('content-type' => 'application/json'));

    });

});
