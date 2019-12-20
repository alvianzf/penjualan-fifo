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

        $this->load->model(['stock_model', 'payment_model']);
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
        $end   = strtotime('2019'.$bulan.'31');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);
        
        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $this->data['result'] = $data;

    }

    public function pembeli ($nama = null)
    {

    }

    public function tahunan ($tahun = null)
    {
        $tahun = @$tahun ? $tahun : date('Y');
    }

    public function print_bulan ($bulan)
    {

        $bulan = @$bulan ? $bulan : date ('m');

        $dt                  = DateTime::createFromFormat('!m', $bulan);
        $bulan_lap           = $dt->format('F');

        $start = strtotime('2019/'.$bulan.'01');
        $end   = strtotime('2019'.$bulan.'31');

        $data = $this->payment_model->get_many_by(['tanggal >' => $start, 'tanggal <' => $end]);
        
        foreach ($data as $i => $v) {
            $data[$i]->bulan    = $dt->format('F');
            $data[$i]->tanggal = date('d/m/Y', $v->tanggal);
        }

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('reports/bulanan', ['bulan_lap' => $bulan_lap, 'result' => $data],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    }
}