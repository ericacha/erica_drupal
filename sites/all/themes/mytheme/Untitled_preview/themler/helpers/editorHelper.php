<?php

class ProviderLog
{
    private static $_log = array();

    public static function start($key = '')
    {
        ProviderLog::$_log[] = array(
            'key' => '[PHP] ' . $key,
            'type' => 'start',
            'time' => microtime(true) * 1000
        );
    }

    public static function end($key = '')
    {
        ProviderLog::$_log[] = array(
            'key' => '[PHP] ' . $key,
            'type' => 'end',
            'time' => microtime(true) * 1000
        );
    }

    public static function getLog() {
        return ProviderLog::$_log;
    }
}

function get_json_content($path, $assoc = false) {
    ProviderLog::start('get_json_content');
    $result = json_decode((file_exists($path) ? file_get_contents($path) : '{}'), $assoc);
    ProviderLog::end('get_json_content');
    return $result;
}

function set_theme_hashes($current_theme_path, $data = array()) {
    ProviderLog::start('set_theme_hashes');
    $hashesfile = $current_theme_path . '/export/hashes.json';
    $hashes = get_json_content($hashesfile, true);

    foreach ($data as $file => $content) {
        if ('[DELETED]' === $content) {
            if (isset($hashes[$file]))
                unset($hashes[$file]);
        } else {
            $hashes[$file] = $content;
        }
    }

    FilesHelper::write($hashesfile, json_encode($hashes));
    ProviderLog::end('set_theme_hashes');
}

function get_theme_hashes($current_theme_path){
    ProviderLog::start('get_theme_hashes');
    $hashesfile = $current_theme_path . '/export/hashes.json';
    $hashes = get_json_content($hashesfile);
    ProviderLog::end('get_theme_hashes');
    return $hashes;
}

function set_theme_cache($current_theme_path, $data = array()) {
    ProviderLog::start('set_theme_cache');

    $cachefile = $current_theme_path . '/export/cache.json';
    $cache = get_json_content($cachefile, true);

    if (is_array($data)) {
        foreach ($data as $control => $storage) {
            if (!is_array($storage))
                continue;

            foreach ($storage as $file => $content) {
                if ('[DELETED]' === $content) {
                    if (isset($cache[$control]) && isset($cache[$control][$file]))
                        unset($cache[$control][$file]);
                } else {
                    $cache[$control][$file] = $content;
                }
            }
        }
    }

    FilesHelper::write($cachefile, json_encode($cache));
    ProviderLog::end('set_theme_cache');
}

function get_theme_cache($current_theme_path) {
    ProviderLog::start('get_theme_cache');
    $cachefile = $current_theme_path . '/export/cache.json';
    $cache = get_json_content($cachefile);
    ProviderLog::end('get_theme_cache');
    return $cache;
}

function get_preview_changed_files($theme_dir) {
    ProviderLog::start('get_preview_changed_files');
    $path = $theme_dir . '/export/preview_changed_files.json';
    $changed_files = get_json_content($path, true);
    ProviderLog::end('get_preview_changed_files');
    return $changed_files;
}

function set_preview_changed_files($base_theme_path, $preview_theme_path, $changed_files) {
    ProviderLog::start('set_preview_changed_files');
    $changed_files_file = $base_theme_path . '/export/preview_changed_files.json';
    $_changed_files = $changed_files;
    $changed_files = array();
    foreach($_changed_files as $path) {
        $file = FilesHelper::normalize_path($path);
        if (substr($file, 0, strlen($preview_theme_path)) == $preview_theme_path)
            $changed_files[] = substr($file, strlen($preview_theme_path));
        else
            $changed_files[] = $file;
    }
    $changed_files_file_content = json_encode(array_unique($changed_files));
    FilesHelper::write($changed_files_file, $changed_files_file_content);
    ProviderLog::end('set_preview_changed_files');
}

function save_project($project_data, $theme_dir) {
    ProviderLog::start('save_project');
    $path = get_project_path($theme_dir);
    $data = array('projectData' => $project_data);
    FilesHelper::write($path, json_encode($data));
    ProviderLog::end('save_project');
}

function get_project($theme_dir) {
    ProviderLog::start('get_project');
    $path = get_project_path($theme_dir);
    $project = get_json_content($path);
    ProviderLog::end('get_project');
    return $project;
}

function get_versions() {
    return array('drupal' => VERSION);
}

function get_session_domain($themeName) {
    $prefix = get_current_url_protocol_prefix();
    $default_domain =  $prefix . 'billionthemler.com';
    $query_domain = urldecode(getValue('domain', ''));
    $domain = false;
    $domains_path = get_themler_storage_dir() . '/domains.json';
    $json = null;
    if(!file_exists($domains_path)) {
        if (empty($query_domain)) { return $default_domain; }
    } else {
        $content = file_get_contents($domains_path);
        if (false !== $content ) {
            $json = json_decode($content, true);
        }
    }
    if (!is_array($json)) {
        $json = array();
    }

    if (array_key_exists($themeName, $json)) {
        $domain = $json[$themeName];
    }
    
    if (!empty($query_domain) && $domain !== $query_domain) {
        $domain = $query_domain;
        $json[$themeName] = $domain;
        file_put_contents($domains_path, json_encode($json), LOCK_EX);
    }

    if (false !== $domain) {
        $domain = str_replace('http://', $prefix, $domain);
        return $domain;
    }

    return $default_domain;
}

