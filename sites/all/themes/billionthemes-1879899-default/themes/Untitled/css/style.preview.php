<?php

header('Content-Type: text/css');

global $preview_dir, $theme_name;

if (empty($_GET["theme"]))
    die('Theme name cannot be empty');
    
$preview_dir  = dirname(__FILE__) .'/../';
$preview_name = basename($_GET["theme"]);
$theme_name   = preg_replace('/(.*)(_preview$)/', '$1', $preview_name);
$style        = file_get_contents('style.css');

function replace_image_callback($matches) {
    global $preview_dir, $theme_name;
    $image = $matches[1];
    $preview_image_path = $preview_dir . '/images/' . $image;
    $image_path = (file_exists($preview_image_path) ? '../' : '../../' . $theme_name . '/') . 'images/' . $image;
    return 'url' . '(' . $image_path . ')';
}

$style_preview = preg_replace_callback('/url\(..\/images\/(.+)\)/', 'replace_image_callback', $style);
echo $style_preview;