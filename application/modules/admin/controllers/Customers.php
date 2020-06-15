<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CustomersModel', 'customer');
    }
    public function index()
    {
        $data['title'] = 'Customers';
        $data['customers'] = $this->customer->getAllCustomers();
        adminView('customers/index', $data);
    }
}