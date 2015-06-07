<?php

require_once(dirname(__FILE__).'/pclzip/pclzip.lib.php');

function download($theme_name, $user_theme_name, $includeThemler = true) {
    register_shutdown_function('fatal_error_shutdown_handler');
    $archive_file = generate_archive($theme_name, $user_theme_name, $includeThemler);

    if (is_readable($archive_file)) {
        $archive_content = array(
            'ext' => 'zip',
            'content' => base64_encode(file_get_contents($archive_file))
        );
        unlink($archive_file);
        return $archive_content;
    }

    die('Archive file: ' . $archive_file. ' is not readable');
}

function generate_archive($base_theme_name, $user_theme_name, $includeThemler) {
    $theme_dir = get_theme_dir($base_theme_name);
    if (!file_exists($theme_dir)){
        die('Error : No Theme Folder');
    }

    $useBaseTheme = empty($user_theme_name) || ($user_theme_name == $base_theme_name);
    if ($useBaseTheme) {
        $user_theme_name = $base_theme_name;
        $replace_data = null;
        $preview_info_replace_data = null;
    }
    else {
        $replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => $base_theme_name, 'new_name' => $user_theme_name);
        $preview_info_replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => get_preview_theme_name($base_theme_name), 'new_name' => get_preview_theme_name($user_theme_name));
    }

    $base_upload_dir  = get_themler_storage_dir();
    $theme_upload_dir = $base_upload_dir . '/themes';
    if (!is_dir($theme_upload_dir))
        if (!mkdir($theme_upload_dir, 0777, true))
            die('Failed to create theme upload folder ' . $theme_upload_dir);

    $archive_name = 'theme_' . uniqid(time()) .  '.zip';
    $archive_file = $base_upload_dir . '/' . $archive_name;
    $archive = new PclZip($archive_file);

    $user_template_dir = $theme_upload_dir . '/' . $user_theme_name;
    FilesHelper::copy_recursive($theme_dir, $user_template_dir, null, $replace_data);

    if ($includeThemler) {
        $preview_theme_dir = get_preview_theme_dir($theme_dir);
        $inner_preview_dir = $user_template_dir . '/' . get_preview_theme_name($user_theme_name);
        FilesHelper::copy_recursive($preview_theme_dir, $inner_preview_dir, null, $preview_info_replace_data);
        add_modules($archive, $user_template_dir, $base_upload_dir);
    } else {
        clearDirs($user_template_dir, array('export', 'project', 'themler'));
    }

    add_files_to_archive_root($archive, $user_template_dir);
    add_folder($archive, $theme_upload_dir, $base_upload_dir);

    return $archive_file;
}

function add_modules(&$archive, $user_template_dir, $base_upload_dir) {
    $name         = 'themler';
    $common_files = $user_template_dir . '/' . $name;
    $versions     = get_support_versions();
    $helper_path  = '/helpers/archiveHelper.php';
    $helper       = file_get_contents(get_modules_dir() . '/' . $name . $helper_path);
    
    foreach ($versions as $version) {
        $version_files = $user_template_dir . '/versions/' . $version . '/' . $name;
        $upload_dir    = $base_upload_dir . (has_current_version($version) ? '' : '/' . $version) . '/modules/' . $name;
        if (!is_dir($upload_dir))
            if (!mkdir($upload_dir, 0777, true))
                die('Failed to create module upload folder ' . $upload_dir);

        FilesHelper::copy_recursive($common_files, $upload_dir);
        FilesHelper::copy_recursive($version_files, $upload_dir);
        FilesHelper::write($upload_dir . $helper_path, $helper);
        rename ($upload_dir . '/'. $name . INF_EXT, $upload_dir . '/'. $name . INFO_EXT);

        add_folder($archive, $upload_dir, $base_upload_dir);
    }
}

function clearDirs($base_path, $dirs, $self = true) {
    foreach ($dirs as $dir) {
        FilesHelper::remove($base_path . '/' . $dir, $self);
    }
}

function add_folder(&$archive, $upload_dir, $base_upload_dir) {
    add_to_archive($archive, $upload_dir, $base_upload_dir);
    FilesHelper::remove($upload_dir, true);
}

function delete_from_archive(&$archive, $fileName) {
    if (($list = $archive->listContent()) == 0) {
        die("Error : ".$zip->errorInfo(true));
    }

    for ($i = 0; $i < sizeof($list); $i++) {
        if (strpos($list[$i]['filename'], $fileName) !== FALSE) {
            $v_list = $archive->delete(PCLZIP_OPT_BY_INDEX, "$i");
            if ($v_list == 0) {
                die("Error : ".$archive->errorInfo(true));
            }
        }
    }
}

function add_to_archive(&$archive, $dir, $remove_path) {
    $v_list = $archive->add($dir, PCLZIP_OPT_ADD_PATH, '', PCLZIP_OPT_REMOVE_PATH, $remove_path);
    if ($v_list == 0) {
        die('Error to add ' . $dir . ': ' . $archive->errorInfo(true));
    }
}

function add_files_to_archive_root(&$archive, $user_template_dir) {
    $paths = array('ReadMe.txt' => FilesHelper::normalize_path($user_template_dir . '/ReadMe.txt'));
    foreach ($paths as $name => $path) {
        if (!file_exists($path))
            continue;

        add_to_archive($archive, $path, $user_template_dir);
    }
}