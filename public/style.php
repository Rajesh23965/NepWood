<?php header("Content-type: text/css");

$textRed = "#ee1d2a";

//Uncomment line below for green theme

// $mainColor = '#128363';
// $topbar ='#037555';
// $menu = '#037555';
// $footer = '#037555';
// $copyright ='#036348';



//Uncomment line below for blue theme

$mainColor = '#1f60ba';
$topbar = '#1f60ba';
$menu = '#1f60ba';
$footer = '#1f60ba';
$copyright = '#1b57ab';

echo ":root { 
--cs-main-color: $mainColor; 
--cs-top-bar:$topbar; 
--cs-menu:$menu; 
--footer:$footer; 
--footer-copyright:$copyright;
--text-red:$textRed;
}\n";