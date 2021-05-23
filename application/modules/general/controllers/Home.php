<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('PaketwisataModel');
        $this->load->model('PesananModel');
    }
    public function index()
    {
        $data['title'] = "Home";
        $data['wisata'] = $this->PaketwisataModel->wisataPopuler();
        $data['kategori'] = $this->PaketwisataModel->kategoriPopuler();
        $data['pesanan'] = $this->PesananModel->semuaPesanan();
        custView('home/index', $data);

    }

}