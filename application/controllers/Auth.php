<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Auth
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

class Auth extends MY_Controller
{

  protected $asides =[
    // 'header'  => 'asides/header',
    // 'footer'  => 'asides/footer',
    'sticky_footer'=> 'asides/sticky_footer'
  ];
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */