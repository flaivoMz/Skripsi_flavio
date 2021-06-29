<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilih extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in_admin();
    $this->load->model('PemilihModel');
  }

  public function index()
  {
    $data['title'] = 'Data Pemilih';
    $data['pemilih'] = $this->PemilihModel->semuaPemilih();
    adminView('pemilih/index', $data);
  }
  public function simpan_pemilih()
  {
    if ($this->input->post('submit') == "Tambah") {
      $cekNIK = $this->PemilihModel->pemilihByNik($this->input->post('nik', true));

      if ($cekNIK) {
        $this->session->set_flashdata('danger', 'Data Pemilih Gagal Ditambah. NIK Sudah Terdaftar');
        redirect('admin/pemilih');
      }
      if ($this->PemilihModel->tambahPemilih()) {
        $this->session->set_flashdata('success', 'Data Pemilih Berhasil Ditambah');
      } else {
        $this->session->set_flashdata('danger', 'Data Pemilih Gagal Ditambah');
      }
    } else {
      if ($this->PemilihModel->editPemilih()) {
        $this->session->set_flashdata('success', 'Data Pemilih Berhasil Diedit');
      } else {
        $this->session->set_flashdata('danger', 'Data Pemilih Gagal Diedit');
      }
    }
    redirect('admin/pemilih');
  }

  public function hapus($id_pemilih)
  {
    $pemilih = $this->PemilihModel->pemilihById($id_pemilih);

    if ($pemilih) {
      if ($this->PemilihModel->hapusPemilih($id_pemilih)) {
        $this->session->set_flashdata('success', 'Data Pemilih Berhasil Dihapus');
      } else {
        $this->session->set_flashdata('success', 'Data Pemilih Gagal Dihapus');
      }
    }
    redirect('admin/pemilih');;
  }
}
