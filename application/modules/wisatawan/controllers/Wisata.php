<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('PaketwisataModel');
        $this->load->model('PesananModel');
        $this->load->model('PemanduwisataModel');
    }
    public function index($kategori = null)
    {
        $data['title'] = "Wisata Semua Kategori";
        $data['wisata'] = $this->PaketwisataModel->semuaWisata();
        $data['wisata2'] = $data['wisata'];
        $data['kategori'] = $this->PaketwisataModel->semuaKategori();
        $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data['title'] = "Cari Wisata";
            $data['wisata'] = $this->PaketwisataModel->cariWisata($this->input->post('keyword'));
        } else {

            if(isset($_POST['filter'])){
                $data['title'] = "Filter Harga";
                $data['wisata'] = $this->PaketwisataModel->wisataByHarga($this->input->post('harga'));
            }else{
                if ($kategori != null) {
                    $data['title'] = "Kategori " . str_replace('-', ' ', $kategori);
                    $data['wisata'] = $this->PaketwisataModel->wisataByKategori($kategori);
                }
            }
        }
        custView('wisata/index', $data);
    }
    public function detail_wisata($slug = null)
    {
        $data['title'] = "Wisata";
        $data['wisata'] = $this->PaketwisataModel->wisataBySlug($slug);
        $data['wisataSerupa'] = $this->PaketwisataModel->wisataSerupa($data['wisata']['id_wisata'], $data['wisata']['kategori_wisata']);
        if (count($data['wisataSerupa']) == 0) {
            $data['wisataSerupa'] = $this->PaketwisataModel->wisataSerupa($data['wisata']['id_wisata']);
        }
        custView('wisata/detail-wisata', $data);
    }

    public function form_pesan()
    {
        $data['title'] = "Lengkapi pesanan";
        custView('wisata/form-pesan', $data);
    }

    public function pesan_wisata()
    {
        if($this->PesananModel->pesanWisata()){
            $this->session->set_flashdata('success', 'Pesanan berhasil disimpan');
            redirect('account/dashboard');
        }else{
            $this->session->set_flashdata('danger', 'Pesanan gagal disimpan');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
