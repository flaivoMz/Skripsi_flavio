<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('CalonModel');
        $this->load->model('PeriodeModel');
    }
    public function index()
    {
        $data['title'] = "Home";
        $data['calon'] = $this->CalonModel->semuaCalon();
        $data['periode'] = $this->PeriodeModel->periodeAktif();
        generalView('home/index', $data);

    }

}