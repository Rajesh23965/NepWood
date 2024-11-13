<?php

if (!function_exists('convertbstoad')) {
    function convertbstoad($postdate, $nepaliDateLib)
    {

        // echo $postdate; die;
        $date_array = explode("-", $postdate[0]);
        $year = $date_array[0];
        $month = $date_array[1];
        $day = $date_array[2];
        return $nepaliDateLib->convertBsToAd($year, $month, $day);
    }
}

