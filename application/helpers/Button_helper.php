<?php

if (!function_exists('button')) {

    function button($text = null, $link = null)
    {
        $button = '<button>';
        $button .= '<a href=' . $link . '>';
        $button .= $text;
        $button .= '</a>';
        $button .= '</button>';

        return $button;
    }
}
