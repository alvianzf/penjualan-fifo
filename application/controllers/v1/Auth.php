<?php defined('BASEPATH') OR exit ('No!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_post()
    {
        $user = $this->post('user');
        $pass = $this->post('pass');

        return $this->response(['user' => $user, 'pass' => $pass], 200);
    }

    public function login_get()
    {
        return $this->response('OK', 200);
    }
}