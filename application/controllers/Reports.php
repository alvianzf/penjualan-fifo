<?php defined('BASEPATH') OR exit ('No direct access allowed!');

class Reports extends MY_Controller
{
    protected $asides = [
      'header'  => 'asides/header',
      'footer'  => 'asides/footer',
      'logout'  => 'asides/logout',
      'sidebar'  => 'asides/sidebar',
      'topbar'  => 'asides/topbar',
      'sticky_footer'  => 'asides/sticky_footer'
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

        // $data = $this->
    }

    public function pembeli ($nama = null)
    {

    }

    public function tahunan ($tahun = null)
    {
        $tahun = @$tahun ? $tahun : date('Y');
    }

}