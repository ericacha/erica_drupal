<?php

function process_theme($theme_name, $content) {
    $theme_dir = get_theme_dir($theme_name);
    $preview_theme_dir = get_preview_theme_dir($theme_dir);
    $preview_theme_name = $theme_name . PREVIEW_SUFFIX;

    $changed_files = get_preview_changed_files($theme_dir);
    if (!is_array($changed_files))
        $changed_files = array();

    $positions      = isset($content['positions'])    ? $content['positions']    : null;
    $theme          = isset($content['themeFso'])     ? $content['themeFso']     : null;
    $images         = isset($content['images'])       ? $content['images']       : null;
    $fonts          = isset($content['iconSetFiles']) ? $content['iconSetFiles'] : null;
    
    $replaceInfo = array();
    $replaceInfo = array_merge_recursive($replaceInfo, (array)process_fonts($preview_theme_dir, $fonts, $changed_files));
    $replaceInfo = array_merge_recursive($replaceInfo, (array)process_images($preview_theme_dir, $images, $changed_files));
    $hasReplace = isset($replaceInfo) && isset($replaceInfo['ids']) && isset($replaceInfo['paths']);

    ProviderLog::start('fill_theme_storage');
    fill_theme_storage($theme, $changed_files, $replaceInfo, $hasReplace, $preview_theme_dir, $preview_theme_name, $preview_theme_dir);
    ProviderLog::end('fill_theme_storage');
    ProviderLog::start('build_theme_files');
    build_theme_files($preview_theme_dir, $preview_theme_name, $changed_files);
    ProviderLog::end('build_theme_files');
    set_preview_changed_files($theme_dir, $preview_theme_dir, $changed_files);

    //if (isset($positions))
        //PositionController::savePositions($positions);
}

function process_images($theme_dir, $images, &$changed_files) {
    if (!isset($images) || !is_array($images)) return null;
    
    $imageDir = $theme_dir . '/images';
    if (!is_dir($imageDir)) {
        if (!mkdir($imageDir, 0777, true))
            die('Failed to create folder!');
    }

    ProviderLog::start('process_images');
    $ids = array();
    $paths = array();
    foreach ($images as $id => $content) {
        /* STORAGE */
        $imageFileName = preg_replace('/[^a-z0-9_\.]/i', '', $id);
        $imagePath = $imageDir . '/' . $imageFileName;

        if ($content) {
            $changed_files[] = $imagePath;
            if ($content === '[DELETED]') {
                if (is_file($imagePath)) {
                    unlink($imagePath);
                }
                continue;
            }
            file_put_contents($imagePath,  base64_decode($content));
        }

        $ids[] = $id;
        $paths[] = IMG_PATH_TOKEN . '/' . $imageFileName; // css path
    }
    ProviderLog::end('process_images');
    return array('ids' => $ids, 'paths' => $paths);
}

/**
 * Saves theme fonts
 */
function process_fonts($theme_dir, $fonts, &$changed_files) {
    if (!isset($fonts)) return null;
    
    $fontsDir = $theme_dir . '/fonts';
    if (!is_dir($fontsDir))
        if (!mkdir($fontsDir, 0777, true))
            die('Failed to create folder!');

    ProviderLog::start('process_fonts');
    foreach ($fonts as $name => $content) {
        $path = $fontsDir . '/' . $name;
        file_put_contents($path, base64_decode($content));
        $changed_files[] = $path;
    }

    $existingFonts = scandir($fontsDir);
    $ids = array();
    $paths = array();
    foreach($existingFonts as $filename)
        if ($filename !== '.' && $filename !== '..') {
            $ids[] = $filename;
            $paths[] = '../fonts/' . $filename;
        }

    ProviderLog::end('process_fonts');
    return array('ids' => $ids, 'paths' => $paths);
}

