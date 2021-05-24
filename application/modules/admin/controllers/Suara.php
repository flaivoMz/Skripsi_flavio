<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('SuaraModel');
    }

    public function index()
    {
        $data['title'] = 'Data Kotak Suara';
        $data['suara'] = $this->SuaraModel->semuaSuara();
        adminView('suara/index', $data);
    }
    
}
