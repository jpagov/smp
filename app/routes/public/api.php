<?php

/**
 * Staff API
 */
Route::get('api/(:any)', function() {

  $fields = array('id', 'display_name', 'position', 'email', 'telephone', 'slug');
  $staffs = Staff::where('status', '=', 'active')->sort(Base::table('staffs.created'), 'desc')->get(Staff::fields($fields));
  $api = array();

  foreach ($staffs as $key => $staff) {

    $extends = Extend::fields('staff', $staff->id);

    foreach ($extends as $extend) {
      switch($extend->field) {
        case 'text':
          if( ! empty($extend->value->text)) {
            $staff->twitter = $extend->value->text;
          }
          break;

        case 'image':
          if( ! empty($extend->value->filename)) {
            $staff->avatar = asset('content/' . ($extend->key == 'avatar' ? 'avatar' : '') . '/' . $extend->value->filename);
          }
          break;
      }
    }

    // convert to accosiative array
    foreach ($fields as $field) {
      $api[$key][$field] = $staff->$field;
      $api[$key]['token'][] = $staff->$field;
      $api[$key]['value'] = $staff->slug;
      //$api[$key]['token'] = array($staff->display_name, $staff->email);
    }
  }

  //print_r($api); exit();

  $json = Json::encode($api);

  return Response::create($json, 200, array('content-type' => 'application/json'));
});
