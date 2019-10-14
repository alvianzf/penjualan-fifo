<?php defined('BASEPATH') OR exit ('ok');

if (!function_exists('check')) {
    function check($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('assets_url')) {
    function assets_url($string = null)
    {
        return base_url() . 'assets/' . $string;
    }
}

if (!function_exists('api')) {
    function api($string = null)
    {
        return base_url() . 'v1/' . $string;
    }
}