function save_screenshots($dirs, $screenshots) {
    ProviderLog::start('save_screenshots');
    if(is_array($screenshots)) {
        foreach($screenshots as $screenshot) {
            $img = base64_decode(str_replace('data:image/png;base64,', '', $screenshot['data']));
            if (isset($screenshot['version'])) {
                foreach ($dirs as $dir) {
                    file_put_contents($dir . '/versions/' . $screenshot['version'] . '/' . $screenshot['name'], $img);
                }
            }
        }
    }
    ProviderLog::end('save_screenshots');
}

function fill_theme_storage($fso, &$changed_files, &$replaceInfo, $hasReplace, $theme_dir, $theme_name, $path) {
    if (!isset($fso) || !is_array($fso) || !is_array($fso['items'])) {
        return;
    }

    foreach ($fso['items'] as $name => $file) {
        if (isset($file['content']) && isset($file['type'])) {
            $to = $path . '/' . $name;
            $content = $file['type'] == 'text' ? $file['content'] : base64_decode($file['content']);
            process_file($to, $content, $changed_files, $replaceInfo, $hasReplace, $theme_dir, $theme_name);
        } elseif (isset($file['items']) && isset($file['type'])) {
            fill_theme_storage($file, $changed_files, $replaceInfo, $hasReplace, $theme_dir, $theme_name, $path . '/' . $name);
        }
    }
}

function process_file($path, $content, &$changed_files, &$replaceInfo, $hasReplace, $theme_dir, $theme_name) {
    if ($content === '[DELETED]') {
        if (is_file($path))
            unlink($path);
        return;
    }
    
    $info = pathinfo($path);
    $fileName = $info['basename'];
    $fileExt = isset($info['extension']) && $info['extension'] ? $info['extension'] : '';
    $is_html = false;
    if (in_array($fileExt, array('js')) && (strpos($path, 'themler/') === false)) {
        $path = strpos($path, '/js/') ? $path : $theme_dir . '/js/'. $fileName;
    } 
    elseif (in_array($fileExt, array('css')) && (strpos($path, 'themler/') === false)) {
        $path = strpos($path, '/css/') ? $path : $theme_dir . '/css/'. $fileName;
        $content = $hasReplace ? str_replace($replaceInfo['ids'], $replaceInfo['paths'], $content) : $content;
    }
    elseif (in_array($fileExt, array('html', 'php')) && (strpos($path, 'themler/') === false)) {
        $content = FilesHelper::replace_content($content, DEFAULT_THEME_NAME, $theme_name);
        $content = $hasReplace ? replace_image_id($content, $replaceInfo) : $content;
        if (in_array($fileExt, array('html'))) {
            build_theme_page_file($content, $info, $theme_dir, $changed_files);
            $is_html = true;
        }
    }
    if (!$is_html) { // do not save html files
        save_to_change($path, $content, $changed_files);
    }
}

function replace_image_id($content, $replaceInfo) {
    $result = $content;
    foreach ($replaceInfo['ids'] as $key => $value) { // replace <img src="url(id)"> to <img src="$url">
        $result = str_replace('url('.$value.')', '<?php echo theme_get_image_path(\'' . $replaceInfo['paths'][$key] . '\'); ?>', $result);
    }
    $result = preg_replace('#url\((https?://[^\)]+)\)#', '$1', $result);

    return $result;
}

function build_theme_page_file($content, $file_info, $theme_dir, &$changed_files) {
    $templates_dir = $theme_dir . '/templates';
    foreach (get_support_versions() as $version) {
        $method = 'build_'.str_replace('.', '', $version);
        if (function_exists($method)) {
            $method($content, $file_info, $templates_dir, $changed_files);
        }
    }
}

