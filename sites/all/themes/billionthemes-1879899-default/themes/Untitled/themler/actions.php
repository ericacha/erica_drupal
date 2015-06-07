<?php

require_once(dirname(__FILE__).'/helpers/archiveHelper.php');
require_once(dirname(__FILE__).'/helpers/chunk.php');
require_once(dirname(__FILE__).'/helpers/defines.php');
require_once(dirname(__FILE__).'/helpers/editorHelper.php');
require_once(dirname(__FILE__).'/helpers/filesHelper.php');
require_once(dirname(__FILE__).'/helpers/logFormatter.php');
require_once(dirname(__FILE__).'/helpers/previewHelper.php');
require_once(dirname(__FILE__).'/helpers/processThemeHelper.php');
require_once(dirname(__FILE__).'/helpers/version.php');

/**
 * Updates Themler theme
 */
function update($theme_name) {
    ProviderLog::start('update');
    $theme_dir = get_theme_dir($theme_name);
    $preview_theme_dir = get_preview_theme_dir($theme_dir);
    $preview_theme_name = get_preview_theme_name($theme_name);
    $replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => $theme_name, 'new_name' => $preview_theme_name);
    $helper = new PreviewHelper($theme_dir);
    $callback = array($helper, 'restoreDataId');
    ProviderLog::start('Update files');
    $changedFiles = get_preview_changed_files($theme_dir);
    if ($changedFiles === null || !file_exists($preview_theme_dir)) {
        FilesHelper::copy_recursive($theme_dir, $preview_theme_dir, $callback, $replace_data);
        $dirs = array('export', 'project');
        foreach ($dirs as $dir)
            FilesHelper::empty_dir($preview_theme_dir . '/' . $dir, true);
    } else {
        // copy only changed files
        foreach($changedFiles as $file) {
            if (file_exists($theme_dir . $file)) {
                FilesHelper::copy_recursive($theme_dir . $file, $preview_theme_dir . $file, $callback, $replace_data);
            }
            // $changed_files contains {$preview_name}.inf not {$theme_name}.inf - so we must rename it before
            elseif (strpos($file, $preview_theme_name . INF_EXT) !== false) {
                $new_file = str_replace($preview_theme_name . INF_EXT, $theme_name . INF_EXT, $file);
                if (file_exists($theme_dir . $new_file)) {
                    FilesHelper::copy_recursive($theme_dir . $new_file, $preview_theme_dir . $file, $callback, $replace_data);
                }
            }
            else {
                if (is_file($preview_theme_dir . $file)) {
                    unlink($preview_theme_dir . $file);
                }
            }
        }
        set_preview_changed_files($theme_dir, $preview_theme_dir, array());
    }
    ProviderLog::end('Update files');
    ProviderLog::end('update');

    return array('result' => 'done', 'log' => ProviderLog::getLog());
}

/**
 * Exports Themler theme
 */
function export($theme_name, $info) {
    $chunk = new Chunk();
    if (!$chunk->save($info)) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
        return array();
    }

    if ($chunk->last()) {
        ProviderLog::start('export');
        ProviderLog::start('export:json_decode');
        $content = json_decode($chunk->complete(), true);
        ProviderLog::end('export:json_decode');
        process_theme($theme_name, $content);
        ProviderLog::end('export');
        return array('result' => 'done', 'log' => ProviderLog::getLog());
    }
    return array('result' => 'processed');
}

/**
 * Saves Themler project to current theme
 */
