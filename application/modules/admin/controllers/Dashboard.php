<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in_admin();
        // $this->load->model('PesananModel');
        // $this->load->model('WisatawanModel');
        // $this->load->model('WisataModel');
        // $this->load->model('PemanduModel');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        // $data['pesanan'] = $this->PesananModel->semuaPesanan();
        // $data['wisatawan'] = count($this->WisatawanModel->semuaWisatawan());
        // $data['wisata'] = count($this->WisataModel->semuaWisata());
        // $data['pemandu'] = count($this->PemanduModel->semuaPemandu());
        adminView('dashboard/index', $data);
    }

    public function changepassword()
    {
        $username = $this->session->userdata('username');
        $old_password = $this->input->post('old_password');
        $new_password1 = $this->input->post('new_password1');
        $new_password2 = $this->input->post('new_password2');

        $user = $this->admin->getAdmin($username);
        if(password_verify($old_password, $user->password)){
            
            if(trim($new_password1) != trim($new_password2)){
                $this->session->set_flashdata('danger', 'Password baru dan konfirmasi password baru tidak sama');
            }else{
                $data = [
                    "id_admin"=>$user->id_admin,
                    "password"=>password_hash($new_password1, PASSWORD_DEFAULT),
                ];
                $this->admin->changePassword($data);
                $this->session->set_flashdata('success', 'Password berhasil diperbarui');
                
            }
        }else{
            $this->session->set_flashdata('danger', 'Password lama salah');
        }
        redirect('admin/dashboard');
    }
}
