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

        $this->load->model(['stock_model', 'transactions_model']);
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

    }

    public function pembeli ($nama = null)
    {

    }

    public function tahunan ($tahun = null)
    {
        $tahun = @$tahun ? $tahun : date('Y');
    }

}