<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parpol extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('ParpolModel');
    }

    public function index($id = null)
    {
        $data['title'] = 'Data Partai Politik';
        $data['parpol'] = $this->ParpolModel->semuaParpol();
        if($id){
            $data['detail'] = $this->ParpolModel->parpolById($id);
        }
        adminView('parpol/index', $data);
    }

    public function simpan_parpol()
    {
        $this->form_validation->set_rules('nama_parpol', 'Nama partai', 'trim|required');
        $this->form_validation->set_rules('singkatan', 'Singkatan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/parpol');
        } else {
            if ($this->input->post('submit') == "Tambah") {

                if ($this->ParpolModel->tambahParpol()) {
                    $this->session->set_flashdata('success', 'Data Partai Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('danger', 'Data Partai Gagal Ditambah');
                }
            }else{
                if ($this->ParpolModel->editParpol()) {
                    $this->session->set_flashdata('success', 'Data Partai Berhasil Diedit');
                } else {
                    $this->session->set_flashdata('danger', 'Data Partai Gagal Diedit');
                }
            }
            redirect('admin/parpol');
        }
    }

    public function hapus_parpol($id_parpol)
    {
        $parpol = $this->ParpolModel->parpolById($id_parpol);

        if ($parpol) {
            if ($this->ParpolModel->hapusParpol($id_parpol)) {
                if($parpol['logo'] != "defaultlogo.png"){
                    $img_file = "./assets/images/parpol/" . $parpol['logo'];
                    unlink($img_file);
                }
                $this->session->set_flashdata('success', 'Data Partai Berhasil Dihapus');
            }else{
                $this->session->set_flashdata('success', 'Data Partai Gagal Dihapus');
            }
        }
        redirect('admin/parpol');;
    }
    
}
