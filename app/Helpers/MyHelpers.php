<?php

if (! function_exists('pair_odd')) {
    function pair_odd($integer)
    {
        //
    }
}

if (! function_exists('percentage')) {
    function percentage($double)
    {
        return ($double*100)/5;
    }
}

if (! function_exists('randomHex')) {
    function randomHex()
    {
        $chars = 'ABCDEF0123456789';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $color;
    }
}