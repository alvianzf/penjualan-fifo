<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Payment extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['transactions_model', 'payment_model']);
    }