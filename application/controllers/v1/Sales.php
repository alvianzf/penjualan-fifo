<?php defined('BASEPATH') OR exit('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Sales extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'buyer_model', 'transactions_model']);
    }

    public function list_get()
    {
        $data = $this->transactions_model->get_all();

        if($data)
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);
    }

    public function single_list_get($id)
    {
        $data = $this->transactions_model->get_many_by('buyer_id', $id);

        if ($data)
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);
    }

    public function data_post()
    {
        $buyer_id   =   $this->post('buyer_id');
        $tanggal    =   time();
        $qty        =   $this->post('jumlah');
        $nominal    =   $this->post('nominal');
        $created_at =   time();

        $data = [
            'buyer_id'      =>  $buyer_id,
            'tanggal'       =>  $tanggal,
            'qty'           =>  $qty,
            'nominal'       =>  $nominal,
            'created_at'    =>  $created_at
        ];

        if ($this->transactions_model->insert($data))
            return $this->response(api_success($data), 200);

        return $this->reponse(api_error($data), 500);
    }
}