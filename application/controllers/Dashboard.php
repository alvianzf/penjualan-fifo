<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Dashboard
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

class Dashboard extends MY_Controller
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
    $this->load->model([
      'user_model',
      'user_data_model'
    ]);

    if (!@$this->session->userdata['is_logged_in']) {
      redirect('/', 'refresh');
    }


  }

  public function index()
  {
  }
  
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */