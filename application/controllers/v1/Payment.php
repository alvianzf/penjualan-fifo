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
        $nominal= $this->post('nominal');
        $qty    = $this->post('qty');
        $ket    = $this->post('keterangan');
        $sisa   = $this->transactions_model->get($id)->nominal;

        if ($ket == 'cicilan') {
            $sisa = @$this->payment_model->order_by('id', 'desc')->limit(1)->get_by('transaction_id', $id) ? $this->payment_model->order_by('id', 'desc')->limit(1)->get_by('transaction_id', $id) : $sisa;
        }
        $sisa = $sisa - $nominal;

        $data = [
            'transaction_id'    => $id,
            'tanggal'           => time(),
            'qty'               => $qty,
            'nominal'           => $nominal,
            'keterangan'        => $ket,
            'sisa'              => $sisa,
            'created_at'        => time()
        ];

        if ($sisa == 0) {
            $this->transactions_model->update($id, ['selesai' => 1]);
        }


        if ($this->payment_model->insert($data))
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);

    }

}