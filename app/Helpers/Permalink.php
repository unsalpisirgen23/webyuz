<?php

namespace App\Helpers;

class Permalink
{

    public static function get($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'U', 'İ', 'I', 'Ö', 'O', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'u', 'i', 'i', 'o', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }

}



