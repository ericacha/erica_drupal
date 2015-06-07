<?php

class Chunk {

    public $UPLOAD_PATH;

    private $_lastChunk = null;
    private $_chunkFolder = '';
    private $_lockFile = '';
    private $_isLast = false;

    public function __construct() {
        $this->UPLOAD_PATH = get_files_dir() . '/chunks/';
        $this->_chunkFolder = $this->UPLOAD_PATH . 'default';
    }

    public function save($info) {
        $validationResult = $this->validate($info);
        if ('' !== $validationResult)
            trigger_error($validationResult, E_USER_ERROR);

        $this->_lastChunk = $info;
        $this->_chunkFolder = $this->UPLOAD_PATH . $info['id'];
        $this->_lockFile = $this->_chunkFolder . '/lock';

        if (!is_dir($this->_chunkFolder)) {
            @mkdir($this->_chunkFolder, 0777, true);
        }

        $f = fopen($this->_lockFile, 'c');

        if (flock($f, LOCK_EX)) {
            $chunks = array_diff(scandir($this->_chunkFolder), array('.', '..', 'lock'));

            if ((int) $this->_lastChunk['total'] === count($chunks) + 1) {
                $this->_isLast = true;
            }

            if (!empty($this->_lastChunk['blob'])) {
                if (empty($_FILES['content']['tmp_name'])) {
                    return false;
                }
                move_uploaded_file(
                    $_FILES['content']['tmp_name'],
                    $this->_chunkFolder . '/' . (int) $info['current']
                );
            } else {
                file_put_contents($this->_chunkFolder . '/' . (int) $info['current'], $info['content']);
            }
            flock($f, LOCK_UN);
            return true;
        } else {
            exit("Couldn\'t lock the file");
        }
    }

    public function last() {
        return $this->_isLast;
    }

    public function complete() {
        $content = '';
        for ($i = 1, $count = (int) $this->_lastChunk['total']; $i <= $count; $i++) {
            if (!file_exists($this->_chunkFolder . "/$i")) {
                $this->clear_chunk_directory();
                exit('Missing chunk #' . $i . ' : ' . implode(' / ', scandir($this->_chunkFolder)));
            }
            $data = file_get_contents($this->_chunkFolder . "/$i");

            if (!empty($this->_lastChunk['encode'])) {
                $data = base64_decode($data);
            }
            $content .= $data;
        }
        $this->clear_chunk_directory();
        return empty($this->_lastChunk['encode']) ? $content : rawurldecode($content);
    }

    private function validate($info) {
        $errors = array();
        if (is_null($info))
            $errors[] = sprintf('Invalid info, json_last_error=%s', json_last_error());
        if (!isset($info['id']) || !$info['id'])
            $errors[] = 'Invalid id';
        if (!isset($info['total']) || (int) $info['total'] < 1)
            $errors[] = 'Invalid chunks total';
        if (!isset($info['current']) || (int) $info['current'] < 1)
            $errors[] = 'Invalid current chunk number';
        if (empty($_FILES['content']) && empty($info['content']))
            $errors[] = 'Invalid chunk content';
        if (count($errors) < 1)
            return '';
        else {
            $message = 'Drupal: ' . implode(', ', $errors);
            error_log($message);
            error_log('Chunk info: ' . print_r($info, true));
            return $message;
        }
    }

    public function clear_chunk_directory() {
        $dir = $this->UPLOAD_PATH;
        if (is_dir($dir)) {
            $it = new RecursiveDirectoryIterator($dir);
            $files = new RecursiveIteratorIterator($it,
                RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->getFilename() === '.' || $file->getFilename() === '..') {
                    continue;
                }
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
        }
    }
}