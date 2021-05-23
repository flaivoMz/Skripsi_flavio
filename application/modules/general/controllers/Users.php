<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MX_Controller
{
    public function __construct()
    {
        is_logged_in_wisatawan();
        $this->load->model('UsersModel');
        $this->load->model('PesananModel');
        $this->load->model('PemanduModel');
    }
    public function edit_password()
    {
        $this->form_validation->set_rules('old_password', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('confirm_new_password', 'Konfirmasi Password Baru', 'trim|required');

        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_new_password = $this->input->post('confirm_new_password');

        if ($this->form_validation->run() == FALSE) {
            redirect('account/dashboard');
        } else {
            if (trim($new_password) != trim($confirm_new_password)) {
                $this->session->set_flashdata('danger', 'Password baru tidak sama dengan konfirmasi password');
                redirect('account/dashboard');
            }
            $user = $this->UsersModel->userById($this->session->userdata('cust-iduser'));

            if (password_verify($old_password, $user['password'])) {
                if ($this->UsersModel->editPassword()) {
                    $this->session->set_flashdata('success', 'Password berhasil diperbarui');
                } else {
                    $this->session->set_flashdata('danger', 'Password gagal diperbarui');
                }
            } else {
                $this->session->set_flashdata('danger', 'Gagal edit password. Password lama salah!');
            }
            redirect('account/dashboard');
        }
    }

    public function edit_profil()
    {
        $this->form_validation->set_rules('nama_wisatawan', 'nama lengkap', 'trim|required');
        $this->form_validation->set_rules('alamat_wisatawan', 'alamat', 'trim|required');
        $this->form_validation->set_rules('jekel_wisatawan', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('no_hp_wisatawan', 'no handphone', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('account/dashboard');
        } else {
            if ($this->UsersModel->editProfil()) {
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
            } else {
                $this->session->set_flashdata('danger', 'Profil gagal diperbarui');
            }
            redirect('account/dashboard');
        }
    }

    public function batal_pesanan($kode_booking)
    {
        if($this->PesananModel->pesananByKodeBooking($kode_booking)){
            if($this->PesananModel->batalPesanan($kode_booking)){
                $this->session->set_flashdata('success', 'Pesanan berhasil dibatalkan');
            }else{
                $this->session->set_flashdata('danger', 'Gagal membatalkan. Coba sesaat lagi');
            }
        }else{
            $this->session->set_flashdata('danger', 'Gagal membatalkan. Pesanan tidak ditemukan');
        }
        redirect('account/dashboard');
    }
    public function list_pemandu($idpesanan)
    {
        $data = $this->PemanduModel->pemanduByIdPesanan($idpesanan);
        echo json_encode($data);
       
    }
}
