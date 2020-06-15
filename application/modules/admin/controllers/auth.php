<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('HomeModel', 'home');
    }
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('auth/index', $data);
    }
}