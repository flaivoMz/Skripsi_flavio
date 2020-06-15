<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrdersModel', 'orders');
    }
    public function index()
    {
        $data['title'] = 'Orders';
        $data['orders'] = $this->orders->getAllOrders();
        adminView('orders/index', $data);
    }
}