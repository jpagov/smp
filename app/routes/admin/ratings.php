<?php

Route::collection(array('before' => 'auth'), function() {


	/*
		List Ratings
	*/
	Route::get(array('admin/ratings', 'admin/ratings/(:num)'), function($page = 1) {
		$query = Query::table(Base::table(Comment::$table));
		$perpage = Config::meta('posts_per_page');

		$count = $query->count();
		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('date', 'desc')->get();

		$vars['ratings'] = new Paginator($results, $count, $page, $perpage, Uri::to('admin/ratings'));
		$vars['messages'] = Notify::read();

		$vars['statuses'] = array(
			array('url' => '', 'lang' => 'global.all', 'class' => 'active'),
			array('url' => 'pending', 'lang' => 'global.pending', 'class' => 'pending'),
			array('url' => 'approved', 'lang' => 'global.approved', 'class' => 'approved'),
			array('url' => 'spam', 'lang' => 'global.spam', 'class' => 'spam')
			);

		return View::create('ratings/index', $vars)
		->partial('header', 'partials/header')
		->partial('footer', 'partials/footer');
	});

});
