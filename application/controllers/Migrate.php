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
        if (! $this->data['version'] = $this->migration->current()) {
            check('Failed to migrate');
            check($this->migration->error_string());
        } else {
            check ('Success!');
            check('Migrated to: ');
            check($this->migration->current());
        }
    }

    public function reset()
    {
        $version = 20191010000001;

        if($this->data['version'] = $this->migration->version($version)) {
            check('Reset successful');
        } else {
            check('reset failed!');
            check($this->migration->error_string());
        }
    }
}