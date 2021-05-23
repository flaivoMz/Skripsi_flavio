<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        is_logged_in_wisatawan();
        $this->load->model('UsersModel');
        $this->load->model('PesananModel');
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->UsersModel->wisatawanByIdUser($this->session->userdata('cust-iduser'));
        $data['pesanan'] = $this->PesananModel->pesananByUser($data['user']['id_wisatawan']);
        custView('dashboard/index', $data);
    }
}
