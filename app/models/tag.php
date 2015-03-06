<?php

class Tag extends Base {

	public static $table = 'tags';

	public static function dropdown() {
		$items = array();

		foreach(static::get() as $item) {
			$items[$item->id] = $item->title;
		}

		return $items;
	}

	public static function process($id, $tags) {

		$existing = StaffTag::existing($id);
		$input = [];

		if (!is_array($tags)) {
			$input = explode(',', $tags);
		}

		$tagging = array_map(function($name) {
			return static::id($name);
		}, $input);

		$removes = array_diff($existing, $tagging);
		$adds = array_diff($tagging, $existing);

		foreach ($removes as $remove) {
			StaffTag::where('staff', '=', $id)
					->where('tag', '=', $remove)
					->delete();
		}

		foreach ($adds as $add) {
			StaffTag::create([
				'staff' => $id,
				'tag' => $add
			]);
		}

		// select updated tag and return tag title
		$existing = StaffTag::tag($id);

		return $existing;
	}

	public static function id($name) {
		if (empty(trim($name))) return;
		if ( !$tag = static::where('title', 'like', $name)->fetch()) {
			$input = [
				'title' => $name,
				'slug' => slug($name),
				'created' => Date::mysql('now')
			];
			$tag = static::create($input);
			return $tag->id;
		}
		return $tag->id;
	}

	public static function slug($slug) {
		return static::where('slug', 'like', $slug)->fetch();
	}

	public static function paginate($page = 1, $perpage = 10) {
		$query = Query::table(static::table());

		$count = $query->count();

		$results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort('created', 'desc')->get();

		return new Paginator($results, $count, $page, $perpage, Uri::to('admin/tags'));
	}

}
