<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
  public function __construct()
  {
    $this->load->model('CalonModel');
    $this->load->model('PeriodeModel');
    $this->load->model('ParpolModel');
  }
  public function index()
  {
    $data['title'] = "Home";
    $data['calon'] = $this->CalonModel->semuaCalon();
    $data['periode'] = $this->PeriodeModel->periodeAktif();
    $data['statusVote'] = false;

    if ($this->session->userdata('pemilih-iduser')) {
      $cekVote = $this->CalonModel->cekVote($this->session->userdata('pemilih-iduser'), $data['periode']['id_periode']);
      if ($cekVote) {
        $data['statusVote'] = true;
        $data['vote'] = $this->CalonModel->calonById($cekVote['id_calon']);
      }
    }
    generalView('home/index', $data);
  }

  public function vote($id_calon)
  {
    $calon = $this->CalonModel->calonById($id_calon);

    if ($calon) {
      if ($this->CalonModel->voteCalon($id_calon)) {
        // $this->session->set_flashdata('success', '<b>Berhasil vote.</b> Terima kasih sudah menggunakan hak pilih Anda.');
      } else {
        $this->session->set_flashdata('danger', 'Gagal vote. Terjadi kesalahan sistem');
      }
    } else {
      $this->session->set_flashdata('danger', 'Gagal vote. Data calon tidak ditemukan');
    }
    redirect('/');
  }
}
