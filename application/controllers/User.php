<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class User extends MY_Controller
{
    
  protected $asides = [
    'header'  => 'asides/header',
    'footer'  => 'asides/footer',
    'logout'  => 'asides/logout',
    'sidebar'  => 'asides/sidebar',
    'topbar'  => 'asides/topbar',
    'sticky_footer'  => 'asides/sticky_footer'
  ];
    
  public function __construct()
  {
    parent::__construct();

    if (!@$this->session->userdata['is_logged_in']) {
      redirect('/', 'refresh');
    }

    $this->load->model(['user_model', 'user_data_model']);

  }

  public function index()
  {

  }

  public function register()
  {

  }

  public function form($id)
  {
    $this->data['data'] =  $this->user_model->with('user_data')->get($id);
  }

}