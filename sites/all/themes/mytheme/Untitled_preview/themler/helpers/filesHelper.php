<?php

class FilesHelper
{
    /**
     * @param $dir
     * @param bool $deleteRootToo
     */
    public static function remove($dir, $deleteRootToo = false)
    {
        if (!is_dir($dir)) {
            @unlink($dir);
            return;
        }
        if (!$dh = @opendir($dir)) {
            return;
        }
        while (false !== ($obj = readdir($dh))) {
            if ($obj == '.' || $obj == '..') {
                continue;
            }

            if (!@unlink($dir . '/' . $obj)) {
                FilesHelper::remove($dir . '/' . $obj, true);
            }
        }

        closedir($dh);

        if ($deleteRootToo) {
            @rmdir($dir);
        }
        return;
    }
    public static function enumerate_recursive_content($path)
    {
        $files = array();
        $flags = FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS;
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, $flags));
        foreach ($iterator as $fileInfo) {
            $files[$iterator->getSubPathname()] = file_get_contents($fileInfo->getPathName());
        }
        return $files;
    }

    /**
     * @param $path
     * @param $recursive
     */
    public static function enumerate_files($path, $recursive = true) {
        $files = array();
        if (!is_dir($path)) {
            return $files;
        }

        if ($handle = opendir($path)) {
            while (($name = readdir($handle)) !== false) {
                if (preg_match('#^\.#', $name)) {
                    continue;
                }

                if (is_dir($path . "/" . $name) && $recursive) {
                    $files = array_merge($files, FilesHelper::enumerate_files($path . "/" . $name));
                } else {
                    $files[] = array('path' => $path . '/' . $name);
                }
            }
            closedir($handle);
        }

        return $files;
    }

    /**
     * @param $source
     * @param $destination
     */
    public static function copy_recursive($source, $destination, $change_file = null, $replace_data = null) {
        if(is_file($source)) {
            if($change_file || $replace_data) {
                if (!is_dir(dirname($destination))){
                    if (!mkdir(dirname($destination), 0777, true)){
                        return;
                    }
                }

                $ext = pathinfo($source, PATHINFO_EXTENSION);
                $text_file = in_array($ext, array('php', 'tpl', 'info', 'inf'));

                $content = $change_file && $text_file ? call_user_func($change_file, $source) : file_get_contents($source);
                if (isset($replace_data) && $text_file) {
                    $data = call_user_func_array($replace_data['method'], array($content, $destination, $replace_data['old_name'], $replace_data['new_name']));
                    file_put_contents($data['destination'], $data['content']);
                }
                else {
                    file_put_contents($destination, $content);
                }
            } else {
                copy($source, $destination);
            }
        } elseif(is_dir($source)) {
            if(!is_dir($destination)) {
                if(!mkdir($destination)) {
                    return;
                }
            }
            if ($dh = opendir($source)) {
                while (($file = readdir($dh)) !== false) {
                    if('.' == $file || '..' == $file) {
                        continue;
                    }
                    FilesHelper::copy_recursive($source . '/' . $file, $destination . '/' . $file, $change_file, $replace_data);
                }
                closedir($dh);
            }
        }
    }

    /**
     * @param $path
     * @param $contents
     */
    public static function write($path, $contents)
    {
        $dir = dirname($path);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        file_put_contents($path, $contents);
    }

    public static  function empty_dir($dir, $hard = false) {
        if(!is_dir($dir)) {
            return;
        }
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir,
                FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($iterator as $path) {
            if ($path->isDir()) {
                rmdir($path->__toString());
            } else {
                unlink($path->__toString());
            }
        }
        if($hard) {
            rmdir($dir);
        }
    }

    public static function empty_dir_recursive($dir, $recursive = true) {
        foreach (FilesHelper::enumerate_files($dir, $recursive) as $file)
            unlink($file['path']);
    }
    
    public static function normalize_path($path) {
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

    public static function delete_file($file) {
        // TODO: add delete_file & permissions instead of unlink
        if (is_file($file)) {
            @unlink($file);
        }
    }
    
    public static function create_temp_dir() {
        $temp = tempnam(sys_get_temp_dir(), uniqid());
        unlink($temp);
        mkdir($temp);
        return $temp . '/';
    }

    public static function replace_theme_name($content, $destination, $old_name, $new_name) {
        $dest = (strpos($destination, $old_name . INF_EXT) !== false)  // .info will be find too
                ? str_replace($old_name . INF_EXT, $new_name . INF_EXT, $destination)
                : $destination;
        $result = self::replace_content($content, $old_name, $new_name);
        return array('destination' => $dest, 'content' => $result);
    }
    
    public static function replace_content($content, $old, $new) {
        $result = (strpos($content, $old) !== false)
                ? str_replace($old, $new, $content)
                : $content;
        return $result;
    }
}