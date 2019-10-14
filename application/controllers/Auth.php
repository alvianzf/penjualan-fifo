<?php defined('BASEPATH') OR exit ('No direct script access is allowed!');

class Auth extends MY_Controller
{

    protected $asides = [
        'header'  => 'asides/header',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // check('exit');exit;
    }
}