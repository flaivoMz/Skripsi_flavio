<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel', 'mod');
    }
    public function index()
    {
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('index');
        $this->load->view('templates/frontend/footer');
    }

    
}