function build_6x($content, $file_info, $templates_dir, &$changed_files) {
    $name = $file_info['filename'];
    $suffix = '';
    switch ($name) {
        case 'home':
            $suffix = '-front';
            break;
        case 'blogTemplate':
            $suffix = '-blog';
            break;
        case 'singlePostTemplate':
            $suffix = '-node-story';
            break;
        case 'forumTemplate':
            $suffix = '-node-forum';
            break;
        case 'pageTemplate':
            $suffix = '-node';
            break;
        case 'default':
            $suffix = '-default';
            $maintenance_path = $templates_dir . '/page/maintenance-page.tpl.php';
            save_to_change($maintenance_path, $content, $changed_files);
            break;
        default:
            $suffix = '-'.$name;
            break;
    }

    $page_path = $templates_dir . '/page/page' . $suffix . '.tpl.php';
    save_to_change($page_path, $content, $changed_files);
}

function build_7x($content, $file_info, $templates_dir, &$changed_files) {
    $html_content = "\n<?php print \$page_top; ?>\n<?php print \$page; ?>\n<?php print \$page_bottom; ?>\n";
    $pattern = '/(.*?<body.*?\?>>)(.*?)(<\/body.*?html>)/si';
    $page = preg_replace($pattern, '$2', $content);
    $html = preg_replace($pattern, '$1'.$html_content.'$3', $content);
    
    $name = $file_info['filename'];
    $suffix = '';
    switch ($name) {
        case 'home':
            $suffix = '--front';
            break;
        case 'blogTemplate':
            $suffix = '--blog';
            break;
        case 'singlePostTemplate':
            $suffix = '--node--article';
            break;
        case 'forumTemplate':
            $suffix = '--node--forum';
            break;
        case 'pageTemplate':
            $suffix = '--node';
            break;
        case 'default':
            $suffix = '--default';
            $maintenance_path = $templates_dir . '/page/maintenance-page.tpl.php';
            save_to_change($maintenance_path, $content, $changed_files);
            break;
        default:
            $suffix = '--'.$name;
            break;
    }

    $html_path = $templates_dir . '/html/html' . $suffix . '.tpl.php';
    $page_path = $templates_dir . '/page/page' . $suffix . '.tpl.php';
    save_to_change($html_path, $html, $changed_files);
    save_to_change($page_path, $page, $changed_files);
}

function build_theme_files($theme_dir, $theme_name, &$changed_files) {
    $dirs = get_support_versions_folder($theme_dir . '/versions');
    $info = build_info($theme_dir);
    $result = '';
    foreach ($dirs as $version => $dir) {
        $theme_info = FilesHelper::replace_content(file_get_contents($dir . '/info/theme' . INF_EXT), DEFAULT_THEME_NAME, $theme_name) . $info;

        $path = $dir . '/' . $theme_name . INF_EXT;
        $result = has_current_version($version) ? $theme_info : $result;
        save_to_change($path, $theme_info, $changed_files);
    }

    $path = $theme_dir . '/' . $theme_name . INFO_EXT;
    $content = file_exists($path) ? file_get_contents($path) : '';

    save_to_change($path, $result, $changed_files); // saves to $changed_files always
    if ($result !== $content) { // clears Drupal cache
        drupal_flush_all_caches();
    }
}

function save_to_change($path, $content, &$changed_files) {
    FilesHelper::write($path, $content);
    $changed_files[] = $path;
    return;
}

function build_info($theme_dir) {
    $includes = $theme_dir . '/includes';
    $result = '';
    foreach (FilesHelper::enumerate_files($includes, false) as $file) {
        $path = $file['path'];
        $info = pathinfo($path);
        $name = $info['filename'];
        $fileExt = isset($info['extension']) && $info['extension'] ? $info['extension'] : '';
        if (in_array($fileExt, array('inf')))
            $result .= "\n" . file_get_contents($path);
    }

    return $result;
}

function get_max_request_size()
{
    $postSize = to_bytes(ini_get('post_max_size'));
    $uploadSize = to_bytes(ini_get('upload_max_filesize'));
    $memorySize = to_bytes(ini_get('memory_limit'));

    return min($postSize, $uploadSize, $memorySize);
}