function getValue($key, $default_value = false) {
    if (!isset($key) || empty($key) || !is_string($key))
        return false;
    $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

    if (is_string($ret) === true)
        $ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
    return !is_string($ret)? $ret : stripslashes($ret);
}

function is_dir_name($dir) {
    return (bool)preg_match('/^[a-zA-Z0-9_.-]*$/', $dir);
}

function check_preview($theme_name) {
    ProviderLog::start('check_preview');
    $theme_dir = get_theme_dir($theme_name);
    $preview_theme_name = $theme_name . PREVIEW_SUFFIX;
    $inner_preview_dir = $theme_dir . '/' . $preview_theme_name;
    if (file_exists($inner_preview_dir)) {
        $preview_dir = get_preview_theme_dir($theme_dir);
        if (file_exists($preview_dir))
            FilesHelper::empty_dir($preview_dir, true);
        rename($inner_preview_dir, $preview_dir);
    }
    ProviderLog::end('check_preview');
}

function get_themler_storage_dir() {
    $base_upload_dir = get_files_dir();
    $dir = FilesHelper::normalize_path($base_upload_dir . '/themler');
    if (!is_dir($dir)) {
        if (!mkdir($dir, 0777, true))
            die('Failed to create storage directory ' . $dir);
    }
    return $dir;
}

function get_current_url_protocol_prefix() {
    if (using_secure_mode())
        return 'https://';
    return 'http://';
}

function using_secure_mode() {
    if (isset($_SERVER['HTTPS']))
        return in_array(m_strtolower($_SERVER['HTTPS']), array(1, 'on'));
    // $_SERVER['SSL'] exists only in some specific configuration
    if (isset($_SERVER['SSL']))
        return in_array(m_strtolower($_SERVER['SSL']), array(1, 'on'));
    // $_SERVER['REDIRECT_HTTPS'] exists only in some specific configuration
    if (isset($_SERVER['REDIRECT_HTTPS']))
        return in_array(m_strtolower($_SERVER['REDIRECT_HTTPS']), array(1, 'on'));
    if (isset($_SERVER['HTTP_SSL']))
        return in_array(m_strtolower($_SERVER['HTTP_SSL']), array(1, 'on'));
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']))
        return m_strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https';

    return false;
}

function m_strtolower($str) {
    if (is_array($str))
        return false;
    if (function_exists('mb_strtolower'))
        return mb_strtolower($str, 'utf-8');
    return strtolower($str);
}

function fatal_error_shutdown_handler() {
    $last_error = error_get_last();
    if ($last_error['type'] === E_ERROR) {
        // fatal error
        error_handler(E_ERROR, 'Fatal error: ' . $last_error['message'], $last_error['file'], $last_error['line'], array());
        exit();
    }
}

function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }
    ob_start();
    switch ($errno) {
        case E_USER_ERROR:
            ob_start();
            echo "USER ERROR: $errstr\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")\n";
            echo "Aborting...\n";
            break;
        case E_USER_WARNING:
            echo "USER WARNING: $errstr<br />\n";
            break;
        case E_USER_NOTICE:
            echo "USER NOTICE: $errstr<br />\n";
            break;
        default:
            $errorType = friendlyErrorType($errno);
            echo ("" !== $errorType ? "$errorType: " : "Unknown error type: ") . "$errstr $errfile $errline\n";
            break;
    }
    $error = ob_get_clean();

    $bt = debug_backtrace();
    $formatter = new LogFormatter();
    $callstack = '';
    foreach($bt as $key => $caller) {
        if (0 === $key) continue;
        $callstack .= "   -> ";
        if (isset($caller['class']))
            $callstack .= $caller['class'] . '::';
        $callstack .= $caller['function'] . '(' . $formatter->args($caller['args']) . ')';
        $callstack .= "\n";
    }
    $os = 'OS: ' . php_uname() . "\n";
    $error = "\n\n  " . $os . "\n" . $error . "\n" . print_r($errcontext, true) . "  Callstack: \n" . $callstack . "\n\n";
    header("HTTP/1.1 400 Request failed");
    exit($error);

	/* Don't execute PHP internal error handler */
    return true;
}

function friendlyErrorType($type) {
    switch($type)
    {
        case E_ERROR: // 1 //
            return 'E_ERROR';
        case E_WARNING: // 2 //
            return 'E_WARNING';
        case E_PARSE: // 4 //
            return 'E_PARSE';
        case E_NOTICE: // 8 //
            return 'E_NOTICE';
        case E_CORE_ERROR: // 16 //
            return 'E_CORE_ERROR';
        case E_CORE_WARNING: // 32 //
            return 'E_CORE_WARNING';
        case E_CORE_ERROR: // 64 //
            return 'E_COMPILE_ERROR';
        case E_CORE_WARNING: // 128 //
            return 'E_COMPILE_WARNING';
        case E_USER_ERROR: // 256 //
            return 'E_USER_ERROR';
        case E_USER_WARNING: // 512 //
            return 'E_USER_WARNING';
        case E_USER_NOTICE: // 1024 //
            return 'E_USER_NOTICE';
        case E_STRICT: // 2048 //
            return 'E_STRICT';
        case E_RECOVERABLE_ERROR: // 4096 //
            return 'E_RECOVERABLE_ERROR';
        case E_DEPRECATED: // 8192 //
            return 'E_DEPRECATED';
        case E_USER_DEPRECATED: // 16384 //
            return 'E_USER_DEPRECATED';
    }
    return "";
}