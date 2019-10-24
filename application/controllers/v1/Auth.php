<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index_get()
    {
    }

    public function login_post()
    {
        $user = $this->post('username');
        $pass = $this->post('password');

        if ($this->user_model->login(['username' => $user, 'password' => $pass])) {
            return $this->response(true, 200);
        } else {
            return $this->response(false, 401);
        }
    }

    public function logout_get()
    {
        unset($this->session->userdata['is_logged_in']);

        return $this->response(true, 200);
    }
}