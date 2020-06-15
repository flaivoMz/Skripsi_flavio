<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('HomeModel', 'home');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        adminView('dashboard/index', $data);
    }
}