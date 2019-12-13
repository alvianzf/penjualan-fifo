<?php defined('BASEPATH') OR exit ('No direct access allowed!');

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function bulanan ($bulan = null)
    {
        $bulan = @$bulan ? $bulan : date ('m');


    }

    public function pembeli ($nama = null)
    {

    }

    public function tahunan ($tahun = null)
    {
        $tahun = @$tahun ? $tahun : date('Y');
    }
    
}