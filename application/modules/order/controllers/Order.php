<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrderModel', 'mod');
    }
    public function index()
    {

        // $data['title'] = 'Home';
        // $data['kategori_pekerjaan'] = $this->home->getAllKategoriPekerjaan();
        // $data['perusahaan'] = $this->home->getAllPerusahaan();
        // $data['jobOpening'] = $this->home->getAllJobOpening();
        $this->load->view('templates/frontend/header');
        $this->load->view('templates/frontend/navbar');
        $this->load->view('index');
        $this->load->view('templates/frontend/footer');
    }


}