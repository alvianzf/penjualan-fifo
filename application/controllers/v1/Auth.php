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

    public function register_post()
    {
        $user = $this->post('username');
        $pass = $this->post('password');
        $role = $this->post('role');
        $created_at = time();

        $data = [
            'username'  => $user,
            'password'  => $pass,
            'created_at'=> $created_at
        ];

        if ($this->user_model->insert($data)) {
            return $this->response(true, 200);
        }

        return $this->response(false, 500);

    }

    public function add_employee_post($id)
    {
        $name           = $this->post('name');
        $position       = $this->post('position');
        $contact_number = $this->post('contact_number');
        $created_at     = time();

        $data = [
            'user_id'       => $id,
            'name'          => $name,
            'position'      => $position,
            'contact_number'=> $contact_number,
            'created_at'    => $created_at
        ];

        if ($this->user_data_model->insert($data)) {
            return $this->response(true, 200);
        }

        return $this->response(false, 500);
    }
}