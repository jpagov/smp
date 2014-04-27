<?php

Route::collection(array('before' => 'auth,csrf'), function() {

  /*
    Branchs Admin JSON API
  */
  Route::get(array('admin/api/branchs', 'admin/api/branchs/(:num)'), function($division = null) {

    $lists = array();

    if ($branchs = Hierarchy::branch($division)) {
      foreach ($branchs as $branch) {
        if ($branch->title) {
          $lists[] = $branch->title;
        }
      }
    }

    $json = Json::encode(array(
      'branchs' => $lists
      ));

    return Response::create($json, 200, array('content-type' => 'application/json'));
  });

  /*
    Sectors Admin JSON API
  */
  Route::get(array(
    'admin/api/sectors',
    'admin/api/sectors/(:num)',
    'admin/api/sectors/(:num)/(:num)',),
  function($branch = null, $division = null) {

    $lists = array();

    if ($sectors = Hierarchy::sector($division, $branch)) {
      foreach ($sectors as $sector) {
        if ($sector->title) {
          $lists[] = $sector->title;
        }
      }
    }

    $json = Json::encode(array(
      'sectors' => $lists
      ));

    return Response::create($json, 200, array('content-type' => 'application/json'));
  });

  /*
    Units Admin JSON API
  */
  Route::get(array(
    'admin/api/units',
    'admin/api/units/(:num)',
    'admin/api/units/(:num)/(:num)',
    'admin/api/units/(:num)/(:num)/(:num)',),
  function($sector = null, $branch = null, $division = null) {

    $lists = array();

    if ($units = Hierarchy::unit($division, $branch, $sector)) {
      foreach ($units as $unit) {
        if ($unit->title) {
          $lists[] = $unit->title;
        }
      }
    }

    $json = Json::encode(array(
      'units' => $lists
      ));

    return Response::create($json, 200, array('content-type' => 'application/json'));
  });


});
