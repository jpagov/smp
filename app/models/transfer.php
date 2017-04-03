<?php

class Transfer extends Base
{
    public static $table = 'transfers';

    public static function dropdown()
    {
        $items = array();

        foreach (static::get() as $item) {
            $items[strtoupper($item->id)] = $item->title;
        }

        return $items;
    }

    public static function expired() {
    	$table = Base::table('transfers');
    	$sql = 'SELECT * FROM `'. $table . '` WHERE NOW() > DATE_ADD(`transfered_at`, INTERVAL ' . Config::meta('custom_transfer_days_expired', 7) . ' DAY)';

    	list($result, $statement) = DB::ask($sql);

    	if ($result) {
    		$transfers = $statement->fetchAll(PDO::FETCH_OBJ);

	    	foreach ($transfers as $transfer) {
	    		static::update($transfer->id, [
		    		'confirmed_at' => Date::mysql('now'),
		    		'confirmed_by' => Staff::editors($transfer->transfer_to)[0]->id,
		    		'status' => 'cancel'
		    	]);
	    	}
    	}
    }

    public static function all($columns = null)
    {
        if (! is_array($columns)) {
            $columns = [$columns];
        }

        $query = Query::table(static::table());

        $count = $query->count();

        $results = $query->sort('transfered_at', 'desc')->get($columns);

        return $results;
    }

    public static function findBy($id, $type = 'id', $confirmed_at = false)
    {
        $query = static::buildQuery();

        $query = $query->where(Base::table('transfers.'. $type), '=', $id);

        if ($confirmed_at) {
        	$query = $query->where(Base::table('transfers.confirmed_at'), 'is', null);
        }

        $results = $query->sort(Base::table('transfers.transfered_at'), 'desc')
        ->fetch(static::buildSelect());

        return $results;
    }

    public static function paginate($page = 1, $perpage = 10, $search = null, $status = null)
    {
    	$editor = Auth::user();

        $query = static::buildQuery();

        if ($search) {
        	$query = $query->where('s.display_name', 'like', '%' . $search['term'] . '%');
        }

        if ($status) {
        	$query = $query->where(Base::table('transfers.status'), '=', $status);
        }

        $query = $query->where_in(Base::table('transfers.transfer_to'), $editor->roles, 'AND ')
        	->where_in(Base::table('transfers.transfer_from'), $editor->roles);

        $count = $query->count();

        $results = $query->take($perpage)->skip(($page - 1) * $perpage)->sort(Base::table('transfers.transfered_at'))->get(static::buildSelect());

        return new Paginator($results, $count, $page, $perpage, Uri::to('admin/transfers'));
    }

    protected static function buildQuery()
    {
        return Query::table(static::table())->left_join(
            Base::table('staffs as s'),
            's.id', '=', Base::table('transfers.staff_id')
        )->left_join(
            Base::table('staffs as a'),
            'a.id', '=', Base::table('transfers.transfer_by')
        )->left_join(
            Base::table('staffs as b'),
            'b.id', '=', Base::table('transfers.confirmed_by')
        )->left_join(
            Base::table('divisions as from'),
            'from.id', '=', Base::table('transfers.transfer_from')
        )->left_join(
            Base::table('divisions as to'),
            'to.id', '=', Base::table('transfers.transfer_to')
        );
    }

    protected static function buildSelect()
    {
        return [
        	Base::table('transfers.*'),
        	's.display_name as staff',
        	'a.display_name as request_by',
        	'b.display_name as confirm_by',
        	'from.id as division_from_id',
        	'from.title as division_from',
        	'from.slug as division_from_slug',
			'to.id as division_to_id',
        	'to.title as division_to',
        	'to.slug as division_to_slug',
        ];
    }
}
