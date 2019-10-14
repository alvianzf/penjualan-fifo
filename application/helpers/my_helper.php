<?php defined('BASEPATH') OR exit ('ok');

if (!function_exists('verbose')) {
    function verbose($data)
    {
        echo '<pre>' . print_r($data) . '</pre>';
    }
}

if (!function_exists('assets_url')) {
    function assets_url($string = null)
    {
        return base_url() . 'assets/' . $string;
    }
}
