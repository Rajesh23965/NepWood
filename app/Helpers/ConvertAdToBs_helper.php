<?php

if (!function_exists('convertadtobs')) {
    function convertadtobs($postdate, $nepaliDateLib)
    {

        $date_array = explode("-", $postdate);
        // print_r($date_array); die;
        $year = $date_array[0];
        $month = $date_array[1];
        $day = $date_array[2];
        return $nepaliDateLib->convertAdToBs($year, $month, $day);
    }
}