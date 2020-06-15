<?php

class DriversModel extends CI_Model {

  
    public function getAllDrivers()
    {
        $query = $this->db->get('rider');
        return $query->result();
    }
  
    public function create()
    {
        $data = [
            "nama_rider" => $this->input->post('nama_rider',true),
            "password" => md5($this->input->post('password', true)),
            "alamat" => $this->input->post('alamat', true),
            "plat_nomor" => $this->input->post('plat_nomor', true),
            "tanggal_bergabung" => $this->input->post('tanggal_bergabung', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->insert('rider', $data);
    }
    
}