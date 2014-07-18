<?php

/**
 * Staff API
 */
Route::get('api/(:any)', function() {

  $fields = array('id', 'display_name', 'position', 'email', 'telephone', 'slug', 'gender');
  $staffs = Staff::where('status', '=', 'active')->where('grade', '>=', '22')->sort(Base::table('staffs.grade'), 'desc')->get(Staff::fields($fields));
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
            $staff->avatar = $extend->value->filename;
          }

          if (!$staff->avatar) {
              $staff->avatar = ($staff->gender == 'M') ? 'default-male.jpg' : 'default-female.jpg';
          }
          break;
      }
    }

    // convert to accosiative array
    foreach ($fields as $field) {
      $api[$key][$field] = $staff->$field;
      $api[$key]['tokens'][] = $staff->$field;
      $api[$key]['value'] = $staff->slug;
      $api[$key]['avatar'] = $staff->avatar;
      $api[$key]['twitter'] = $staff->twitter;
      //$api[$key]['token'] = array($staff->display_name, $staff->email);
    }
  }

  //print_r($api); exit();

  $json = Json::encode($api);

  return Response::create($json, 200, array(
        'X-Frame-Options' => 'SAMEORIGIN',
        'content-type' => 'application/json'
    ));
});