function save($info, $theme_name, $isNew) {
    $modules_dir = get_modules_dir();
    $theme_dir = get_theme_dir($theme_name);
    $cms_version = get_cms_version();
    $chunk = new Chunk();
    if (!$chunk->save($info)) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
        return array();
    }

    if ($chunk->last()) {
        ProviderLog::start('save');
        $clear_cache = false;
        ProviderLog::start('save:json decode');
        $result = json_decode($chunk->complete(), true);
        ProviderLog::end('save:json decode');
        $preview_theme_dir = get_preview_theme_dir($theme_dir);
        $preview_theme_name = get_preview_theme_name($theme_name);
        $replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => $preview_theme_name, 'new_name' => $theme_name);

        $screenshots    = array_key_exists('thumbnails', $result) > 0 ? $result['thumbnails'] : '';
        $css_js_sources = array_key_exists('cssJsSources', $result) > 0 ? $result['cssJsSources'] : '';
        $md5_hashes     = array_key_exists('md5Hashes', $result) > 0 ? $result['md5Hashes'] : '';
        $project_data   = array_key_exists('projectData', $result) > 0 ? $result['projectData'] : '';
        $images = empty($result['images']) ? null : $result['images'];

        $helper = new PreviewHelper($theme_dir);
        $callback = array($helper, 'removeDataId');
        $changed_files = get_preview_changed_files($theme_dir);

        ProviderLog::start('Save files');
        FilesHelper::delete_file($theme_dir . '/css/style.min.css');
        FilesHelper::delete_file($theme_dir . '/css/bootstrap.min.css');

        foreach($changed_files as $file) {
            if (file_exists($preview_theme_dir . $file)) {
                $theme_file_dir = dirname($preview_theme_dir . $file);
                // current cms version or common themler files
                if ((strpos($file, 'themler/') !== false) && (has_current_version($file) || !has_version($file))) {
                    // replace current version in path if it's available there
                    $new_file = FilesHelper::replace_content($file, '/versions/' . $cms_version .'/', '/');
                    $new_file = FilesHelper::replace_content($new_file, INF_EXT, INFO_EXT);
                    FilesHelper::copy_recursive($preview_theme_dir . $file, $modules_dir . $new_file);
                    $clear_cache = true;
                }
                if (preg_match('#[\\\/]images$#', $theme_file_dir)) { // file inside 'images' directory moves to base theme
                    // TODO: add permissions process
                    rename($preview_theme_dir . $file, $theme_dir . $file);
                } else {
                    FilesHelper::copy_recursive($preview_theme_dir . $file, $theme_dir . $file, $callback, $replace_data);
                }
            } else {
                $helper->removeKey($file);
                FilesHelper::delete_file($theme_dir . $file);
            }
        }
        ProviderLog::end('Save files');
        set_preview_changed_files($theme_dir, $preview_theme_dir, array());
        $helper->save();

        ProviderLog::start('Save images');
        process_images($theme_dir, $images, $changed_files);
        FilesHelper::empty_dir_recursive($preview_theme_dir . '/images');
        ProviderLog::end('Save images');

        save_screenshots(array($theme_dir, $preview_theme_dir), $screenshots);

        if (!empty($project_data))
            save_project($project_data, $theme_dir);

        //if ($isNew) // TODO:save and publish new theme
            //Themler::setActiveThemeForShop($this->_themeName);

        if (!empty($css_js_sources ))
            set_theme_cache($theme_dir, $css_js_sources);
        
        if (!empty($md5_hashes))
            set_theme_hashes($theme_dir, $md5_hashes);

        if ($clear_cache) { // clears Drupal cache if module changed
            ProviderLog::start('drupal_flush_all_caches');
            drupal_flush_all_caches();
            ProviderLog::end('drupal_flush_all_caches');
        }

        ProviderLog::end('save');
        return array('result' => 'done', 'log' => ProviderLog::getLog());
    }
    return array('result' => 'processed');
}

/**
 * Renames Themler theme
 */
