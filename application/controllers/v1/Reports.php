<?php defined('BASEPATH') OR exit ('No direct script!');

require_once APPPATH. '/libraries/REST_Controller.php';

class Reports extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'payment_model', 'buyer_model', 'transactions_model']);

    }

    public function bulan_get($bulan)
    {
        $start = strtotime('2019/'.$bulan.'01');
        $end   = strtotime('2019'.$bulan.'31');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);
        $dt                 = DateTime::createFromFormat('!m', $bulan);
        
        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
            // check($v);
        }
        // exit;

        if($data)
            return $this->response(api_success($data), 200);

        return $this->response(api_error($data), 500);

    }
}