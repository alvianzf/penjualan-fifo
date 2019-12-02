<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers My_helper_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('check')) {
  /**
   * Check
   *
   * To check output to view
   *
   * @param   ...
   * @return  ...
   */
  function check($data)
  {
    // 
    echo '<pre>';
    print_r($data);
    echo '</pre>';
  }
}


if (!function_exists('api')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function api($string = null)
  {
    // 
    return base_url() . 'v1/' . $string . '/';
  }
}


if (!function_exists('assets_url')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function assets_url($string = null)
  {
    // 
    return base_url() . 'assets/' . $string;
  }
}


if (!function_exists('nav')) {
  /**
   * Test
   *
   * This test helpers
   *
   * @param   ...
   * @return  ...
   */
  function nav($nav = null, $array)
  {
    // 
    return in_array($nav, $array) ? 'active' : null;
  }


  if (!function_exists('api_success')) {
    function api_success($result) {
      return ['success' => true, 'result' => $result, 'error' => null];
    }
  }


  if (!function_exists('api_error')) {
    function api_success($result) {
      return ['success' => true, 'result' => [], 'error' => "Internal Server error!"];
    }
  }
}
// ------------------------------------------------------------------------

/* End of file My_helper_helper.php */
/* Location: ./application/helpers/My_helper_helper.php */