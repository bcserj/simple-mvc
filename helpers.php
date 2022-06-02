<?php

if (!function_exists('p')) {
    function p($obj, $d = false)
    {
        echo "<pre>";
        print_r($obj);
        echo "</pre>";

        if ($d === true)
            die();
    }
}

if (!function_exists('filetimeLink')) {
    function filetimeLink($filePathName)
    {
        $fullPath = __DIR__ . '/public/';
        $fullPath .= trim($filePathName, '/');

        $link = $filePathName . '?v=' . filemtime($fullPath);

        return $link;
    }
}
