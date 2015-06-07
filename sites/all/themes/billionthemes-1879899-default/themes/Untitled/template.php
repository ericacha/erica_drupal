<?php

Untitled_include_theme_files();

function Untitled_include_theme_files() {
    $include_files = array('/menu/menu.php', '/menu/vmenu.php', '/search/block_form.php', '/search/block_button.php', '/search/block_input.php', '/search/theme_form.php', '/search/theme_button.php', '/search/theme_input.php', '/messages/error.php', '/messages/warning.php', '/messages/status.php', '/versions/theme_version.php');
    $include_files[] = '/versions/'.Untitled_get_major_version().'.x/theme-methods.php';
    $dirname = dirname(__FILE__);
    foreach ($include_files as $file) {
        $path = $dirname . $file;
        if (file_exists($path)) {
            require_once($path);
        }
    }
}

function Untitled_get_major_version() {
    $tok = strtok(VERSION, '.');
    return (int)$tok[0];
}


function Untitled_get_language($text_type = 'short') {
    global $language;
    switch ($text_type) {
        case 'full':
            return isset($language) && isset($language->name) ? $language->name : $language;
        case 'noText':
            return '';
        case 'short':
            default:
            return isset($language) && isset($language->language) ? $language->language : $language;
    }
}

function Untitled_get_direction() {
    global $language;
    return isset($language) && isset($language->dir) ? $language->dir : 'ltr';
}

if (!function_exists('render'))	{
    function render($var) {
        return $var;
    }
}

function Untitled_render_template_from_includes($file_name, $args = array(), $folder = 'includes') {
    $filePath = Untitled_normalize_path(dirname(__FILE__) .'/'. $folder . '/' . $file_name . '.php');
    include_once($filePath);
    return call_user_func_array('Untitled_'.$file_name, $args);
}

function Untitled_render_default_content($name = 'blog', $args = array(), $folder = 'includes') {
    Untitled_autoinclude(dirname(__FILE__) .'/'. $folder, $name);
    $method_name = 'Untitled_'.$name;
    if (function_exists($method_name))
        return call_user_func_array($method_name, $args);
    die('Method ' . $method_name . ' doesn\'t exist');
}

function Untitled_autoinclude($folder, $filename){
    Untitled_normalize_path($folder);

    if (!is_dir($folder)) {
        return ;
    }

    if ($handle = opendir($folder)) {
        while (($name = readdir($handle)) !== false) {
            if (strpos($name, $filename) !== false) {
                include_once($folder . '/' . $name);
            }
        }
        closedir($handle);
    }
}

function Untitled_normalize_path($path) {
    $root = ($path[0] === '/') ? '/' : '';
    $segments = preg_split('/[\\/\\\\]/', trim($path, '/'));
    $ret = array();
    foreach ($segments as $segment) {
        if (($segment == '.') || empty($segment)) {
            continue;
        }
        if ($segment == '..') {
            array_pop($ret);
        } else {
            array_push($ret, $segment);
        }
    }
    return $root . implode('/', $ret);
}

function Untitled_generate_globals($vars, $preffix = '') {
    foreach (array_keys($vars) as $key) {
        // use prefix to not overide Drupal variables
        $GLOBALS[$preffix.$key] = & $vars[$key];
    }
}

function Untitled_add_span_to_link($link) {
    $pattern = '/(.*?<a.*?>)(.*?)(<\/a>)/si';
    return preg_replace($pattern, '$1<span>$2</span>$3', $link);
}

function Untitled_has_url_param($param) {
    return !empty($_GET[$param]);
}

if (!function_exists('theme_get_image_path')) {
    function theme_get_image_path($image) {
        global $theme;
        $path = $GLOBALS['base_url'] . '/' . path_to_theme();
        if (Untitled_has_url_param('theme') && !file_exists(dirname(__FILE__) . '/images/' . $image)) {
            $path .= '/../' . preg_replace('/(.*)(_preview$)/', '$1', $theme);
        }

        return $path . '/images/' .$image;
    }
}

function Untitled_get_style_uri($name) {
    global $theme;
    $version = Untitled_build_version_parameter();
    $path = $GLOBALS['base_url'] . '/' . path_to_theme() . '/css/';
    $is_preview = Untitled_has_url_param('theme');
    if ($is_preview && file_exists(dirname(__FILE__) . '/css/' . $name . '.preview.php'))
        return $path . 'style.preview.php?theme=' . $theme . '&' . $version;
    if (!$is_preview && file_exists(dirname(__FILE__) . '/css/' . $name . '.min.css'))
        return $path . $name . '.min.css?' . $version;
    return $path . $name . '.css?' . $version;    
}

function Untitled_render_notemplate_content($type) {
    $notemplate = '';
    switch ($type) {
        case 'page':
            ob_start();
?>
    <h3>Page Template is disabled.</h3>
    <p>The Page Template is used for <i>Basic Page</i> content type in Drupal.</p>
    <p>To turn on the Page Template, please follow these steps:</p>
    <ol>
        <li><b>Create the Page</b>: In Drupal >> Content >> click "Add Content" >> choose <b>"Basic Page"</b>.
        <p>For <b>Drupal 6</b>: Drupal Admin menu >> Create Content >> choose <b>"Page".</b></p>
            <ul>
                <li>Add Title, Body content.</li>
                <li>Save the Page.</li>
            </ul>
        </li>
        <li>Back to the <b>Themler</b> >> open <b>Templates list</b> >> click <b>"Refresh"</b> or press <b>F5</b>.</li>
    </ol>
<?php
            $notemplate = ob_get_clean();
            break;

        case 'story':
        case 'article':
             ob_start();
?>
    <h3>Post Template is disabled.</h3>
    <p>The Post Template is used for <i>Article</i> content type in Drupal.</p>

    <p>To turn on the Post Template, please follow these steps:</p>
    <ol>
        <li><b>Create an Article</b>: In Drupal >> Content >> click "Add Content" >> choose <b>"Article"</b>.
        <p>For <b>Drupal 6</b>: Drupal Admin menu >> Create Content >> choose <b>"Story".</b></p>
            <ul>
                <li>Add Title, Body content.</li>
                <li>Save the Article.</li>
            </ul>
        </li>
        <li>Back to the <b>Themler</b> >> open <b>Templates list</b> >> click <b>"Refresh"</b> or press <b>F5</b>.</li>
    </ol>
<?php
            $notemplate = ob_get_clean();
            break;
        default: // TODO: add custom templates nopage here
            break;
    }

    ob_start();
?>
<style>
    html {
        margin-top: 30px !important;
    }
    body {
        font-family: inherit;
        color:#000000;
        background-color: #FFFFFF;
    }
    .jumbotron {
        background-color: #EEEEEE;
        border-radius: 6px 6px 6px 6px;
        color: inherit;
        font-size: 16px;
        font-weight: 200;
        line-height: 27px;
        margin-bottom: 30px;
        padding: 60px;
    }
    .jumbotron li {
        line-height: 27px;
        white-space: normal;
    }
</style>
<div class="container">
    <div class="jumbotron">
        <?php print render($notemplate); ?>
    </div>
</div>
<?php 
    $content = ob_get_clean();
    return $content;
}