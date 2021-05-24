<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('PeriodeModel');
    }

    public function index($id = null)
    {
        $data['title'] = 'Data Periode Pilkada';
        $data['periode'] = $this->PeriodeModel->semuaPeriode();
        if($id){
            $data['detail'] = $this->PeriodeModel->periodeById($id);
        }
        adminView('periode/index', $data);
    }

    public function simpan_periode()
    {
        $this->form_validation->set_rules('periode_jabatan', 'Periode jabatan', 'trim|required');
        $this->form_validation->set_rules('mulai_pilih', 'Waktu mulai', 'trim|required');
        $this->form_validation->set_rules('batas_pilih', 'Batas pilih', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/periode');
        } else {
            $cekPeriode = $this->PeriodeModel->periodeAktif();
            if($this->input->post('status') == 'aktif' && $cekPeriode){
                $this->session->set_flashdata('danger', 'Gagal Disimpan. Periode aktif pilkada maksimal 1 periode');
                redirect('admin/periode');
            }
            if ($this->input->post('submit') == "Tambah") {

                if ($this->PeriodeModel->tambahPeriode()) {
                    $this->session->set_flashdata('success', 'Data Periode Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('danger', 'Data Periode Gagal Ditambah');
                }
            }else{
                if ($this->PeriodeModel->editPeriode()) {
                    $this->session->set_flashdata('success', 'Data Periode Berhasil Diedit');
                } else {
                    $this->session->set_flashdata('danger', 'Data Periode Gagal Diedit');
                }
            }
            redirect('admin/periode');
        }
    }

    public function hapus_periode($id_periode)
    {
        $periode = $this->PeriodeModel->periodeById($id_periode);

        if ($periode) {
            if ($this->PeriodeModel->hapusPeriode($id_periode)) {
                $this->session->set_flashdata('success', 'Data Periode Berhasil Dihapus');
            }else{
                $this->session->set_flashdata('success', 'Data Periode Gagal Dihapus');
            }
        }else{
            $this->session->set_flashdata('success', 'Data Periode Tidak Ditemukan');
        }
        redirect('admin/periode');;
    }
    
}
