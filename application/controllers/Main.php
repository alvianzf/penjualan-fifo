<?php defined('BASEPATH') OR exit('No direct blablabla');

class Main extends MY_Controller
{
  protected $asides = [
    'header'  => 'asides/header',
    'logout'  => 'asides/logout',
    'sidebar' => 'asides/sidebar',
    'topbar'  => 'asides/topbar',
    'footer'  => 'asides/footer'
  ];
  
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    
  }
}
