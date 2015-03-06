<?php

class StaffTag extends Base {

	public static $table = 'staff_tag';

	public static function staff($id, $type = 'staff') {
		return static::where($type, '=', $id)->fetch();
	}

	public static function tag($id, $type = 'staff') {

		$tags = [];

		if (!$stafftags = static::where($type, '=', $id)->get()) {
			return;
		}

		foreach($stafftags as $tag) {
			$tags[] = Tag::find($tag->tag)->title;
		}

		return $tags;
	}

	public static function listing($staff = null, $tag = null, $array = false) {
		$items = array();

		$query = Query::table(static::table());

		if ($staff) {
			$query->where('staff', '=', $staff);
		}

		if ($tag) {
			$query->where('tag', '=', $tag);
		}

		if (!$array) {
			return $query->get();
		}

		foreach($query->get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function existing($staff = null, $tag = null) {
		$items = array();

		$query = Query::table(static::table());

		if ($staff) {
			$query->where('staff', '=', $staff);
		}

		if ($tag) {
			$query->where('tag', '=', $tag);
		}

		foreach($query->get() as $item) {
			$items[] = $item->tag;
		}

		return $items;
	}

}
