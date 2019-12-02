<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'user_data_model']);

    }

    public function index_get()
    {
        $data = $this->user_model->with('user_data')->get_all();

        return $data ? $this->response(api_success($data), 200) : $this->response(api_error(), 500);
    }

    public function single_get($id)
    {
        $data = $this->user_model->with('user_data')->get($id);

        return $data ? $this->response(api_success($data), 200) : $this->response(api_error(), 500);
    }

    public function register_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');
        $name     = $this->post('name');
        $role     = $this->post('role');
        $position = $this->post('position');
        $contact  = $this->post('contact_number');

        if ($this->user_model->insert([
            'username'  => $username,
            'password'  => hash('sha1', $password),
            'role'      => $role,
            'created_at'=> time()
        ])) {
            $data = ['user_id' => $this->db->insert_id(), 'name' => $name, 'contact_number' => $contact, 'position' => $position,  'created_at' => time()];
            if ($this->user_data_model->insert($data)) {
                return $this->response(api_success($data), 200);
            }

            return $this->reponse(api_error(), 500);
        }

        return $this->response(api_error(), 500);
    }

    public function edit_post($id)
    {
        $username = $this->post('username');
        $password = $this->post('password');
        $name     = $this->post('name');
        $role     = $this->post('role');
        $position = $this->post('position');
        $contact  = $this->post('contact_number');

        if ($this->user_model->update($id, [
            'username'  => $username,
            'password'  => hash('sha1', $password),
            'role'      => $role,
            'created_at'=> time()
        ])) {
            $data = ['name' => $name, 'contact_number' => $contact, 'position' => $position,  'created_at' => time()];
            if ($this->user_data_model->update($id, $data)) {
                return $this->response(api_success($data), 200);
            }

            return $this->reponse(api_error(), 500);
        }

        return $this->response(api_error(), 500);        
    }

    public function delete_get($id)
    {
        $result = $this->user_model->get($id)->username;
        if ($this->user_data_model->with('user_data')->delete($id)) {
            return $this->response(api_success($result), 200);
        }
        return $this->response(api_error(), 500);
    }
}