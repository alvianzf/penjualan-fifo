<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Production extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'items_model']);
    }

    public function index_get()
    {
        $response = [];
        $items = $this->items_model->get_all();
        foreach($items as $item) {
            $item->tanggal = Date('m/d/Y', $item->created_at);
            
            $response = [
                'success'   => true,
                'result'    => $item,
                'error'     => null
            ];
        }
        
        return $this->response($response, 200);
    }

    public function insert_post()
    {
        $kode_produksi = $this->post('kode_produksi');
        $tipe_barang = $this->post('tipe_barang');
        $jumlah      = $this->post('jumlah');
        $satuan      = $this->post('satuan');
        $harga       = $this->post('harga');
        $time        = strtotime($this->post('tanggal'));

        $items = [
            'kode_produksi' => $kode_produksi,
            'tipe_barang'   =>  $tipe_barang,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'harga'         => $harga,
            'created_at'    => $time
        ];
        
        $code = 200;
        if($this->items_model->insert($items))
        {
            $response = [
                'success'   => true,
                'result'    => $items,
                'error'     => null
            ];
            $code =200;
        } else 
        {
            $response = [
                'success'   => false,
                'result'    => null,
                'error'     => 'Failed to insert data'
            ];
            $code = 500;
        }
        return $this->response($response, $code);
    }

    public function edit_post($id)
    {
        $kode_produksi = $this->post('kode_produksi');
        $tipe_barang = $this->post('tipe_barang');
        $jumlah      = $this->post('jumlah');
        $satuan      = $this->post('satuan');
        $harga       = $this->post('harga');
        $time        = strtotime($this->post('tanggal'));

        $items = [
            'kode_produksi' => $kode_produksi,
            'tipe_barang'   =>  $tipe_barang,
            'jumlah'        => $jumlah,
            'satuan'        => $satuan,
            'harga'         => $harga,
            'created_at'    => $time
        ];
        
        $code = 200;
        if($this->items_model->update($id, $items))
        {
            $response = [
                'success'   => true,
                'result'    => $items,
                'error'     => null
            ];
            $code =200;
        } else 
        {
            $response = [
                'success'   => false,
                'result'    => null,
                'error'     => 'Failed to update data'
            ];
            $code = 500;
        }
        return $this->response($response, $code);
    }

    public function delete_get($id)
    {
        if ($this->items_model->delete($id)) {
            return $this->response(true, 200);
        } else{
            return $this->response(false, 500);
        }
    }
}