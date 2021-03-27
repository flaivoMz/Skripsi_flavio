<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('BayarModel');
        $this->load->model('PesananModel');
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran';
        $data['pembayaran'] = $this->BayarModel->semuaPembayaran();
        $data['pesanan'] = $this->PesananModel->semuaPesanan();
        adminView('pembayaran/index', $data);
    }

    public function simpan_bayar()
    {
        if ($this->input->post('submit') == "Tambah") {
            if ($this->BayarModel->tambahBayar()) {
                $this->session->set_flashdata('success', 'Data Pembayaran Berhasil Ditambah');
            } else {
                $this->session->set_flashdata('danger', 'Data Pembayaran Gagal Ditambah');
            }
        } else {
            if ($this->BayarModel->editBayar()) {
                $this->session->set_flashdata('success', 'Data Pembayaran Berhasil Diedit');
            } else {
                $this->session->set_flashdata('danger', 'Data Pembayaran Gagal Diedit');
            }
        }

        redirect('admin/bayar');
    }

    public function hapus_bayar($id_bayar)
    {

        if ($this->BayarModel->hapusBayar($id_bayar)) {
            $this->session->set_flashdata('success', 'Data Bayar Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Bayar Gagal Dihapus');
        }

        redirect('admin/bayar');;
    }
}
