<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WisataModel');
        // is_logged_in_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Wisata';
        $data['wisata'] = $this->WisataModel->semuaWisata();
        adminView('wisata/index', $data);
    }

    public function form_wisata($id_wisata = null)
    {
        $data['title'] = 'Tambah Data Wisata';
        $data['kategori'] = ['pantai', 'rekreasi keluarga', 'pegunungan', 'wisata budaya', 'religi', 'edukasi', 'wisata alam','wisata kota','gunung'];
        if ($id_wisata != null) {
            $data['title'] = 'Edit Data Wisata';
            $data['detail'] = $this->WisataModel->wisataById($id_wisata);
        }
        adminView('wisata/form_wisata', $data);
    }

    public function simpan_wisata()
    {
        $this->form_validation->set_rules('nama_wisata', 'Nama wisata', 'trim|required');
        $this->form_validation->set_rules('kategori_wisata', 'Kategori wisata', 'trim|required');
        $this->form_validation->set_rules('harga_wisata', 'Harga wisata', 'trim|required');
        $this->form_validation->set_rules('min_orang', 'Minimal wisata', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/wisata');
        } else {
            if ($this->input->post('submit') == "Tambah") {

                if ($this->WisataModel->tambahWisata()) {
                    $this->session->set_flashdata('success', 'Data Wisata Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('danger', 'Data Wisata Gagal Ditambah');
                }
            }else{
                if ($this->WisataModel->editWisata()) {
                    $this->session->set_flashdata('success', 'Data Wisata Berhasil Diedit');
                } else {
                    $this->session->set_flashdata('danger', 'Data Wisata Gagal Diedit');
                }
            }
            redirect('admin/wisata');
        }
    }

    public function hapus_wisata($id_wisata)
    {
        $wisata = $this->WisataModel->wisataById($id_wisata);

        if ($wisata) {
            if ($this->WisataModel->hapusWisata($id_wisata)) {
                if($wisata['gambar_wisata'] != "defaultwisata.png"){
                    $img_file = "./assets/frontend/img/wisata/" . $wisata['gambar_wisata'];
                    unlink($img_file);
                }
                $this->session->set_flashdata('success', 'Data Wisata Berhasil Dihapus');
            }else{
                $this->session->set_flashdata('success', 'Data Wisata Gagal Dihapus');
            }
        }
        redirect('admin/wisata');;
    }
    // ------------------------

    public function status_driver()
    {
        $id_driver = $this->uri->segment(4);
        $status = $this->uri->segment(5);

        if ($status == "aktif") {
            $status_driver = "tidak";
        } else if ($status == "tidak") {
            $status_driver = "aktif";
        }

        if ($this->driver->update_status_driver($id_driver, $status_driver)) {
            $this->session->set_flashdata('success', 'Status kurir berhasil diperbarui');
        } else {
            $this->session->set_flashdata('danger', 'Status kurir gagal diperbarui');
        }
        redirect('admin/drivers');
    }
    
}
