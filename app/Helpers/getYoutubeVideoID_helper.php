<?php

if (!function_exists('getYoutubeVideoID')) {
    function getYoutubeVideoID($url)
{
    $videoID = null;
    $urlParts = parse_url($url);
    if (isset($urlParts['query'])) {
        parse_str($urlParts['query'], $params);
        if (isset($params['v'])) {
            $videoID = $params['v'];
        } elseif (isset($params['list']) && isset($params['index'])) {
            // Handle case where URL is part of a playlist
            $videoID = $params['list'] . '&index=' . $params['index'];
        }
    } elseif (isset($urlParts['path'])) {
        // Handle case where URL is in the format /embed/{videoID}
        $pathParts = explode('/', trim($urlParts['path'], '/'));
        $videoID = end($pathParts);
    }
    return $videoID;
}
}

