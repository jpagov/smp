<?php

Route::collection(array('before' => 'auth'), function() {


  /*
    Admin JSON API
  */
  Route::get('admin/api/(:any).json', function($hierarchy) {

  	$valid = array('division', 'branch', 'sector', 'unit');

  	if (!in_array($hierarchy, $valid)) {
  		return Response::create(Json::encode(array('no result')), 200, array('content-type' => 'application/json'));
  	}

    if (! $hierarchies = $hierarchy::get()) {
      return Response::error(404);
    }

    $api = array();

    foreach ($hierarchies as $item) {
      $api[] = $item->title;
    }

    $json = Json::encode($api);

    return Response::create($json, 200, array('content-type' => 'application/json'));

  });

  /*
    Admin JSON API filter by division
  */
  Route::get('admin/api/(:any)/(:any).json', function($division_slug = null, $filter = null) {

  	if (ctype_digit($division_slug)) {
  		$division_slug = Division::find($division_slug)->slug;
  	}

  	$valid = array('branch', 'sector', 'unit');

  	if (!in_array($filter, $valid)) {
  		return Response::error(404);
  	}

  	if (! $division = Division::slug($division_slug)) {
  		return Response::error(404);
  	}

  	if (! $filters = Hierarchy::$filter($division->id)) {
      return Response::error(404);
    }

    $api = array();

    foreach ($filters as $item) {
    	if (empty(trim($item->title))) {
    		continue;
    	}
      $api[] = $item->title;
    }

    $json = Json::encode($api);

    return Response::create($json, 200, array('content-type' => 'application/json', 'charset' => 'UTF-8'));

  });

  /*
    Admin JSON API filter by division
    api/bpm/branch/query
  */
  Route::get('admin/api/(:any)/(:any)/(:any)', function($division_slug = null, $hierarchy = null, $query = null) {

  	if (ctype_digit($division_slug)) {
  		$division_slug = Division::find($division_slug)->slug;
  	}

  	$valid = array('branch', 'sector', 'unit');

  	if (!in_array($hierarchy, $valid)) {
  		return Response::error(404);
  	}

  	if (! $division = Division::slug($division_slug)) {
  		return Response::error(404);
  	}

  	if (! $querys = Hierarchy::$hierarchy($division->id)) {
      return Response::error(404);
    }

    $api = array();

    foreach ($querys as $item) {
    	if (empty(trim($item->title))) {
    		continue;
    	}
      $api[] = $item->title;
    }

    $json = Json::encode($api);

    return Response::create($json, 200, array('content-type' => 'application/json', 'charset' => 'UTF-8'));

  });

});
