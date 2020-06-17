<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel', 'mod');
    }
    
    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('templates/frontend/depan/header',$data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('index');
        $this->load->view('templates/frontend/depan/footer');
    }
    
    public function show_login()
    {

        // $data['title'] = 'Home';
        // $data['kategori_pekerjaan'] = $this->home->getAllKategoriPekerjaan();
        // $data['perusahaan'] = $this->home->getAllPerusahaan();
        // $data['jobOpening'] = $this->home->getAllJobOpening();
        $this->load->view('templates/frontend/login/header');
        $this->load->view('login');
        $this->load->view('templates/frontend/login/footer');
    }

    public function daftar()
    {
        $this->load->view('templates/frontend/login/header');
        $this->load->view('daftar');
        $this->load->view('templates/frontend/login/footer');
    }

    public function save_daftar()
    {
        $post = [
            'nama'      => $this->input->post('nama',true),
            'password'  => password_hash($this->input->post('password', true),PASSWORD_DEFAULT),
            'email'     => $this->input->post('email', true),
            'alamat'    => $this->input->post('alamat', true),
            'no_telpn'  => $this->input->post('no_telpn', true),
            'tanggal_bergabung'  => date('Y-m-d H:i:s')
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_save_daftar($post);
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //         Registrasi Berhasil
        //     </div>');
        $_SESSION['msg'] = 'berhasil';
        redirect('home/show_login');
    }

    /*--------- Auth ----------*/
    public function login()
    {
        $no_telpn = $this->input->post('no_telpn');
        $password = $this->input->post('password');
        $user = $this->db->get_where('customer', ['no_telpn' => $no_telpn])->row_array();
        if($user) {
            if(password_verify($password, $user['password'])) {
                //echo "sini";
                $data = [

                    'id_customer'   => $user['id_customer'],
                    'nama'          => $user['nama'],
                    'no_telpn'      => $user['no_telpn'],
                    'level'         => $user['level'],
                    'email'         => $user['email']
                ];
                $this->session->set_userdata($data);
                $_SESSION['msg'] = 'berhasil_login';
                redirect('home');
            } else {
                $_SESSION['msg'] = 'gagal_salah';
                redirect('home/show_login');
            }
        }else{
            $_SESSION['msg'] = 'gagal_kosong';
            redirect('home/show_login');
        }
    }

    public function logout()
	{
		session_destroy();
		redirect('home');
	}
}