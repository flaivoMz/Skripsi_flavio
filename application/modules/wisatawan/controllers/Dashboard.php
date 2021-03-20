<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('UsersModel');
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->UsersModel->userById($this->session->userdata('cust-iduser'));
        // $data['kategori'] = $this->PaketwisataModel->kategoriPopuler();
        custView('dashboard/index', $data);
    }
}
