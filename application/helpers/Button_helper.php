<?php

if (!function_exists('button')) {

    function button($text = null)
    {
        $button = '<button>';
        $button .= $text;
        $button .= '</button>';

        return $button;
    }

    function adicionar($a, $b)
    {
        return $a + $b;
    }
}
