<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->model('UsersModel');
    }
    public function index($id_user = null)
    {
        $data['title'] = 'Data Users';
        $data['users'] = $this->UsersModel->semuaUsers();

        if ($id_user != null) {
            $data['detail'] = $this->UsersModel->usersById($id_user);
        }
        adminView('users/index', $data);
    }

    public function simpan_user()
    {
        $cekUsername = $this->UsersModel->usersByUsername($this->input->post('username'));

        if ($this->input->post('submit') == "Tambah") {
            if ($cekUsername) {
                $this->session->set_flashdata('danger', 'Gagal tambah. Username ' . $cekUsername['username'] . ' sudah terdaftar');
                redirect('admin/users');
            }
            if ($this->UsersModel->tambahAdmin()) {
                $this->session->set_flashdata('success', 'Data KPU Berhasil Ditambah');
            } else {
                $this->session->set_flashdata('danger', 'Data KPU Gagal Ditambah');
            }
        } else {
            if ($this->input->post('username') != $this->input->post('username_lama')) {
                if ($cekUsername) {
                    $this->session->set_flashdata('danger', 'Gagal edit. Username ' . $cekUsername['username'] . ' sudah terdaftar');
                    redirect('admin/users');
                }
            }
            if ($this->UsersModel->editAdmin()) {
                $this->session->set_flashdata('success', 'Data KPU Berhasil Diedit');
            } else {
                $this->session->set_flashdata('danger', 'Data KPU Gagal Diedit');
            }
        }
        redirect('admin/users');
    }

    public function hapus_user($id_user)
    {
        $user = $this->UsersModel->usersById($id_user);

        if ($user) {
            if ($this->UsersModel->hapusUser($id_user)) {

                $this->session->set_flashdata('success', 'Data KPU Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('success', 'Data KPU Gagal Dihapus');
            }
        }
        redirect('admin/users');;
    }
}
