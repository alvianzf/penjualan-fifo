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

    public function user()
    {
        $this->datatables->select('A.id, A.username, A.role, B.name, B.position, B.contact_number, A.created_at,')
                            ->from('users A')
                            ->join('user_details B', 'B.user_id = A.id')
                            ->edit_column('created_at', '$1', 'human_time(created_at)');

        $this->output->set_content_type('application/json')
                            ->set_status_header(200)
                            ->set_output($this->datatables->generate('json', 'UTF-8', true));

    }

    public function tipe_barang()
    {
        $this->datatables->select('id, tipe_barang, harga_barang')->from('item_type');

        $this->output->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

    public function transactions()
    {
        $this->datatables->select('A.id, B.nama, tanggal, qty, A.nominal, keterangan, A.created_at')
                ->from('transactions A')
                ->where('selesai', 0)
                ->join('buyer B', 'A.buyer_id = B.id')
                ->edit_column('tanggal', '$1', 'human_time(tanggal)')
                ->edit_column('created_at', '$1', 'human_time(created_at)');

        $this->output->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

    public function receipts()
    {
        $this->datatables->select('A.tanggal, A.created_at, A.sisa, A.nominal, B.nominal total_bayar, B.keterangan, C.nama')
                ->from('transactions B')
                // ->where('selesai', 0)
                ->join('buyer C', 'B.buyer_id = C.id')
                ->join('payment A', 'A.transaction_id = B.id')
                ->edit_column('tanggal', '$1', 'human_time(tanggal)')
                ->edit_column('created_at', '$1', 'human_time(created_at)');

        $this->output->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }



    public function receipts_all()
    {
        $this->datatables->select('A.tanggal, A.created_at, A.sisa, A.nominal, B.nominal total_bayar, B.keterangan, C.nama')
                ->from('transactions B')
                ->join('buyer C', 'B.buyer_id = C.id')
                ->join('payment A', 'A.transaction_id = B.id')
                ->edit_column('tanggal', '$1', 'human_time(tanggal)')
                ->edit_column('created_at', '$1', 'human_time(created_at)');

        $this->output->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }
}