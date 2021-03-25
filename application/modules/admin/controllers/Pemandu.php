<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemandu extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemanduModel');
        // is_logged_in_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Pemandu';
        $data['pemandu'] = $this->PemanduModel->semuaPemandu();
        adminView('pemandu/index', $data);
    }
    public function simpan_pemandu()
    {
        if ($this->input->post('submit') == "Tambah") {

            if ($this->PemanduModel->tambahPemandu()) {
                $this->session->set_flashdata('success', 'Data Pemandu Berhasil Ditambah');
            } else {
                $this->session->set_flashdata('danger', 'Data Pemandu Gagal Ditambah');
            }
        } else {
            if ($this->PemanduModel->editPemandu()) {
                $this->session->set_flashdata('success', 'Data Pemandu Berhasil Diedit');
            } else {
                $this->session->set_flashdata('danger', 'Data Pemandu Gagal Diedit');
            }
        }
        redirect('admin/pemandu');
    }

    public function hapus_pemandu($id_pemandu)
    {
        $pemandu = $this->PemanduModel->pemanduById($id_pemandu);

        if ($pemandu) {
            if ($this->PemanduModel->hapusPemandu($id_pemandu)) {
                if ($pemandu['photo'] != "profile.png") {
                    $img_file = "./assets/frontend/img/pemandu/" . $pemandu['photo'];
                    unlink($img_file);
                }
                $this->session->set_flashdata('success', 'Data Pemandu Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('success', 'Data Pemandu Gagal Dihapus');
            }
        }
        redirect('admin/pemandu');;
    }
}
