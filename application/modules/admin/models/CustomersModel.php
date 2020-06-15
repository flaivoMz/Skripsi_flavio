<?php

class CustomersModel extends CI_Model {

  
    public function getAllCustomers()
    {
        $query = $this->db->get('customer');
        return $query->result();
    }
  
    
}