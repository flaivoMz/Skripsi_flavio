<?php

class OrdersModel extends CI_Model {

  
    public function getAllOrders()
    {
        $this->db->select('oc.*, r.nama_rider,c.nama');
        $this->db->from('order_customer AS oc');
        $this->db->join('customer AS c','c.id_customer=oc.id_customer');
        $this->db->join('rider AS r','r.id_rider=oc.id_rider','left');
        $query = $this->db->get();
        return $query->result();
    }
  
    
}