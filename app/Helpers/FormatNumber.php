<?php

/**
 * @abstract Function get local format number
 * @param {string}
 * @return String
 */
function getLocalformatNumber()
{
    $locale_info   = localeconv();
    // $decimal_point = $locale_info['decimal_point'];

    // if ($decimal_point == '.')
    // {
    //     $separator = ',';
    // }
    // else
    // {
    //     $separator = '.';
    // }

    $decimal_point = '.';
    $separator     = ',';

    $locale['decimal']   = $decimal_point;
    $locale['separator'] = $separator;

    return $locale;
}


/**
 * @abstract Function number formated
 * @param {string}
 * @return String
 */
function formattedNumber($number, $currency="", $precision=false)
{
    if (!empty($number) || $number != '')
    {
        $n   = getLocalformatNumber();
        $num = clearformattedNumber($number);

        if (strpos($num, $n['decimal']) == 0)
        {
            if ($precision == true)
            {
                $number = number_format($num, 2, $n['decimal'], $n['separator']);
            }
            else
            {
                $number = number_format($num, 0, $n['decimal'], $n['separator']);
            }
        }
        else
        {
            $n2 = explode($n['decimal'], $num);
            if (count($n2) > 1)
            {
                if ($n2[1] == '')
                {
                    $number = $number;
                // }
                // else if ($n2[1] < 10)
                // {
                //     $number = number_format($num, 1, $n['decimal'], $n['separator']);
                }
                else
                {
                    if ($n2[1] == 0)
                    {
                        $number = number_format($num, 0, $n['decimal'], $n['separator']);
                    }
                    else
                    {
                        if ($precision == true)
                        {
                            $number = number_format($num, 2, $n['decimal'], $n['separator']);
                        }
                        else
                        {
                            $number = number_format($num, 0, $n['decimal'], $n['separator']);
                        }
                    }
                }
            }
        }

    }

    if (!empty($currency))
    {
        if ($currency == true)
        {
            $currency = 'Rp. ';
            $number = $currency . $number;
        }
        else
        {
            $number = $currency . $number;
        }
    }

    return $number;
}


/**
 * @abstract Function clear number formated
 * @param {string}
 * @return String
 */
function clearformattedNumber($number)
{
    if (!empty($number) || $number != '')
    {
        $n      = getLocalformatNumber();
        // $x      = strpos($number, ',');
        // $xx     = substr($number, -3, 1);

        $number = (string) $number;
        $number = explode(' ', $number);
        $number = end($number);

        // $val    = empty($x) ? $n['decimal'] : ($xx == ',' ? $n['decimal'] : $n['separator']);
        $val    = $n['separator'];

        $number = str_replace($val, '', $number);
    }

    return $number;
}