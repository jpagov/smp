<?php

/**
 * Staff API
 */
Route::get(array('api', 'api/(:any)'), function($slug = '') {
//Route::get(array('api/(:any)', 'api/(:any)/(:any)'), function() {

    // get division id
    $division = !empty($slug) ? Division::slug($slug)->id : '';

    $fields = array('id', 'display_name', 'position', 'email', 'telephone', 'slug', 'gender');

    //TODO: make this configurable via admin under setting->user
    $staffs = Staff::where('status', '=', 'active')
            ->where('grade', '>=', '22')
            ->where('view', '>', '999')
            ->sort(Base::table('staffs.grade'), 'desc');

    if ( !empty($slug) and $division = Division::slug($slug)->id) {
        $staffs = $staffs->where('division', '=', $division);
    }

    $staffs = $staffs->get(Staff::fields($fields));

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
