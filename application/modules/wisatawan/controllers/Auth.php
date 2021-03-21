<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('UsersModel');
    }
    public function index()
    {
        $data['title'] = "Masuk";

        if ($this->session->userdata('cust-iduser')) {
            redirect('account/dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            custView('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    public function daftar()
    {
        $data['title'] = "Daftar";


        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            custView('auth/daftar', $data);
        } else {
            $user = $this->UsersModel->userByUsername($this->input->post('username'));

            if ($user) {
                $this->session->set_flashdata('danger', 'Gagal daftar. Username sudah terdaftar');
                redirect('auth/daftar');
            }
            $id_user = $this->UsersModel->daftarAkun();
            if ($this->UsersModel->daftarWisatawan($id_user)) {
                $this->session->set_flashdata('success', 'User berhasil didaftarkan. Silahkan login');
                redirect('auth');
            } else {
                $this->session->set_flashdata('danger', 'User gagal didaftarkan. Coba sesaat lagi');
                redirect('auth/daftar');
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UsersModel->userByUsername($username);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $wisatawan = $this->UsersModel->wisatawanByIdUser($user['id_user']);

                    $data = [
                        'cust-iduser' => $user['id_user'],
                        'cust-idwisatawan' => $wisatawan['id_wisatawan'],
                        'cust-username' => $user['username'],
                        'cust-role' => $user['role']
                    ];

                    $this->session->set_userdata($data);
                    redirect('account/dashboard');
                } else {
                    $this->session->set_flashdata('danger', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('danger', 'Akun ini sedang diblokir');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Akun ini belum terdaftar sebagai wisatawan');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('cust-username');
        $this->session->unset_userdata('cust-role');
        $this->session->unset_userdata('cust-iduser');

        $this->session->set_flashdata('success', 'You have been logged out');
        redirect('auth');
    }
}
