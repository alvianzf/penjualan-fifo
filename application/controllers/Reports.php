<?php defined('BASEPATH') OR exit ('No direct access allowed!');

class Reports extends MY_Controller
{
    protected $asides = [
      'header'  => 'asides/header',
      'footer'  => 'asides/footer',
    ];

    public function __construct()
    {
        parent::__construct();
        if (!@$this->session->userdata['is_logged_in']) {
        redirect('/', 'refresh');
        }

        $this->load->model(['stock_model', 'payment_model', 'items_model', 'stock_model']);
    }

    public function index()
    {

    }

    public function bulanan ($bulan = null)
    {
        $bulan = @$bulan ? $bulan : date ('m');

        $this->data['bulan'] = $bulan;
        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $this->data['bulan_lap'] = $dt->format('F');


        $start = strtotime('2019/'.$bulan.'01');
        $end   = strtotime('2019/'.$bulan.'31');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $this->data['result'] = $data;

    }

    public function tahunan ($bulan = null)
    {
        $bulan = @$bulan ? $bulan : date ('Y');

        $this->data['bulan'] = $bulan;
        $dt                  = DateTime::createFromFormat('!Y', $bulan);
        $this->data['bulan_lap'] = $dt->format('F');


        $start = strtotime($bulan.'/01/01');
        $end   = strtotime($bulan.'/12/31');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $this->data['result'] = $data;
    }

    public function print_bulan ($bulan)
    {
        $dt = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap = $dt->format('F');

        $start = strtotime($bulan.'/01/2019');
        $end   = strtotime($bulan.'/31/2019');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = date('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/print_bulan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function print_tahun ($bulan)
    {
        $dt = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap = $dt->format('F');

        $start = strtotime('01/01/'.$bulan);
        $end   = strtotime('12/31/'.$bulan);

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = date('Y');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/tahunan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }


    public function produksi_bulanan ($bulan = null)
    {
        $dt = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap = $dt->format('F');

        $this->data['bulan'] = $bulan;
        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $this->data['bulan_lap'] = $dt->format('F');


        $start = strtotime($bulan.'/01/2019');
        $end   = strtotime($bulan.'/31/2019');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $this->data['result'] = $data;

    }

    public function produksi_tahunan ($bulan = null)
    {
        $bulan = @$bulan ? $bulan : date ('Y');

        $this->data['bulan'] = $bulan;
        $this->data['bulan_lap'] = $tahun;


        $start = strtotime('01/01/' . $bulan);
        $end   = strtotime('12/31/' . $bulan);

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $this->data['result'] = $data;
    }

    public function print_produksi_bulan ($bulan)
    {
        $bulan = @$bulan ? $bulan : date ('m');

        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap           = $dt->format('F');

        $start = strtotime($bulan.'/01/2019');
        $end   = strtotime($bulan.'/31/2019');

        $data = $this->items_model->get_many_by(['created_at BETWEEN ' . $start . ' AND ' . $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan        = $dt->format('F');
            $data[$i]->created_at   = date('d/m/Y', $v->created_at);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/produksi_bulanan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output('Produksi_bulan-' . $bulan_lap, 'D'); // opens in browser
        // $mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function print_produksi_tahun ($bulan)
    {

        $dt = DateTime::createFromFormat('!Y', $bulan);
        $bulan_lap = $bulan;

        $start = strtotime('01/01/'.$bulan);
        $end   = strtotime('12/31/'.$bulan);

        $data = $this->items_model->get_many_by(['created_at >' => $start, 'created_at <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = date('Y');
            $data[$i]->created_at = date('d/m/Y', $v->created_at);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/produksi_tahunan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function print_persediaan_bulan ($bulan)
    {

        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap           = $dt->format('F');

        $start = strtotime($bulan.'/01/2019');
        $end   = strtotime($bulan.'/31/2019');

        $data = $this->stock_model->get_many_by(['created_at >' => $start, 'created_at <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan        = $dt->format('F');
            $data[$i]->created_at   = date('d/m/Y', $v->created_at);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/pembelian_bulanan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function print_persediaan_tahun ($bulan)
    {
        $dt                  = DateTime::createFromFormat('!Y', $bulan);
        $bulan_lap           = $bulan;

        $start = strtotime('01/01/' . $bulan);
        $end   = strtotime('12/31/' . $bulan);

        $data = $this->stock_model->get_many_by(['created_at >' => $start, 'created_at <' => $end]);

        foreach ($data as $i => $v) {
            $data[$i]->bulan    = date('Y');
            $data[$i]->created_at = date('d/m/Y', $v->created_at);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/pembelian_tahunan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function neraca_bulanan ($bulan) 
    {
        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap           = $dt->format('F');

        $start = strtotime($bulan.'/01/2019');
        $end   = strtotime($bulan.'/31/2019');

        $data_beli = $this->stock_model->get_many_by(['created_at >' => $start, 'created_at <' => $end]);
        $data_bayar= $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data_beli as $i => $v) {
            $data_beli[$i]->bulan    = date('Y');
            $data_beli[$i]->created_at = date('d/m/Y', $v->created_at);
        }

        foreach ($data_bayar as $i => $v) {
            $data_bayar[$i]->bulan   = date('F');
            $data_bayar[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $data = ['beli' => $data_beli, 'bayar' => $data_bayar];

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/neraca_bulanan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        // $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }

    public function neraca_tahun ($tahun) 
    {
        $dt                  = DateTime::createFromFormat('!Y', $tahun);
        $bulan_lap           = $bulan;

        $start = strtotime('01/01/' . $tahun);
        $end   = strtotime('12/31/' . $tahun);

        $data_beli = $this->stock_model->get_many_by(['created_at >' => $start, 'created_at <' => $end]);
        $data_bayar= $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);

        foreach ($data_beli as $i => $v) {
            $data_beli[$i]->bulan    = date('Y');
            $data_beli[$i]->created_at = date('d/m/Y', $v->created_at);
        }

        foreach ($data_bayar as $i => $v) {
            $data_bayar[$i]->bulan    = date('F');
            $data_bayar[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $data = ['beli' => $data_beli, 'bayar' => $data_bayar];

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/neraca_tahun', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }
}
