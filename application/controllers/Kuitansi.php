<?php defined ('BASEPATH') OR exit ('NO');

class Kuitansi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('payment_model');
        // $this->load->library('mpdf')
    }

    public function kuitansi ($payment_id)
    {
        $this->view = false;

        $data = $this->payment_model->get($payment_id);

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('kuitansi/kuitansi', ['data' => $data],true);
        $mpdf->WriteHTML($html);
        $name = 'Kuitansi_' . time();
        $mpdf->Output();
        // $mpdf->Output('Kuitansi_' . time());
    }
}