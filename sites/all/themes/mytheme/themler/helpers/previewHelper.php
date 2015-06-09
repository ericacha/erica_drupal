<?php

class PreviewHelper
{
    private $_themeDir;
    private $_data = array();
    private $_data_id_string;

    public function __construct($themeDir)
    {
        $this->_data_id_string = 'data-con' . 'trol-id'; // HARD FIX. this string must not replaced by regexp in this file!!!
        $this->_themeDir = $themeDir;
        $dataAttributesDiffFile = $this->_themeDir . '/export/data_attributes_diff.json';
        $dataAttributesDiffContent = file_exists($dataAttributesDiffFile) ? file_get_contents($dataAttributesDiffFile) : "{}";
        $this->_data = json_decode($dataAttributesDiffContent, true);
    }

    public function removeDataId($path)
    {
        $content = file_get_contents($path);

        if (trim($content)) {
            $diff = array();
            $lines = preg_split('/(\R)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);

            for ($i = 0; $i < count($lines); $i++) {
                if (!strlen(trim($lines[$i])) || strpos($lines[$i], $this->_data_id_string) === false) continue;

                $ids = array();
                while ($data = $this->_splitByFirstDataId($lines[$i])) {
                    $ids[] = $data['id'];
                    $lines[$i] = $data['str'];
                }

                if (count($ids)) {
                    $diff[] = array(
                        'str' => $lines[$i],
                        'ids' => $ids
                    );
                }
            }

            $content = implode($lines);

            $this->_data[$this->_getKey($path)] = $diff;
        }

        return $content;
    }

    public function restoreDataId($path)
    {
        $content = file_get_contents($path);
        $key = $this->_getKey($path);
        if (trim($content) && array_key_exists($key, $this->_data)) {
            $diff = $this->_data[$key];
            $lines = preg_split('/(\R)/', $content, -1, PREG_SPLIT_DELIM_CAPTURE);

            for ($i = 0; $i < count($lines); $i ++) {
                $line = $lines[$i];
                $lineLength = strlen(trim($line));
                if ($lineLength === 0) continue;

                foreach ($diff as $key => $d) {
                    //if (($lev = levenshtein(substr($line, 0, 255), substr($d['str'], 0, 255))) / $lineLength > .2) continue;
                    if (strcmp($line, $d['str']) !== 0) continue;

                    foreach (array_reverse($d['ids']) as $dataId) {
                        if (!array_key_exists('type', $dataId)) continue;
                        if ($dataId['type'] === 'attr') {
                            $line = substr_replace($line, sprintf($this->_data_id_string . '="%d"', $dataId['id']), $dataId['offset'], 0);
                        } else if ($dataId['type'] === 'class') {
                            $line = substr_replace($line, sprintf($this->_data_id_string . '-%d', $dataId['id']), $dataId['offset'], 0);
                        }
                    }

                    array_splice($diff, $key, 1);

                    break;
                }

                $lines[$i] = $line;
            }

            $content = implode($lines);
        }

        return $content;
    }

    public function removeKey($path)
    {
        if (($key = $this->_getKey($path)) && array_key_exists($key, $this->_data)) {
            unset($this->_data[$key]);
        }
    }

    public function save()
    {
        file_put_contents($this->_themeDir . '/export/data_attributes_diff.json', json_encode($this->_data));
    }

    private function _getKey($path)
    {
        $file = FilesHelper::normalize_path($path);
        if (substr($file, 0, strlen($this->_themeDir . '_preview')) == $this->_themeDir . '_preview') {
            $file = substr($file, strlen($this->_themeDir . '_preview'));
        }
        if (substr($file, 0, strlen($this->_themeDir)) == $this->_themeDir) {
            $file = substr($file, strlen($this->_themeDir));
        }
        return $file;
    }

    /**
     * Splits content by first dataId inclusion
     * @param string $content Input content
     *
     * @return array|bool split data or false
     */
    private function _splitByFirstDataId($content)
    {
        $result = false;
        $chunks = preg_split(
            '/(' . $this->_data_id_string . ')(=["\'](\d+)["\']|-(\d+))/i',
            $content,
            2,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_OFFSET_CAPTURE
        );
        if (count($chunks) === 5) {
            $result = array(
                'id' => array(
                    'offset' => $chunks[1][1],
                    'id' => $chunks[3][0],
                    'type' => 'attr'
                ),
                'str' => $chunks[0][0] . $chunks[4][0]
            );
        } else if (count($chunks) === 6) {
            $result = array(
                'id' => array(
                    'offset' => $chunks[1][1],
                    'id' => $chunks[4][0],
                    'type' => 'class'
                ),
                'str' => $chunks[0][0] . $chunks[5][0]
            );
        }
        return $result;
    }
}