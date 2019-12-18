<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Payment extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['transactions_model', 'payment_model']);
    }

    public function data_get($id)
    {
        $data = $this->payment_model->get_by('transaction_id', $id);

        if ($data)
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);
    }

    public function pay_post()
    {
        $id     = $this->post('transaction_id');
        $nominal= $this->post('jumlah');
        $qty    = $this->post('qty');
        $ket    = $this->post('keterangan');

        $data = [
            'transaction_id'    => $id,
            'tanggal'           => time(),
            'qty'               => $qty,
            'nominal'           => $nominal,
            'keterangan'        => $ket,
            'created_at'        => time()
        ];

        if ($this->payment_model->insert($data))
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);

    }

}