<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_data_model extends MY_Model {

  // ------------------------------------------------------------------------
  protected $_table= "user_details";
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

  }
}