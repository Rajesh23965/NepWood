<?php

if (!function_exists('createCustomSlug')) {
    function createCustomSlug($string)
    {
        $string = trim($string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9_ोौेैा्ीिीूुंःअआइईउऊएऐओऔकखगघचछजझञटठडढतथदधनपफबभमयरलवसशषहश्रक्षटठडढङणनऋड़\s-]/u', '', $string);
        $string = preg_replace('/[\s-]+/', ' ', $string);
        $string = preg_replace('/[\s]/', '-', $string);
        return $string;
    }
}