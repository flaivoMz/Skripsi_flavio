<?php

class CustomersModel extends CI_Model {

  
    public function getAllCustomers()
    {
        $query = $this->db->get('customer');
        return $query->result();
    }
    public function getAllMembers()
    {
        $this->db->where('level', 'member');
        $query = $this->db->get('customer');
        return $query->result();
    }
    public function verifikasi_member($id,$data)
    {
        $this->db->where('id_customer', $id);
        $this->db->update('customer', $data);
        return true;
    }
    public function update_status_customer($id_cust,$status_cust)
    {
        $data = [
            "status" => $status_cust
        ];
        try{
            $this->db->where('id_customer', $id_cust);
            $this->db->update('customer', $data);
            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
  
    
}