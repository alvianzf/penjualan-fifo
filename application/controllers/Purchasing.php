<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing extends MY_Controller
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

    $this->load->model(['stock_model', 'transactions_model']);
  }

  public function index()
  {
    
  }

  public function new_purchasing ()
  {

  }

  public function edit_purchasing ($id = null)
  {
    $this->data['id'] = $id;
    $this->data['data'] = $this->stock_model->get($id);
  }

  public function inventaris ()
  {

  }

  public function reduction ()
  {
    
  }

}
