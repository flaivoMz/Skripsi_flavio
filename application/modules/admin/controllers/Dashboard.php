<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrdersModel', 'orders');
        $this->load->model('CustomersModel', 'customers');
        $this->load->model('DriversModel', 'drivers');
        $this->load->model('AdminModel', 'admin');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $orders = $this->orders->getAllOrders();
        $jumlah_order = $this->orders->jumlah_order();
        $customers = $this->customers->getAllCustomers();
        $drivers = $this->drivers->getAllDrivers();
        $data['total_order'] = count($orders);
        $data['total_customer'] = count($customers);
        $data['total_driver'] = count($drivers);
        $data['order_hari_ini'] = $jumlah_order->total;

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
