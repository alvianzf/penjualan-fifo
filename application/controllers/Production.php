<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Production
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
  }

  public function index()
  {
    // 
  }

  public function new_production ()
  {
    // 
  }

}


/* End of file Production.php */
/* Location: ./application/controllers/Production.php */