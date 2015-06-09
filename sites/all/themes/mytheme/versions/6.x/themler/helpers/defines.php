<?php

define('PREVIEW_SUFFIX', '_preview');
define('INF_EXT', '.inf');
define('INFO_EXT', '.info');
define('DEFAULT_THEME_NAME', '{theme_name}');
define('PROJECT_FILE', 'project.json');
define('IMG_PATH_TOKEN', '../images');

function get_base_url_with_slash($url = '') {
    $base_url = empty($url) ? $GLOBALS["base_url"] : $url;
    return $base_url . (substr($base_url, -1) !== '/' ? '/' : '');
}

function get_theme_dir($theme_name) {
    return FilesHelper::normalize_path(realpath(drupal_get_path('theme', $theme_name)));
}

function get_preview_theme_name($theme_name = '') {
    if (!empty($theme_name))
        return $theme_name . PREVIEW_SUFFIX;
    return '';
}

function get_preview_theme_url($theme_url) {
    return $theme_url.PREVIEW_SUFFIX;
}

function get_preview_theme_dir($theme_dir) {
    return $theme_dir.PREVIEW_SUFFIX;
}

function get_project_path($theme_dir) {
    return $theme_dir . '/project/' . PROJECT_FILE;
}

function get_modules_dir() {
    $modules_dir = FilesHelper::normalize_path(realpath(drupal_get_path('module', 'themler')));
    $modules_dir = substr($modules_dir, 0, strpos($modules_dir, '/themler'));
    return $modules_dir;
}

function get_files_dir() {
    return FilesHelper::normalize_path(realpath(file_directory_path()));
}