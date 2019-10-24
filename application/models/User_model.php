<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class User_Model extends MY_Model
{
    protected $_table = 'users';
    protected $has_many = [
        'user_data' => [
            'primary_key' => 'user_id',
            'model'       => 'user_data_model'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_data_model');
    }

    public function login($args)
    {
        $data = $this->user_model->with('user_data')->get_by('username', $args['username']);
        if ($data) {
            $pass = hash('sha1', $args['password']);
            $db_pass = $data->password;
        
            if ($pass == $db_pass) {
                $this->session->userdata['is_logged_in'] = true;
                $this->session->userdata['user_detail'] = $data;
                $this->session->userdata['current_user'] = $data['user_data'][0];
                return true;
            } else {
                $this->session->userdata['is_logged_in'] = false;
                return false;
            }
        } else {
            return false;
        }
    }
}