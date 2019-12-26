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

        $tanggal = date('d M Y', $data->tanggal);
        $data->tanggal = $tanggal;


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
        $jum_awal = $sisa;

        if ($ket == 'cicilan') {
            $sisa = @$this->payment_model->order_by('id', 'desc')->limit(1)->get_by('transaction_id', $id) ? $this->payment_model->order_by('id', 'desc')->limit(1)->get_by('transaction_id', $id)->nominal : $sisa;

            $sisa = $sisa[0] == 0 ? $jum_awal : $sisa[0];
        }
        $sisa = $sisa - (int) $nominal;
        
        
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
            $data['payment_id'] = $id;
            
            return $this->response(api_success($data), 200);
        } else {
            if ($this->payment_model->insert($data)) {
                $data['payment_id'] = $this->db->insert_id();
    
                return $this->response(api_success($data), 200);
            }
        }
        
        return $this->response(api_error($data), 500);
    }

    public function check_payment_get($id) {
        if (count($this->payment_model->get_many_by('transaction_id', $id)) > 0) {
            return $this->response(api_success(true), 200);
        }

        return $this->response(api_error(), 500);

    }

}