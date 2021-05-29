<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        $this->load->model('PemilihModel');
    }
    public function index()
    {
        $data['title'] = "Masuk";

        if ($this->session->userdata('pemilih-nik')) {
            redirect('/');
        }
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            generalView('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $nik = $this->input->post('nik');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $user = $this->PemilihModel->loginPemilih($nik, $tgl_lahir);

        if ($user) {
            $data = [
                'pemilih-iduser' => $user['id_pemilih'],
                'pemilih-nik' => $user['nik'],
                'pemilih-nama' => $user['nama'],
            ];

            $this->session->set_userdata($data);
            redirect('/');
        } else {
            $this->session->set_flashdata('danger', 'NIK atau tanggal lahir salah');
            redirect('masuk');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('pemilih-iduser');
        $this->session->unset_userdata('pemilih-nik');
        $this->session->unset_userdata('pemilih-nama');

        $this->session->set_flashdata('success', 'Terima kasih. Anda sudah keluar');
        redirect('/');
    }
}
