<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DriversModel', 'driver');
    }
    public function index()
    {
        $data['title'] = 'Driver';
        $data['drivers'] = $this->driver->getAllDrivers();
        adminView('drivers/index', $data);
    }
    public function create()
    {
        $data['title'] = 'Add New Driver';
        adminView('drivers/create', $data);
    }
    public function store()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_rider', 'Driver Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('plat_nomor', 'Plat Number', 'required');
        $this->form_validation->set_rules('tanggal_bergabung', 'Join Date', 'required');
        $this->form_validation->set_rules('status', 'Driver Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/drivers');
        } else {
            $this->driver->create();
            $this->session->set_flashdata('success', 'New drivers has created');
            redirect('admin/drivers');
        }
    }
    
}