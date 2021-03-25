<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin/dashboard');
        }
        
        $data['title'] = 'Login';
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index', $data);
        } else {
            $this->_login();
        }
        
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UsersModel->usersByUsername($username);

        if ($user) {

            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'admin-iduser' => $user['id_user'],
                        'admin-username' => $user['username'],
                        'admin-role' => $user['role']
                    ];

                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                    
                } else {
                    $this->session->set_flashdata('danger', 'Password salah!');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('danger', 'Login gagal. User ini diblokir!');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('danger', 'Akun ini tidak terdaftar');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin-iduser');
        $this->session->unset_userdata('admin-username');
        $this->session->unset_userdata('admin-role');

        $this->session->set_flashdata('success', 'Terima kasih. Anda telah keluar');
        redirect('admin/login');
    }
    public function blocked()
    {
        $this->load->view('admin/login/blocked');
    }
}