function rename_theme($theme_name, $new_theme_name) {
    ProviderLog::start('rename');
    $rename = can_rename($theme_name, $new_theme_name);

    if ($rename['result']) {
        $theme_dir = get_theme_dir($theme_name);
        $preview_theme_name = get_preview_theme_name($theme_name);
        $preview_theme_dir = get_preview_theme_dir($theme_dir);

        $renamed_data = get_renamed_data($theme_name, $new_theme_name);
        $new_theme_name = $renamed_data['new_theme_name'];
        $new_preview_theme_name = get_preview_theme_name($new_theme_name);
        $new_theme_dir = $renamed_data['new_theme_dir'];
        $new_theme_preview_dir = get_preview_theme_dir($new_theme_dir);

        if (file_exists($preview_theme_dir)) {
            $replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => $preview_theme_name, 'new_name' => $new_preview_theme_name);
            FilesHelper::copy_recursive($preview_theme_dir, $new_theme_preview_dir, null, $replace_data);
        }
        
        $replace_data = array('method' => array('FilesHelper', 'replace_theme_name'), 'old_name' => $theme_name, 'new_name' => $new_theme_name);
        FilesHelper::copy_recursive($theme_dir, $new_theme_dir, null, $replace_data);
    }

    ProviderLog::end('rename');

    return $rename;
}

function can_rename($theme_name, $new_theme_name) {
    $error = get_rename_error($theme_name, $new_theme_name);
    if (isset($error))
        return array('result' => false, 'error' => $error);
    return array('result' => true);
}

function get_rename_error($theme_name, $new_theme_name) {
    $renamedData = get_renamed_data($theme_name, $new_theme_name);
    if (!isset($renamedData))
        return 'Theme name is invalid';

    $path = drupal_get_path('theme', $renamedData['new_theme_name']);
    if (!empty($path) || file_exists($renamedData['new_theme_dir']))
        return 'Theme with such name already exists';

    return null;
}

function get_renamed_data($theme_name, $new_theme_name) {
    if (theme_name_is_valid($new_theme_name)) {
        $theme_dir     = get_theme_dir($theme_name);
        $new_theme_dir = str_replace($theme_name, $new_theme_name, $theme_dir);
        return array('new_theme_name' => $new_theme_name, 'new_theme_dir' => $new_theme_dir);
    }

    return null;
}

function theme_name_validate($theme_name) {
    if (empty($theme_name)) return 'Theme name cannot be empty';
    return theme_name_is_valid($theme_name) ? 'true' : 'Theme name cannot start with numbers';
}

function theme_name_is_valid($new_theme_name) {
    return preg_match('|^[A-Za-z]([A-Za-z\d_]+)|i', $new_theme_name) == 1;
}

function get_files($theme_name, $mask, $filter) {
    $theme_dir = get_theme_dir($theme_name);
    $files     = _getFiles($theme_dir . '/css/{' . $mask . '}', GLOB_BRACE);

    $out_files = array();
    foreach ($files as $file) {
        $info = pathinfo($file);
        $filename = $info['basename'];
        if (is_dir($file) || !preg_match("#bootstrap\.css|style\.css#", $filename) || ($filter && preg_match("#$filter#", $filename))) {
            continue;
        }
        $out_files[$filename] = file_get_contents($file);
    }

    return array('files' => $out_files);
}

function set_files() {
    $files = array();
    $response = null;

    $data = isset($_POST['files']) ? $_POST['files'] : false;
    if ($data) {
        $files = json_decode($data, true);
        if (null === $files) {
            trigger_error('Data is incorrect in setFiles method: "' . $data . '"', E_USER_ERROR);
        }
        $response = array('result' => 'OK');
    }
    else
    {
        $chunk = new Chunk();

        if (!$chunk->save(getChunkInfo())) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
            return array();
        }

        if ($chunk->last())
        {
            $files = json_decode($chunk->complete(), true);
            $response = array('result' => 'done');
        }
        else 
        {
            $response = array('result' => 'processed');
        }
    }

    if ($files && count($files)) {
        _setFiles($files);
    }

    return $response;
}

function _getFiles($mask, $flags) {
    $files = glob($mask, $flags);
    if (!is_array($files)) {
        $files = array();
    }
    $folders = glob(dirname($mask) . '/*', GLOB_ONLYDIR | GLOB_NOSORT);
    if (!is_array($folders)) {
        $folders = array();
    }
    foreach ($folders as $dir) {
        $files = array_merge($files, _getFiles($dir . '/' . basename($mask), $flags));
    }

    return $files;
}

