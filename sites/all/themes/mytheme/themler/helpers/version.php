<?php

function get_support_versions() {
    return array('6.x', '7.x');
}

function get_cms_version() {
    return DRUPAL_CORE_COMPATIBILITY;
}

function has_current_version($entity) {
    return strpos($entity, get_cms_version()) !== false;
}

function has_version($entity) {
    $support_versions = get_support_versions();
    foreach ($support_versions as $version)
        if (strpos($entity, $version) !== false)
            return $version;
    return false;
}

function correct_version_path($path) {
    $support_versions = get_support_versions();
    foreach ($support_versions as $version) {
        if (strpos($path, $version) !== false) { // has version in path
            // current version CMS control export with and without version folder
            if (has_current_version($version))
                return array($path, clear_version($path, $version));
            return array($path); // ohterwise export to version folder
        }
    }
    return array($path); // export common control file as usual
}

function get_support_versions_folder($folder) {
    $support_versions = get_support_versions();
    $result = array();
    foreach ($support_versions as $version) {
        $result[$version] = $folder . '/' . $version;
    }
    return $result;
}

function clear_version($entity, $version) {
    if (isset($version) && strpos($entity, $version) !== false) 
        return str_replace($version, '', $entity);
    return $entity;
}

function get_current_version_files($preview_theme_dir) {
    $cms_version_dir = $preview_theme_dir . '/' . get_cms_version();
    $files = FilesHelper::enumerate_files($cms_version_dir);
    $result = array();
    foreach ($files as $file) {
        $result[] = str_replace($cms_version_dir, '', $file['path']);
    }
    return $result;
}