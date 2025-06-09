<?php
namespace App\Methods;

class SortString
{
    public static function sort(string $string): string
    {
        $chars = mb_str_split(mb_strtolower($string));
        sort($chars);
        return implode('', $chars);
    }
}
