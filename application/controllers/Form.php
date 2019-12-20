<?php defined('BASEPATH') OR exit('No direct script access allowed!');

class Form extends MY_Controller
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
        $this->load->model(['']);
    }

    public function index()
    {
        
    }
}