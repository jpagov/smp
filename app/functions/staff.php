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

function staff_has_email() {
	return !empty(staff_email());
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
	$tel = staff_telephone();
	if (strtolower($tel) == 'n/a' || $tel == '-') {
		return $tel;
	}
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
	$desc = trim(Registry::prop('staff', 'description', false));

	return ($desc) ?: __('site.no_desc');
}

function staff_description_text() {
	return str_replace(["\r", "\n"], '', strip_tags(staff_description()));
}

function staff_description_html() {
	return Registry::prop('staff', 'description', false);
}

function staff_description_md() {
  return parse(Registry::prop('staff', 'description'));
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

function staff_date($format = 'j F Y') {
	if($created = Registry::prop('staff', 'created')) {
		return Date::format($created, $format);
	}
}

function staff_created_localized($format = null) {
	if($created = Registry::prop('staff', 'created')) {
		return Date::formatLocalized($created, $format);
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

function staff_message() {
	return Registry::prop('staff', 'message') ? true : false;
}

function staff_hierarchy($id = null, $array = false, $breadcrumb = false) {

	$id = ($id) ?: staff_id();

	if ($staff = Staff::find($id)) {

		Hierarchy::where('staff', '=', $staff->id)->delete();
		Hierarchy::create(array(
			'staff' => $staff->id,
			'division' => ($staff->division) ?: 0,
			'branch' => ($staff->branch) ?: 0,
			'sector' => ($staff->sector) ?: 0,
			'unit' => ($staff->unit) ?: 0,
		));

	}

	if($hierarchy = Hierarchy::where('staff', '=', $id)->fetch()) {

		$org = array();

		foreach (array('division', 'branch', 'sector', 'unit') as $item) {
			if ($hierarchy->$item) {
				if ($h = $item::find($hierarchy->$item)) {

					if ($array) {
						$org[$item] = array(
							'id' => $h->id,
							'title' => $h->title,
							'slug' => $h->slug,
							'url' => staff_hierarchy_url($id, $item, $breadcrumb),
						);
					} else {
						$org[] = $h->title;
					}
				}
			}
		}

		if ($array) {
			return $org;
		}

		return (!empty(array_filter($org))) ? implode(', ', $org) : __('site.no_hierarchy');

	}
	return false;
}

function staff_hierarchy_url($id = null, $type = 'division', $breadcrumb = false) {

	$id = ($id) ?: staff_id();

	$url = array();

	if($hierarchy = Hierarchy::where('staff', '=', $id)->fetch()) {
		foreach (array('division', 'branch', 'sector', 'unit') as $org) {
			if ($hierarchy->$org) {
				if ($h = $org::find($hierarchy->$org)) {
					$url[$org] = ($breadcrumb) ? $h->slug : $org . ':' . $h->slug;
				}
			}
		}
	}



	//$str = substr($str, 0, strpos($str, $prefix)+strlen($prefix));
	$separator = ($breadcrumb) ? '/' : '+';
	return implode($separator, array_splice($url, 0, array_search($type,array_keys($url))+1));
}


function staff_division_title() {
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

function staff_report_to_id() {
	return Registry::prop('staff', 'report_to');
}

function staff_report_to() {
	$query = Staff::where('id', '=', staff_report_to_id());
	$count = $query->count();

	$results = $query->take(10)->skip((1 - 1) * 10)->get(array(Staff::fields()));

	return new Paginator($results, $count, 1, 10, Uri::to('staffs'));
}

function staff_pa_id() {
	return Registry::prop('staff', 'personal_assistant');
}

function staff_pa() {
	$query = Staff::where('id', '=', staff_pa_id());
	$count = $query->count();

	$results = $query->take(10)->skip((1 - 1) * 10)->get(array(Staff::fields()));

	return new Paginator($results, $count, 1, 10, Uri::to('staffs'));
}

function staff_tag() {
	if (!$tags = StaffTag::where('staff', '=', staff_pa_id())->fetch()) {
		return false;
	}

	return $tags;
}

function staff_fourty_eight_and_up() {
	return  Registry::prop('staff', 'grade') >= 48;
}

function staff_custom_field($key, $default = '') {
	$id = Registry::prop('staff', 'id');

	if ($key == 'avatar' && empty($default)) {
		if ($gender = Registry::prop('staff', 'gender')) {
			$default = ($gender == 'M') ? 'default-male.jpg' : 'default-female.jpg';
		}

	}

	//if (is_48_and_up()) {
		if($extend = Extend::field('staff', $key, $id)) {
			return Extend::value($extend, $default);
		}
	//}

	return $default;
}

function staff_relevancy($staff = null) {
	$staff = $staff ?: staff_id();
	return Stats::relevancy($staff);
}

function staff_relevancy_percent() {
	return staff_relevancy()['relevancy'];
}

function staff_relevancy_total() {
	return staff_relevancy()['from'];
}

//function staff_rating($staff = null) {
	////return round(staff_relevancy_percent() / 20);

//	$staff = $staff ?: staff_id();
//   return Staff::rating($staff);
//}

function staff_total_ratings() {
	return Registry::prop('staff', 'total_ratings');
}

function staff_rating() {
	////return round(staff_relevancy_percent() / 20);


}

function gender($gender) {
	return ($gender == 'F') ? 'female' : 'male';
}

function customised() {
	//if($itm = Registry::get('staff')) {
	//	return $itm->js or $itm->css;
	//}

	return false;
}
