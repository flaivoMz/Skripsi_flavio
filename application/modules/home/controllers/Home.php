<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel', 'home');
    }
    public function index()
    {

        $data['title'] = 'Home';
        $data['kategori_pekerjaan'] = $this->home->getAllKategoriPekerjaan();
        $data['perusahaan'] = $this->home->getAllPerusahaan();
        $data['jobOpening'] = $this->home->getAllJobOpening();
        $this->load->view('templates/front/header', $data);
        $this->load->view('templates/front/navbar');
        $this->load->view('index', $data);
        $this->load->view('templates/front/footer');
    }
}