function to_bytes($str) {
    $str = strtolower(trim($str));

    if ($str) {
        switch ($str[strlen($str) - 1]) {
            case 'g':
                $str *= 1024;
            case 'm':
                $str *= 1024;
            case 'k':
                $str *= 1024;
        }
    }

    return intval($str);
}

function get_memory_limit() {
    if (!function_exists('ini_get'))
        return -1;
    return to_bytes(ini_get('memory_limit'));
}

function theme_out_of_memory_handler($cannot_allocate) {
    if ($cannot_allocate) {
        $msg = <<<EOL
            <h3>PHP Memory Configuration Error</h3>

            <p>Themler requires at least 64Mb of PHP memory. Please increase your PHP memory to continue.
            For more information, please check this <a href="http://answers.billiondigital.com/articles/5826/out-of-memory" target="_blank">link</a>.</p>
EOL;
    } else {
        $current_memory = get_memory_limit() / 1024 / 1024 . 'Mb';
        $msg = <<<EOL
            <h3>PHP Memory Configuration Error</h3>

            <p>Themler requires at least 64Mb of PHP memory (you have "$current_memory"). Please increase your PHP memory to continue.
            For more information, please check this <a href="http://answers.billiondigital.com/articles/5826/out-of-memory" target="_blank">link</a>.</p>
EOL;
    }
    $page = buildErrorsPage($msg);
    die($page);
}

//http://stackoverflow.com/questions/2726524/can-you-unregister-a-shutdown-function
function theme_memory_limit_shutdown() {
    $error = error_get_last();
    if ($error && $error['type'] === E_ERROR && !isset($GLOBALS['memory_test_passed'])) {
        theme_out_of_memory_handler(true);
    }
}

function theme_test_memory_size() {
    // try to allocate 16Mb
    $alloc_bytes = 16 * 1024 * 1024;
    register_shutdown_function('theme_memory_limit_shutdown');

    $tmp = @str_repeat('.', $alloc_bytes);
    unset($tmp);
    $GLOBALS['memory_test_passed'] = true;

    return true;
}

function theme_check_memory_limit($test_alloc_memory = false) {
    $need_memory_size = 64 * 1024 * 1024;
    $memory = get_memory_limit();

    // can't retrieve memory limit option
    if (-1 == $memory)
        return;

    // try to increase limit
    if ($memory < $need_memory_size) {
        if(!function_exists('ini_set'))
            theme_out_of_memory_handler(false);

        $ret = ini_set('memory_limit', '64M');
        if (!$ret)
            theme_out_of_memory_handler(false);
    }

    // check real limits
    if ($test_alloc_memory)
        theme_test_memory_size();
}

function buildErrorsPage($msg) {
    $output = <<<EOL
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
    <head>
        <style>
            html {
                background: #eee;
            }
            body {
                background: #fff;
                color: #333;
                font-family: "Open Sans", sans-serif;
                margin: 2em auto;
                padding: 1em 2em;
                max-width: 700px;
                -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.13);
                box-shadow: 0 1px 3px rgba(0,0,0,0.13);
                word-break: break-word;
            }
            h3 {
                border-bottom: 1px solid #dadada;
                clear: both;
                color: #666;
                font: 24px "Open Sans", sans-serif;
                margin: 30px 0 0 0;
                padding: 0;
                padding-bottom: 7px;
            }
            #error-page {
                margin-top: 50px;
            }
            #error-page p {
                font-size: 14px;
                line-height: 1.5;
                margin: 25px 0 20px;
            }
            #error-page code {
                font-family: Consolas, Monaco, monospace;
            }
            ul li {
                margin-bottom: 10px;
                font-size: 14px ;
            }
            a {
                color: #21759B;
                text-decoration: none;
            }
            a:hover {
                color: #D54E21;
            }
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Drupal</title>
    </head>
    <body id="error-page">
        $msg
    </body>
EOL;
    return $output;
}