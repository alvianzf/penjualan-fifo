<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class User_Model extends CI_Model
{
    protected $_table = 'users';
    // protected $has_many = [
    //     'details' => [
    //         'primary_key' => 'user_id',
    //         'model'       => 'user_details_model'
    //     ]
    // ];

    public function __construct()
    {
        parent::__construct();

        $this->load->model(['user_details_model', 'user_model']);
    }

    public function login($args)
    {
        // $data = $this->user_model->get_many_by('username', $args['username']);
        // $data = $this->user_model->get_all();
    }
}