<?php

/*
	Theme functions for staffs
*/
function staff_id() {
	return Registry::prop('staff', 'id');
}

function staff_salutation() {
  return Registry::prop('staff', 'salutation');
}

function staff_name() {
	return Registry::prop('staff', 'display_name');
}

function staff_first_name() {
    return Registry::prop('staff', 'first_name');
}

function staff_last_name() {
    return Registry::prop('staff', 'last_name');
}

function staff_gender() {
  return Registry::prop('staff', 'gender');
}

function staff_email() {
  return Registry::prop('staff', 'email');
}

function staff_email_encode() {
  return Encode::email(Registry::prop('staff', 'email'));
}

function staff_email_image() {
    $img = Encode::email2image(Registry::prop('staff', 'email'));
    return '<img src="' . $img . '" alt="'. staff_name() .'">';
}

function staff_telephone() {
  return Registry::prop('staff', 'telephone');
}

function staff_telephone_link() {
  return '<a href="tel:+6'. str_replace(' ', '', staff_telephone()) .'">'. staff_telephone() . '</a> ';
}

function staff_slug() {
	return Registry::prop('staff', 'slug');
}

function staff_previous_url() {
	$page = Registry::get('staffs_page');
	$query = Staff::where('created', '<', Registry::prop('staff', 'created'))
				->where('status', '!=', 'inactive');

	if($query->count()) {
		$staff = $query->sort('created', 'desc')->fetch();
		$page = Registry::get('staffs_page');

		return base_url($page->slug . '/' . $staff->slug);
	}
}

function staff_next_url() {
	$page = Registry::get('staffs_page');
	$query = Staff::where('created', '>', Registry::prop('staff', 'created'))
				->where('status', '!=', 'inactive');

	if($query->count()) {
		$staff = $query->sort('created', 'asc')->fetch();
		$page = Registry::get('staffs_page');

		return base_url($page->slug . '/' . $staff->slug);
	}
}

function staff_url() {
	$page = Registry::get('staffs_page');

	return base_url($page->slug . '/' . staff_slug());
}

function staff_job_title() {
  return Registry::prop('staff', 'job_title');
}

function staff_position() {
  return Registry::prop('staff', 'position');
}

function staff_grade() {
  return Registry::prop('staff', 'grade');
}

function staff_description() {
    return Registry::prop('staff', 'description', false);
}


function staff_description_html() {
	return Registry::prop('staff', 'description', false);
}

function staff_description_md() {
  return Registry::prop('staff', 'description');
}

function staff_html() {
	return parse(Registry::prop('staff', 'html'), false);
}

function staff_markdown() {
	return parse(Registry::prop('staff', 'html'));
}

function staff_time() {
	if($created = Registry::prop('staff', 'created')) {
		return Date::format($created, 'U');
	}
}

function staff_date() {
	if($created = Registry::prop('staff', 'created')) {
		return Date::format($created);
	}
}

function staff_status() {
	return Registry::prop('staff', 'status');
}

function staff_legacy_view() {
    return Registry::prop('staff', 'view');
}

function staff_view() {

	$stats = Stats::where('trend', '=', staff_id())
		->where('type', '=', 'staff')->count();

	if (staff_legacy_view()) {
		$stats += staff_legacy_view();
	}

    return $stats;
}

function staff_division() {
	if($division = Registry::prop('staff', 'division')) {
		$divisions = Registry::get('all_divisions');

		return $divisions[$division]->title;
	}
}

function staff_division_slug() {
	if($division = Registry::prop('staff', 'division')) {
		$divisions = Registry::get('all_divisions');

		return $divisions[$division]->slug;
	}
}

function staff_division_url() {
	if($division = Registry::prop('staff', 'division')) {
		$divisions = Registry::get('all_divisions');

		return base_url('division/' . $divisions[$division]->slug);
	}
}

function staff_total_comments() {
	return Registry::prop('staff', 'total_comments');
}

function staff_report_to_id() {
    return Registry::prop('staff', 'report_to');
}

function staff_report_to() {
    $query = Staff::where('id', '=', staff_report_to_id());
    $count = $query->count();

    $results = $query->take(10)->skip((1 - 1) * 10)->get(array(Staff::fields()));

    return new Paginator($results, $count, 1, 10, Uri::to('staffs'));
}

function staff_custom_field($key, $default = '') {
	$id = Registry::prop('staff', 'id');

	if($extend = Extend::field('staff', $key, $id)) {
		return Extend::value($extend, $default);
	}

	return $default;
}

function staff_popularity() {
    return Stats::popularity(staff_id());
}

function staff_popularity_percent() {
    return staff_popularity()['popularity'];
}

function staff_popularity_total() {
    return staff_popularity()['from'];
}


function customised() {
	//if($itm = Registry::get('staff')) {
	//	return $itm->js or $itm->css;
	//}

	return false;
}
