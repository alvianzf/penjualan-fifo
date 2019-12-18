<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Payment_model extends MY_Model
{
    protected $_table = 'payment';
    public function __construct()
    {
        parent::__construct();
    }
}