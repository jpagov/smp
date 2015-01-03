<?php
set_time_limit(0);

Route::collection(array('before' => 'auth,admin'), function() {

	Route::get(array('admin/hirarchy', 'admin/hirarchy/(:num)'), function($page = 1) {

		$loop = round(Migrate::count()/100);
		$staffs = Staff::paginate($page, 100);

		foreach ($staffs->results as $staff) {
			Hierarchy::where('staff', '=', $staff->id)->delete();
			Hierarchy::create(array(
				'staff' => $staff->id,
				'division' => ($staff->division) ?: 0,
				'branch' => ($staff->branch) ?: 0,
				'sector' => ($staff->sector) ?: 0,
				'unit' => ($staff->unit) ?: 0,
			));
		}

		if ($page < $loop) {
			sleep(1);
			return Response::redirect('admin/hirarchy/' . ($page+1) );
		}

	});
});
