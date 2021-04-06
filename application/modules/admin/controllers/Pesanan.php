<?php
// header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('PesananModel');
        $this->load->model('PemanduModel');
    }

    public function index()
    {
        $data['title'] = 'Data Pesanan';
        $data['pesanan'] = $this->PesananModel->semuaPesanan();
        $data['pemandu'] = $this->PemanduModel->semuaPemandu();
        adminView('pesanan/index', $data);
    }
    public function batal_pesanan($id_pesanan)
    {
        if($this->PesananModel->pesananById($id_pesanan)){
            if($this->PesananModel->batalPesanan($id_pesanan)){
                $this->session->set_flashdata('success', 'Pesanan berhasil dibatalkan');
            }else{
                $this->session->set_flashdata('danger', 'Pesanan gagal dibatalkan. Coba lagi nanti');
            }
        }else{
            $this->session->set_flashdata('danger', 'Gagal membatalkan. Pesanan tidak ditemukan');
        }
        redirect('admin/pesanan');
    }
    public function expired_pesanan($id_pesanan)
    {
        if($this->PesananModel->pesananById($id_pesanan)){
            if($this->PesananModel->expiredPesanan($id_pesanan)){
                $this->session->set_flashdata('success', 'Berhasil menggati status pesanan menjadi expired');
            }else{
                $this->session->set_flashdata('danger', 'Gagal menggati status pesanan menjadi expired');
            }
        }else{
            $this->session->set_flashdata('danger', 'Gagal membatalkan. Pesanan tidak ditemukan');
        }
        redirect('admin/pesanan');
    }

    public function setting_pemandu()
    {
        if($this->PesananModel->settingPemandu()){
            $this->session->set_flashdata('success', 'Pemandu berhasil ditambahkan');
        }else{
            $this->session->set_flashdata('gagal', 'Gagal menambahkan pamandu');
        }
        redirect('admin/pesanan');
    }
    public function list_pemandu($idpesanan)
    {
        
        // header("Access-Control-Allow-Methods: GET, OPTIONS");
        $data = $this->PemanduModel->pemanduByIdPesanan($idpesanan);
        echo json_encode($data);
    }
}
