<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends MY_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->library('migration');
  }

  public function index()
  {
    //
    if($version = $this->migration->current()) {
      $this->data['version'] = $version;
    } else {
      show_error($this->migration->error_string());
    }
  }

  public function reset()
  {
    $version = 20191010000001;

    if($this->migration->version($version)) {
      $this->data['version'] = $version;
    } else {
      show_error($this->migration->error_string());
    }
  }

}