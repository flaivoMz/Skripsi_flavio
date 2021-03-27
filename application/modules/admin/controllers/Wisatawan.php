<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisatawan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('WisatawanModel');
    }

    public function index()
    {
        $data['title'] = 'Data Wisatawan';
        $data['wisatawan'] = $this->WisatawanModel->semuaWisatawan();
        adminView('wisatawan/index', $data);
    }
}