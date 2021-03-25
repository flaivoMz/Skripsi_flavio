<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisatawan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WisatawanModel');
        // is_logged_in_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Wisatawan';
        $data['wisatawan'] = $this->WisatawanModel->semuaWisatawan();
        adminView('wisatawan/index', $data);
    }
}