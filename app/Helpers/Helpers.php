<?php

if (! function_exists('slug')) {
	function slug($parameter = ""){
		$name_url = strtolower($parameter); 
        $name_url = str_replace(' ','-',$name_url);
        $name_url = preg_replace('/[^A-Za-z0-9\-]/', '', $name_url);
        $name_url = preg_replace('/-+/', '-', $name_url);

        return $name_url;
	}
}
/**
 * @abstract Function id encode
 * @return string
 * @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
 */
function encryptID($id)
{
    $data   = base64_encode($id);
    $output = urlencode($data);
    return $output;
}


/**
 * @abstract Function id decode
 * @return string
 * @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
 */
function decryptID($id)
{
    $data   = urldecode($id);
    $output = base64_decode($data);
    return $output;
}

if (! function_exists('money_formats')) {
    function money_formats($value=0)
    {
        return number_format($value, 0, ',', '.');
    }
}

if ( ! function_exists('array_build'))
{
    /**
     * Build a new array using a callback.
     *
     * @param  array     $array
     * @param  \Closure  $callback
     * @return array
     */
    function array_build($array, Closure $callback)
    {
        $results = array();
        foreach ($array as $key => $value)
        {
            list($innerKey, $innerValue) = call_user_func($callback, $key, $value);
            $results[$innerKey] = $innerValue;
        }
        return $results;
    }
}

