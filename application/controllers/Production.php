<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Production extends MY_Controller
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

    $this->load->model(['items_model', 'transactions_model']);

  }

  public function index()
  {

  }

  public function new_production ()
  {

  }

  public function edit_production ($id = null)
  {
    $this->data['id'] = $id;
    $this->data['data'] = $this->items_model->get($id);
  }

  public function inventaris ()
  {

  }

}