<?php

/**
 * Theme functions for hierarchies
 */

function total_hierarchies($type = 'branch')
{
    if ( ! $hierarchies = Registry::get($type . 's')) {
        //$hierarchies = Branch::get();

        //$hierarchies = new Items($hierarchies);

        //Registry::set($type, $hierarchies);
        return false;
    }

    return $hierarchies->length();
}

// loop hierarchies
function hierarchies($type = 'branch')
{
    if ( ! total_hierarchies()) {
        return false;
    }

    $items = Registry::get($type . 's');

    if ($result = $items->valid()) {
        // register single branch
        Registry::set($type, $items->current());

        // move to next
        $items->next();
    }

    return $result;
}

// single hierarchies
function hierarchy_id($type = 'branch')
{
    return Registry::prop($type, 'id');
}

function hierarchy_title()
{
    return Registry::prop($type, 'title');
}

//function hierarchy_title_en() {
//    return Registry::prop($type, 'title_en');
//}

function hierarchy_slug()
{
    return Registry::prop($type, 'slug');
}

function hierarchy_description()
{
    return Registry::prop($type, 'description');
}

function has_meta()
{
    return Registry::prop($type, 'description');
}

function hierarchy($id, $type = 'division')
{
    $valid = array('division', 'branch', 'sector', 'unit');

    if (in_array($type, $valid)) {
        $hierarchies = Hierarchy::where($type, '=', $id)->get();
    }

    $group = $valid[array_search($type, $valid)+1];

    return in_array($type, $valid)
        ? Hierarchy::where($type, '=', $id)
            ->where($group, '!=', 0)
            ->group($group)
            ->get()
        : array();
}

function group_by($staffs, $id)
{
    // branch group
    $hierarchies = array();

    // organization hierarchies
    foreach (hierarchy($id) as $division) {
        foreach (hierarchy($division->branch, 'branch') as $branch) {
            foreach (hierarchy($branch->sector, 'sector') as $sector) {

                foreach ($staffs as $key => $staff) {
                    if ($staff->unit == $sector->unit) {
                        $hierarchies[$staff->branch_title]['childs'][$staff->sector_title]['childs'][$staff->unit_title]['staffs'][] = $staff;
                        $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                            return $k === $key;
                        });
                    }

                }
            }

            foreach ($staffs as $key => $staff) {
                if ($staff->sector == $branch->sector) {
                    $hierarchies[$staff->branch_title]['childs'][$staff->sector_title]['staffs'][] = $staff;
                    //arsort($hierarchies[$staff->branch_title][$staff->sector_title]);
                    $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                        return $k === $key;
                    });
                }
            }
        }

        foreach ($staffs as $key => $staff) {
            if ($staff->branch == $division->branch) {
                $hierarchies[$staff->branch_title]['staffs'][] = $staff;
                //arsort($hierarchies[$staff->branch_title]);
                $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                    return $k === $key;
                });
            }
        }
    }

    return $hierarchies;
}

function sortBy(array $array)
{
    return usort($array, function($a, $b) {
        return strcmp($b->grade, $b->grade);
    });
}

function flatten(array $array)
{
    $return = array();
    array_walk_recursive($array, function($a,$b) use (&$return) {
        $return[$b] = $a;
    });
    return $return;
}

function array_search_key(array $array, $needle)
{
    $iterator  = new RecursiveArrayIterator($array);
    $recursive = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
    foreach ($recursive as $key => $value) {
        if ($key == $needle) {
            return $key;
        }
    }
}

function walk_recursive_remove (array $array, callable $callback)
{
    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $array[$k] = walk_recursive_remove($v, $callback);
        } else {
            if ($callback($v, $k)) {
                unset($array[$k]);
            }
        }
    }

    return $array;
}

if ( ! function_exists('array_group_by') ) {
    /**
     * Groups an array by a given key.
     *
     * Groups an array into arrays by a given key, or set of keys, shared between all array members.
     *
     * Based on {@author Jake Zatecky}'s {@link https://github.com/jakezatecky/array_group_by array_group_by()} function.
     * This variant allows $key to be closures.
     *
     * @param array $array   The array to have grouping performed on.
     * @param mixed $key,... The key to group or split by. Can be a _string_,
     *                       an _integer_, a _float_, or a _callable_.
     *
     *                       If the key is a callback, it must return
     *                       a valid key from the array.
     *
     *                       ```
     *                       string|int callback ( mixed $item )
     *                       ```
     *
     * @return array|null Returns a multidimensional array or `null` if `$key` is invalid.
     */
    function array_group_by( array $array, $key )
    {
        if ( ! is_string( $key ) && ! is_int( $key ) && ! is_float( $key ) && ! is_callable( $key ) ) {
            trigger_error( 'array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR );
            return null;
        }
        $func = ( is_callable( $key ) ? $key : null );
        $_key = $key;
        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ( $array as $value ) {
            if ( is_callable( $func ) ) {
                $key = call_user_func( $func, $value );
            } elseif ( is_object( $value ) && isset( $value->{ $_key } ) ) {
                $key = $value->{ $_key };
            } elseif ( isset( $value[ $_key ] ) ) {
                $key = $value[ $_key ];
            } else {
                continue;
            }
            $grouped[ $key ][] = $value;
        }
        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if ( func_num_args() > 2 ) {
            $args = func_get_args();
            foreach ( $grouped as $key => $value ) {
                $params = array_merge( [ $value ], array_slice( $args, 2, func_num_args() ) );
                $grouped[ $key ] = call_user_func_array( 'array_group_by', $params );
            }
        }
        return $grouped;
    }
}

function htmlOrg($orgs, $numbering = 1) {

	$htmlOrg = '';

		foreach ($orgs['childs'] as $itemsKey => $org) :

			$htmlOrg .= '<tr class="bg-primary"><th colspan="6">' . $itemsKey . '</th></tr>';

			if (isset($org['staffs'])) :
				foreach ($org['staffs'] as $staff) :

					$htmlOrg .= '<tr>';

			        $htmlOrg .= '<td><a class="staff-ajax" ' . (site_meta('enable_staff_modal', true) ? ' data-toggle="modal" ' : '' ) . ' href="' . base_url(Page::staff() . '/' . $staff->slug) . '" data-target="#staffModal">' . $staff->display_name . '</a></td>';

			        $htmlOrg .= '<td>' . $staff->job_title . '</td>';

			        $htmlOrg .= '<td>';
			        if ($staff->email) :
			        	$htmlOrg .= '<a href="mailto:' . Encode::email($staff->email) . '">';
			        	$htmlOrg .= '<span><img src="' . Encode::email2image($staff->email) . '" alt="'. $staff->display_name .'"></span>';
			        	$htmlOrg .= '</a>';
			        else :
			        	$htmlOrg .= __('site.na');
			        endif;
			        $htmlOrg .= '</td>';


			        $htmlOrg .= '<td>' . ( site_meta('short_phone', false) ? str_replace(site_meta('short_phone', array('03-8885', '03 8885')), '', $staff->telephone) : $staff->telephone ) . '</td>';
			    	$htmlOrg .= '</tr>';

			    	$numbering++;

				endforeach;

				if (isset($org['childs'])) :

					$htmlOrg .= htmlOrg($org, $numbering++);

				endif;

			endif;

		endforeach;

	return $htmlOrg;
}
