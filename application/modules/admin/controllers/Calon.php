<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in_admin();
    $this->load->model('CalonModel');
    $this->load->model('ParpolModel');
    $this->load->model('PeriodeModel');
    $this->load->model('PemilihModel');
  }

  public function index()
  {
    $data['title'] = 'Data Calon Pilkada';
    $data['calon'] = $this->CalonModel->semuaCalon();
    adminView('calon/index', $data);
  }
  public function acak_nourut()
  {
    $calons = $this->CalonModel->calonPeriodeAktif();
    $i = 1;
    foreach ($calons as $calon) {
      $this->CalonModel->updateNoUrut($calon['id_calon'], $i);
      $i++;
    }

    $this->session->set_flashdata('success', 'No urut calon pilkada berhasil diacak');
    redirect('admin/calon');
  }

  public function form_calon($id = null)
  {
    $data['title'] = 'Tambah Calon Pilkada';
    $data['periode'] = $this->PeriodeModel->semuaPeriode();
    $data['pemilih'] = $this->PemilihModel->semuaPemilih();
    $data['parpol'] = $this->ParpolModel->semuaParpol();
    if ($id) {
      $data['title'] = 'Edit Calon Pilkada';
      $data['detail'] = $this->CalonModel->calonById($id);
    }
    adminView('calon/form_calon', $data);
  }
  public function simpan_calon()
  {
    $this->form_validation->set_rules('id_ketua', 'Ketua', 'trim|required');
    $this->form_validation->set_rules('id_wakil', 'Wakil Ketua', 'trim|required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
    $this->form_validation->set_rules('visi_misi', 'Visi dan Misi', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      redirect('admin/calon');
    } else {
      if ($this->input->post('submit') == "Tambah") {

        if ($this->CalonModel->tambahCalon()) {
          $this->session->set_flashdata('success', 'Data Calon Pilkada Berhasil Ditambah');
        } else {
          $this->session->set_flashdata('danger', 'Data Calon Pilkada Gagal Ditambah');
        }
      } else {
        if ($this->CalonModel->editCalon()) {
          $this->session->set_flashdata('success', 'Data Calon Pilkada Berhasil Diedit');
        } else {
          $this->session->set_flashdata('danger', 'Data Calon Pilkada Gagal Diedit');
        }
      }
      redirect('admin/calon');
    }
  }

  public function hapus_calon($id_calon)
  {
    $calon = $this->CalonModel->calonById($id_calon);
    if ($calon) {
      if ($this->CalonModel->hapusCalon($id_calon)) {
        if ($calon['photo'] != "defaultcalon.png") {
          $img_file = "./assets/images/calon/" . $calon['photo'];
          unlink($img_file);
        }
        $this->session->set_flashdata('success', 'Data Calon Pilkada Berhasil Dihapus');
      } else {
        $this->session->set_flashdata('danger', 'Data Calon Pilkada Gagal Dihapus');
      }
    }
    redirect('admin/calon');
  }
}
