<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Settings extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['buyer_model', 'item_type_model']);
    }

    public function production_get()
    {
        $data = $this->item_type_model->get_all();

        if ($data) {
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }

    public function production_insert_post ()
    {
        $tipe_barang = $this->post('tipe_barang');
        $harga_barang = $this->post('harga_barang');

        $data = [
            'tipe_barang'   => $tipe_barang,
            'harga_barang'  => $harga_barang,
            'created_at'    => time()
        ];

        if ($this->item_type_model->insert($data)) {
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }

    public function production_delete_get($id)
    {
        $data = $this->item_type_model->delete($id);

        if ($data) {
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }

}