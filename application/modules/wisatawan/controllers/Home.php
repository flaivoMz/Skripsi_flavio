<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('PaketwisataModel');
    }
    public function index()
    {
        $data['title'] = "Home";
        $data['wisata'] = $this->PaketwisataModel->wisataPopuler();
        $data['kategori'] = $this->PaketwisataModel->kategoriPopuler();
        custView('home/index', $data);

    }

}