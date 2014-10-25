<?php

Route::collection(array('before' => 'auth,admin,csrf'), function() {

	/*
		Admin reports
	*/
	Route::get('admin/reports', function() {

		$vars['messages'] = Notify::read();
		$vars['staffs'] = Staff::sort('view', 'desc')->take(5)->get(array('display_name', 'view'));
		$vars['divisions'] = Division::sort('view', 'desc')->take(5)->get(array('title', 'view'));
		$vars['categories'] = Category::sort('view', 'desc')->take(5)->get(array('title', 'view'));
		$vars['status'] = 'all';

		return View::create('reports/index', $vars)
			->partial('header', 'partials/header')
			->partial('footer', 'partials/footer');
	});

	Route::get('admin/reports/staff', function() {
		print_r('admin/reports/staff'); exit();
	});

	Route::get('admin/reports/category', function() {
		print_r('admin/reports/category'); exit();
	});

	Route::get('admin/reports/division', function() {
		print_r('admin/reports/division'); exit();
	});

	Route::get('admin/reports/branch', function() {
		print_r('admin/reports/branch'); exit();
	});

	Route::get('admin/reports/sector', function() {
		print_r('admin/reports/sector'); exit();
	});

	Route::get('admin/reports/unit', function() {
		print_r('admin/reports/unit'); exit();
	});

});
