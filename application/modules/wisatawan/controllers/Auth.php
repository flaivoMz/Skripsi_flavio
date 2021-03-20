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
        $data['title'] = "Home";

        if($this->session->userdata('cust-iduser')){
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

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UsersModel->userByUsername($username);
     
        if ($user) {

            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'cust-iduser' => $user['id_user'],
                        'cust-username' => $user['username'],
                        'cust-role' => $user['role']
                    ];

                    if ($user['role'] == "wisatawan") {
                        $this->session->set_userdata($data);
                        redirect('account/dashboard');
                    } else {
                    $this->session->set_flashdata('danger', 'Anda tidak memiliki akses sebagai wisatawan');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('danger', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('danger', 'Akun ini belum diaktifkan');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('danger', 'Akun ini belum terdaftar');
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
