<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check')) {
  function check($data)
  {
    // 
    echo '<pre>';
    print_r($data);
    echo '</pre>';
  }
}


if (!function_exists('api')) {
  function api($string = null)
  {
    return base_url() . 'v1/' . $string . '/';
  }
}


if (!function_exists('assets_url')) {
  function assets_url($string = null)
  {
    return base_url() . 'assets/' . $string;
  }
}


if (!function_exists('nav')) {
  function nav($nav = null, $array)
  {
    return in_array($nav, $array) ? 'active' : null;
  }


  if (!function_exists('api_success')) {
    function api_success($result) {
      return ['success' => true, 'result' => $result, 'error' => null];
    }
  }


  if (!function_exists('api_error')) {
    function api_error($result) {
      return ['success' => true, 'result' => [], 'error' => "Internal Server error!"];
    }
  }
}