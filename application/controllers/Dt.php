<?php defined('BASEPATH') OR exit('NO');

class Dt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('datatables');
    }

    public function item()
    {
        $this->datatables->select('id, kode_produksi, tipe_barang, jumlah, satuan, harga, created_at')->from('production')
                        ->add_column('tanggal', '$1', 'human_time(created_at)');

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
        
    }

    public function purchase()
    {
        $this->datatables->select('id, kode_barang, tipe_barang, nama_barang, jumlah, satuan, harga, created_at')->from('purchasing')
                        ->add_column('tanggal', '$1', 'human_time(created_at)');

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
        
    }
}