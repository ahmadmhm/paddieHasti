<?php

use Hekmatinasser\Verta\Verta;

if (!function_exists('getImageSrc')) {
    function getImageSrc($image = '', $template = 'original')
    {
        if ($image) {
            return route('imagecache', ['template' => $template, 'filename' => $image]);
        }
        return null;
    }
}

if (!function_exists('getjalaliDate')) {
    function getjalaliDate($date)
    {
        $v = new Verta($date);
        return $v->formatJalaliDate();
    }
}