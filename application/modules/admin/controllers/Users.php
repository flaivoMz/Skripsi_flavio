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

        if($id_user != null){
            $data['detail'] = $this->UsersModel->usersById($id_user);
        }
        adminView('users/index', $data);
    }

    public function simpan_user()
    {
        if($this->input->post('submit') == "Tambah"){
            $cekUsername = $this->UsersModel->usersByUsername($this->input->post('username'));
            if($cekUsername){
                $this->session->set_flashdata('danger', 'Gagal tambah. Username '.$cekUsername['username'].' sudah terdaftar');
                redirect('admin/users'); 
            }


            if($this->UsersModel->tambahAdmin()){
                $this->session->set_flashdata('success', 'Data Admin Berhasil Ditambah');
            }else{
                $this->session->set_flashdata('danger', 'Data Admin Gagal Ditambah');
            }
        }else{
            if ($this->UsersModel->editAdmin()) {
                $this->session->set_flashdata('success', 'Data Admin Berhasil Diedit');
            } else {
                $this->session->set_flashdata('danger', 'Data Admin Gagal Diedit');
            }
        }
        redirect('admin/users');   
        
    }

    public function hapus_user($id_user)
    {
        $user = $this->UsersModel->usersById($id_user);

        if ($user) {
            // if($user['role']=="wisatawan"){
            // }
            if ($this->UsersModel->hapusUser($id_user)) {
               
                $this->session->set_flashdata('success', 'Data User Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('success', 'Data User Gagal Dihapus');
            }
        }
        redirect('admin/users');;
    }
    // ----------------------

   
}