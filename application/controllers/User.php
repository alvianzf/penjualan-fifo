<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller User
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller MY
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

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

    $this->load->model([
      'user_model',
      'user_data_model',
      'items_model',
      'buyer_model',
      'transactions_model'
    ]);

  }

  public function index()
  {

  }

  public function register()
  {

  }

  public function form($id)
  {
    $this->data['form_data'] =  $this->user_model->with('user_data')->get($id);
  }

}


/* End of file User.php */
/* Location: ./application/controllers/User.php */