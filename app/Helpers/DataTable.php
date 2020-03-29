<?php

function _get_datatables_query($path_model = null, $model = null, $condition = null, $row = null, $row_search = null, $join = null, $order = null, $groupby = null, $limit = null, $offset = null, $distinct = null, $globals = null)
{        
    /* Model Name */
	$clsname = $path_model . $model;
    
	$q       = $clsname::query(); //Eloquent Model

    /* Search */
    // if datatable send POST for search
    if($_GET['search']['value'])
    {
        $cond   = array();
        $i      = 0;
        $cond[] = '(';
        foreach ($row_search as $item)
        {  
            $field = explode('AS', $item);

            if ($i===0)
            {
                $cond[] = $field[0].' LIKE "%' . $_GET['search']['value'] . '%"';
            }
            else
            {
                $cond[] = 'OR '.$field[0].' LIKE "%' . $_GET['search']['value'] . '%"';
            }
            $i++;
        }

        $cond[]                = ')';
        $real_search_condition = implode(" ",$cond);

        $q->whereRaw($real_search_condition);
    }

    /* Distinct */
    if (!empty($distinct) && $distinct == true)
        $q->distinct();

    /* Set Field To Select */
    if (is_array($row) && !empty($row))
    {
        $field = implode(", ", $row);
        $q->selectRaw($field);
    }

    /* Set Condition */
    if ($condition)
    {
        $q->whereRaw($condition);
    }

    /* Set Join */
    if (is_array($join) && !empty($join))
    {
        foreach ($join as $key => $value)
        {   
            $val = preg_split("/[\=,]+/", $value);

            $join_1 = trim($val[0]);
            $join_2 = trim($val[1]);

            if(!empty($val[2])){
                $type   = trim($val[2]);
                $q->$type($key,$join_1,'=',$join_2);
            }else{
                $q->join($key,$join_1,'=',$join_2);
            }
        }
    }

    /* Set Limit And Offset */
    if ($limit != 0 || $offset != 0)
        $q->limit($limit,$offset);

    /* Set Group By */
    if ($groupby)
        $q->groupBy($groupby);
    
    
    /* Set Ordering */
    if (isset($_GET['order']))
    {
    	$arr_row = array();
    	foreach ($row as $key => $value) 
    	{
    		$field = explode('.', $value);
            $end_field = last_word(end($field));

            array_push($arr_row, $end_field);
    	}
    	$q->orderBy($arr_row[$_GET['order'][0]['column']], $_GET['order']['0']['dir']);
        // $q->orderBy($_GET['order']['0']['column'], $_GET['order']['0']['dir']);
    } 
    if (!empty($order))
    {
        $q->orderBy($order);
    }
    
    return $q;
}

function count_filtered($path_model = null, $model = null, $condition = null, $row = null, $row_search = null, $join = null, $order = null, $groupby = null, $limit = null, $offset = null, $distinct = null)
{
	$q     = _get_datatables_query($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
	$query = $q->count();
    return $query;
}

function count_all($path_model = null , $model = null, $condition = null, $row = null, $row_search = null, $join = null, $order = null, $groupby = null, $limit = null, $offset = null, $distinct = null)
{
	$clsname = $path_model . $model;
	$q       = $clsname::count();
    return $q;
}

function get_datatables($path_model = null , $model = null, $condition = null, $row = null, $row_search = null, $join = null, $order = null, $groupby = null, $limit = null, $offset = null, $distinct = null)
{
	$q = _get_datatables_query($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
    if ($_GET['length'] != -1) $q->offset($_GET['start'])->limit($_GET['length']);
    $query = $q->get();
    return $query;
}

function loadTableServerSide($path_model = null , $model = null, $condition = null, $row = null, $row_search = null, $join = null, $order = null, $groupby = null, $limit = null, $offset = null, $distinct = null)
{
    $list = get_datatables($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct);
	$data = array();
    $no   = $_GET['start'];
    foreach ($list as $key => $column) {
        $no++;
        $columns = array();
        $columns[] = $no;
        for ($i=0; $i < count($row); $i++) {
            $field = explode('.', $row[$i]);
            $end_field = last_word(end($field));

            if (strpos($end_field, 'id_') !== false) {
                $columns[] = $column[$end_field];
            }
            else if (strpos($end_field, '_id') !== false) {
                $columns[] = $column[$end_field];
            } else {
                $columns[] = $column[$end_field];
            }
        }
        $data[] = $columns;
        
    }

    $output = array(
                    "draw"            => $_GET['draw'],
                    "recordsTotal"    => count_all($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct),
                    "recordsFiltered" => count_filtered($path_model, $model, $condition, $row, $row_search, $join, $order, $groupby, $limit, $offset, $distinct),
                    "data"            => $data,
            );

    echo json_encode($output);
}

function last_word($string)
{
  if ( strrpos($string, " ") ) {
    $letztes_wort_anfang = strrpos($string, " ") + 1;
    $laenge_letztes_wort = strlen($string) - $letztes_wort_anfang;
    $letztes_wort        = substr($string, $letztes_wort_anfang, $laenge_letztes_wort);
    return $letztes_wort;
  }
  else
    return $string;
}