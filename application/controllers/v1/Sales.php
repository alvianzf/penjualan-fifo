<?php defined('BASEPATH') OR exit('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Sales extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'buyer_model', 'items_model', 'transactions_model', 'payment_model']);
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
        $keterangan =   $this->post('keterangan');
        $tanggal    =   time();
        $qty        =   $this->post('jumlah');
        $nominal    =   $this->post('nominal');
        $created_at =   time();

        $data = [
            'buyer_id'      =>  $buyer_id,
            'tanggal'       =>  $tanggal,
            'qty'           =>  $qty,
            'nominal'       =>  $nominal,
            'keterangan'    =>  $keterangan,
            'created_at'    =>  $created_at
        ];


        // Pengurangan FIFO
        $penjualan = $this->items_model->get_many_by('tipe_barang', $keterangan);

        $jum = $qty;
        foreach ($penjualan as $i => $v) {

            if ($jum > 0) {
                if ($v->jumlah > $jum) {
                    $sisa = $v->jumlah - $jum;
                    $jum = 0;
                } else {
                    $jum = $jum - $v->jumlah;
                    $sisa = 0;
                }
    
                $updated = [
                    'jumlah'        =>  $sisa,
                    'created_at'    => time()
                ];
    
                $this->items_model->update($v->id, $updated);
            }
        }

        if ($this->transactions_model->insert($data)) {

            $transaction_id = $this->db->insert_id();

            if (!$this->payment_model->get_many_by('transaction_id', $transaction_id)) {
                $payment = [
                    'transaction_id'    =>  $transaction_id,
                    'tanggal'           =>  time(),
                    'qty'               =>  $qty,
                    'nominal'           =>  0,
                    'sisa'              =>  $nominal,
                    'keterangan'        =>  '-',
                    'created_at'        => time()
                ];

                $this->payment_model->insert($payment);
            }
            return $this->response(api_success($data), 200);
        }

        return $this->reponse(api_error($data), 500);
    }

    public function single_transaction_get($id) {
        $data = $this->transactions_model->get($id);

        if ($data)
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);
    }
}