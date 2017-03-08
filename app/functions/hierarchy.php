<?php

/**
 * Theme functions for hierarchies
 */

function total_hierarchies($type = 'branch')
{
    if (! $hierarchies = Registry::get($type . 's')) {
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
    if (! total_hierarchies()) {
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

    // if (in_array($type, $valid)) {
    //     if ($hierarchies = Hierarchy::where($type, '=', $id)->get()) {

    //     	dd($hierarchies);
    //     	$group = array_group_by($hierarchies, 'branch', 'sector', 'unit');
    //         dd($group);

    //     }
    // }
    $group = $valid[array_search($type, $valid) + 1];

    $query = Hierarchy::where($type, '=', $id)
            ->where($group, '!=', 0)
            ->group($group);

	$query = $query->left_join(
			Base::table($group . 's'),
			Base::table('hierarchies.'. $group), '=', Base::table($group . 's.id'));

    return in_array($type, $valid)
        ? $query->sort('sort', 'desc')->get($valid)
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
                        $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['childs'][$staff->unit_title]['staffs'][] = $staff;
                        $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['childs'][$staff->unit_title]['id'] = $sector->unit;
                        $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['childs'][$staff->unit_title]['type'] = 'unit';
                        $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                            return $k === $key;
                        });
                    }
                }
            }

            foreach ($staffs as $key => $staff) {
                if ($staff->sector == $branch->sector) {
                    $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['staffs'][] = $staff;
                    $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['id'] = $branch->sector;
                    $hierarchies['childs'][$staff->branch_title]['childs'][$staff->sector_title]['type'] = 'sector';
                    //arsort($hierarchies[$staff->branch_title][$staff->sector_title]);
                    $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                        return $k === $key;
                    });
                }
            }
        }



        foreach ($staffs as $key => $staff) {
            if ($staff->branch == $division->branch) {
                $hierarchies['childs'][$staff->branch_title]['staffs'][] = $staff;
                $hierarchies['childs'][$staff->branch_title]['id'] = $division->branch;
                $hierarchies['childs'][$staff->branch_title]['type'] = 'branch';
                //arsort($hierarchies[$staff->branch_title]);
                $staffs = walk_recursive_remove($staffs, function ($v, $k) use ($key) {
                    return $k === $key;
                });
            }
        }
    }

    // listing for direct under divisions, means the director
    foreach ($staffs as $key => $staff) {
        $hierarchies['staffs'][] = $staff;
    }

    $hierarchies['id'] = $id;
    $hierarchies['type'] = 'division';

    return $hierarchies;
}

function sortBy(array $array)
{
    return usort($array, function ($a, $b) {
        return strcmp($b->grade, $b->grade);
    });
}

function flatten(array $array)
{
    $return = array();
    array_walk_recursive($array, function ($a, $b) use (&$return) {
        $return[$b] = $a;
    });

    return $return;
}

function array_search_key(array $array, $needle)
{
    $iterator = new RecursiveArrayIterator($array);
    $recursive = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
    foreach ($recursive as $key => $value) {
        if ($key == $needle) {
            return $key;
        }
    }
}

function walk_recursive_remove(array $array, callable $callback)
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

if (! function_exists('array_group_by')) {
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
        function array_group_by(array $array, $key)
        {
            if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
                trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);

                return null;
            }
            $func = (is_callable($key) ? $key : null);
            $_key = $key;

            $grouped = [];
            foreach ($array as $value) {
                $grouped[$value->{$_key}][] = $value;
            }

        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();
            foreach ($grouped as $key => $value) {
                $params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
                $grouped[$key] = call_user_func_array('array_group_by', $params);
            }
        }

            return $grouped;
        }
}

function htmlOrg($orgs, $level = 1, $collapsing = true)
{
    $htmlOrg = '';
    $collapse = $collapsing ? 'in' : '';
    $expanded = $collapsing ? 'true' : 'false';

    if (! isset($orgs['childs'])) {
        return;
    }
    foreach ($orgs['childs'] as $itemsKey => $org) :

        $index = isset($org['type']) ? $org['type']. '-' . $org['id'] : slug($itemsKey);

	    $htmlOrg .= '<div class="panel panel-primary">';
	    $htmlOrg .= '<!-- Default panel contents -->';
	    $htmlOrg .= '<div class="panel-heading" role="tab" id="heading-' . $index . '">';
	    $htmlOrg .= '<h4 class="panel-title">';

	    $htmlOrg .= isset($org['childs']) ? '<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-' . $index . '" aria-expanded="'. $expanded  .'" aria-controls="collapse-' . $index . '">' . $itemsKey . '</a>' : $itemsKey;

	    $htmlOrg .= '</h4>';

	    $htmlOrg .= '</div>';

	    $htmlOrg .= '<table class="table">';

	    $htmlOrg .= '<thead>';
	    $htmlOrg .= '<tr>';
	    $htmlOrg .= '<th width="30%">Nama</th>';
	    $htmlOrg .= '<th data-toggle="tooltip" title="Jawatan"><i class="glyphicon glyphicon-barcode"></i> Jawatan</th>';
	    $htmlOrg .= '<th data-toggle="tooltip" title="Emel"><i class="glyphicon glyphicon-envelope"></i> Emel</th>';
	    $htmlOrg .= '<th data-toggle="tooltip" title="Telefon"><i class="glyphicon glyphicon-phone-alt"></i> Telefon</th>';
	    $htmlOrg .= '</tr>';
	    $htmlOrg .= '</thead>';
	    $htmlOrg .= '<tbody>';

		if (isset($org['staffs'])) :
            foreach ($org['staffs'] as $staff) :

                $htmlOrg .= '<tr>';

			    $htmlOrg .= '<td><a class="staff-ajax" ' . (site_meta('enable_staff_modal', true) ? 'data-toggle="modal"' : '') . ' href="' . base_url(Page::staff() . '/' . $staff->slug) . '" data-target="#staffModal">' . $staff->display_name . '</a></td>';

			    $htmlOrg .= '<td>' . $staff->job_title . '</td>';

			    $htmlOrg .= '<td>';

			    if ($staff->email) :
                    //$htmlOrg .= '<a href="mailto:' . Encode::email($staff->email) . '">';
                    $htmlOrg .= '<span><img src="' . Encode::email2image($staff->email) . '" alt="'. $staff->display_name .'"></span>';
                    //$htmlOrg .= '</a>';
                else :
                    $htmlOrg .= __('site.na');
				endif;
		    $htmlOrg .= '</td>';
		    $htmlOrg .= '<td>' . (site_meta('short_phone', false) ? str_replace(site_meta('short_phone', array('03-8885', '03 8885')), '', $staff->telephone) : $staff->telephone) . '</td>';
		    $htmlOrg .= '</tr>';

		    endforeach;
		endif;

	    $htmlOrg .= '</tbody>';
	    $htmlOrg .= '</table>';

	    $htmlOrg .= '</div>';
	    $htmlOrg .= '<hr>';

	    if (isset($org['childs'])) :

	    	$htmlOrg .= ($collapsing) ? '<div id="collapse-' . $index . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-' . $index . '">' : '';

		    $htmlOrg .= htmlOrg($org, $level++);

		    $htmlOrg .= ($collapsing) ? '</div>' : '';

	    endif;


    $level++;

    endforeach;

    return $htmlOrg;
}
