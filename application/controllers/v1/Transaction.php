<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Transaction extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'items_model']);

    }

    public function index_get()
    {
        
    }

    public function information_get($query)
    {
        $sum = 0;
        if ($list = $this->items_model->get_many_by('tipe_barang', $query)) {

            foreach ($list as $i => $v) {
                $sum = $sum + $v->jumlah;
            }
    
            $data = [
                'harga' => $list[0]->harga,
                'stok'  => $sum,
                'satuan'=> $list[0]->satuan
            ];
                
                return $this->response(['success' => true, 'query' => $query, 'result' => $data, 'status' => 200], 200);
        }

        return $this->response(['success' =>  false, 'query' => $query, 'result' => [], 'status' => 500], 500);

    }

}