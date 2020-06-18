<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TarifOngkirModel', 'tarifongkir');
        $this->load->model('TarifBarangModel', 'tarifbarang');
        is_logged_in(3);
    }
    public function index()
    {
        $data['title'] = 'Setting Tarif';
        $data['tarifongkir'] = $this->tarifongkir->getAllTarif();
        $data['tarifbarang'] = $this->tarifbarang->getAllTarif();

        adminView('tarif/index', $data);
    }
    public function create_tarif_ongkir()
    {

        $this->form_validation->set_rules('jarak_minimal', 'Jarak Minimal', 'required');
        $this->form_validation->set_rules('status_jarak_minimal', 'Status Jarak Minimal', 'required');
        $this->form_validation->set_rules('harga_jarak_minimal', 'Harga Jarak Minimal', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('kategori_harga', 'Kategori Harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/tarif');
        } else {
            $this->tarifongkir->create();
            $this->session->set_flashdata('success', 'Data Tarif Ongkir Berhasil Ditambah');
            redirect('admin/tarif');
        }
    }
    public function create_tarif_barang()
    {

        $this->form_validation->set_rules('harga_overweight', 'Harga Overweight', 'required');
        $this->form_validation->set_rules('harga_oversize', 'Harga Oversize', 'required');
        $this->form_validation->set_rules('harga_normal', 'Harga Normal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/tarif');
            $this->session->set_flashdata('success', 'Data Tarif Barang Gagal Ditambah');
        } else {
            $this->tarifbarang->create();
            $this->session->set_flashdata('success', 'Data Tarif Barang Berhasil Ditambah');
            redirect('admin/tarif');
        }
    }
    public function update_tarif_barang()
    {

        $this->form_validation->set_rules('harga_overweight', 'Harga Overweight', 'required');
        $this->form_validation->set_rules('harga_oversize', 'Harga Oversize', 'required');
        $this->form_validation->set_rules('harga_normal', 'Harga Normal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/tarif');
        } else {
            $this->tarifbarang->update();
            $this->session->set_flashdata('success', 'Data Tarif Barang Berhasil Diperbarui');
            redirect('admin/tarif');
        }
    }
    public function update_tarif_ongkir()
    {

        $this->form_validation->set_rules('jarak_minimal', 'Jarak Minimal', 'required');
        $this->form_validation->set_rules('status_jarak_minimal', 'Status Jarak Minimal', 'required');
        $this->form_validation->set_rules('harga_jarak_minimal', 'Harga Jarak Minimal', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('kategori_harga', 'Kategori Harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/tarif');
        } else {
            $this->tarifongkir->update();
            $this->session->set_flashdata('success', 'Data Tarif Ongkir Berhasil Diperbarui');
            redirect('admin/tarif');
        }
    }
    public function delete_barang($id)
    {
        $this->tarifbarang->delete($id);
        $this->session->set_flashdata('success', 'Data Tarif Barang Berhasil Dihapus');
        redirect('admin/tarif');;
    }
    public function delete_ongkir($id)
    {
        $this->tarifongkir->delete($id);
        $this->session->set_flashdata('success', 'Data Tarif Ongkir Berhasil Dihapus');
        redirect('admin/tarif');;
    }
}