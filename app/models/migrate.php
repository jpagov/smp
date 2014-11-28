<?php

class Migrate extends Base {

	public static $table = 'migrate';

    public static function paginate($page = 1, $perpage = 100) {
        $query = Query::table(static::table())->where('nama', '!=', '')->where('nama', '!=', '');

        $count = $query->count();

        $results = $query->take($perpage)->skip(($page - 1) * $perpage)->get();

        return new Paginator($results, $count, $page, $perpage, Uri::to('migrates'));
    }

    public static function id($gelaran) {
        if (empty(trim($gelaran))) return;
        return static::where('gelaran', 'like', '%' . $gelaran)->fetch()->id;
    }

    public static function parser($desc) {

        $found = array();

        $desc = str_replace('( ', '(', $desc);
        $desc = str_replace(' )', ')', $desc);

        foreach (explode(' ', $desc) as $value) {

            if ((strpos($value, '(') !== false || ctype_upper($value) ) && strlen($value) >= 4 ) {

                $valuetmp = str_replace('(', '', $value);
                $valuetmp = str_replace(')', '', $valuetmp);
                $valuetmp = str_replace('.', '', $valuetmp);

                if (ctype_upper($valuetmp)) {
                    $found[] = $value;
                }

            }
        }

        if (empty($found)) return;

        $query = Query::table(static::table());

        $query = $query->where_in('gelaran', $found);
        $results = $query->sort('gred')->fetch();

        if (isset($results->id)) {
            return $results->id;
        }
        return;
    }


}