function _setFiles($files) {
    $theme_name = $_POST['themeName'];
    $theme_dir = get_theme_dir($theme_name);
    foreach ($files as $filename => $content) {
        file_put_contents($theme_dir . '/css/' . $filename, $content, LOCK_EX);
    }

    return;
}

function clear_chunk() {
    $chunk = new Chunk();
    $chunk->clear_chunk_directory();
}

function getExportInfo() {
    $data = isset($_POST['info']) ? $_POST['info'] : false;
    if ($data === false) {
        $info = getChunkInfo();
    } else {
        $info = json_decode($data, true);
    }
    if (null === $info) {
        trigger_error('Data is incorrect: "' . $data . '"', E_USER_ERROR);
    }
    return $info;
}

function getChunkInfo() {
    return array(
        'id' => isset($_POST['id']) ? $_POST['id'] : '',
        'content' => isset($_POST['content']) ? $_POST['content'] : '',
        'current' => isset($_POST['current']) ? $_POST['current'] : '',
        'total' => isset($_POST['total']) ? $_POST['total'] : '',
        'encode' => !empty($_POST['encode']),
        'blob' => !empty($_POST['blob'])
    );
}

function upload_image($theme_name) {
    ProviderLog::start('upload_image');
    $theme_dir = get_theme_dir($theme_name);
    $preview_theme_dir = get_preview_theme_dir($theme_dir);
    $images_dir = $preview_theme_dir . '/images';

    $filename = isset($_REQUEST['filename']) ? $_REQUEST['filename'] : false;
    $is_last = isset($_REQUEST['last']) ? $_REQUEST['last'] : false;
    $content_range = $_SERVER['HTTP_CONTENT_RANGE'];

    $base_path = $images_dir . '/' . $filename;
    $base_upload_dir = get_themler_storage_dir();

    if (empty($base_upload_dir)) {
        $result = array(
            'status' => 'error',
            'message' => 'Upload folder error: ' . $base_upload_dir
        );
    } elseif (!isset($_FILES['chunk']) || !file_exists($_FILES['chunk']['tmp_name'])) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty chunk data'
        );
    } elseif (!$content_range && !$is_last) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty Content-Range header'
        );
    } elseif (!$filename) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty file name'
        );
    } elseif (!file_exists($images_dir) && !mkdir($images_dir, 0776, true)) {
        $result = array(
            'status' => 'error',
            'message' => 'Failed to create an image folder ' . $images_dir
        );
    } else {
        $tmp_path = $base_upload_dir . '/' . $filename . '.tmp';
        $range_begin = 0;

        if ($content_range) {
            list($range, $total) = explode('/', str_replace('bytes ', '', $content_range));
            list($range_begin, $range_end) = explode('-', $range);
        }

        $file = fopen($tmp_path, 'c');

        if (flock($file, LOCK_EX)) {

            fseek($file, (int) $range_begin);
            fwrite($file, file_get_contents($_FILES['chunk']['tmp_name']));

            flock($file, LOCK_UN);
            fclose($file);
        }

        if ($is_last) {
            if (file_exists($base_path))
                unlink($base_path);
            @mkdir(dirname($base_path), 0776, true);
            rename($tmp_path, $base_path);
            $result = array(
                'status' => 'done',
                'url' => $GLOBALS['base_url'] . '/' . drupal_get_path('theme', $theme_name . '_preview') . '/images/' . $filename
            );
            $changed_files = get_preview_changed_files($theme_dir);
            $changed_files[] = $base_path;
            set_preview_changed_files($theme_dir, $preview_theme_dir, $changed_files);
        } else {
            $result = array(
                'status' => 'processed'
            );
        }
    }
    ProviderLog::end('upload_image');
    return $result;
}