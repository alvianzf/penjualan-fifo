<?php defined('BASEPATH') OR exit('OK');

class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('migration');
    }

    public function index()
    {
        $this->data['version'] = $this->migration->current();
    }

    public function reset()
    {
        $version = '';

        $this->data['version'] = $this->migration->version($version);
    }
}