<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suara extends MX_Controller
{
  public function __construct()
  {
    $this->load->model('SuaraModel');
    $this->load->model('PeriodeModel');
    
  }
  public function index()
  {
    $data['title'] = "Penghitungan Suara";
    $data['periode'] = $this->PeriodeModel->periodeAktif();
    generalView('suara/index', $data);
  }
  public function jumlah_suara()
  {
    $data = $this->SuaraModel->jumlahSuara();
    echo json_encode($data);
  }
}
