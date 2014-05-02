<?php

Route::collection(array('before' => 'auth'), function() {
  /*
    Admin JSON API
  */
  Route::get('admin/api/(:any)', function($hierarchy) {

    $dataset = pathinfo($hierarchy);
    $format = isset($dataset['extension']) ? $dataset['extension'] : 'json';
    $slug = $dataset['filename'];

    if (! $hierarchies = $slug::get()) {
      return Response::error(404);
    }

    $api = array();

    foreach ($hierarchies as $item) {
      $api[] = $item->title;
    }

    $json = Json::encode($api);

    return Response::create($json, 200, array('content-type' => 'application/' . $format));

  });

});
