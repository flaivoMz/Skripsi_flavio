<?php

class DriversModel extends CI_Model {

  
    public function getAllDrivers()
    {
        $query = $this->db->get('rider');
        return $query->result();
    }
    public function getDriver($id)
    {
        $query = $this->db->get_where('rider', ['id_rider' => $id]);
        return $query->row();
    }
  
    public function create()
    {
        $data = [
            "nama_rider" => $this->input->post('nama_rider',true),
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            "alamat" => $this->input->post('alamat', true),
            "plat_nomor" => $this->input->post('plat_nomor', true),
            "tanggal_bergabung" => $this->input->post('tanggal_bergabung', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->insert('rider', $data);
    }
    
    public function update()
    {
        $id = $this->input->post('id_rider');

        $data = [
            "nama_rider" => $this->input->post('nama_rider',true),
            "alamat" => $this->input->post('alamat', true),
            "plat_nomor" => $this->input->post('plat_nomor', true),
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_rider', $id);
        $this->db->update('rider', $data);
    }

    public function update_status_driver($id_driver,$status_driver)
    {
        $data = [
            "status" => $status_driver
        ];
        try{
            $this->db->where('id_rider', $id_driver);
            $this->db->update('rider', $data);
            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        $this->db->delete('rider', ['id_rider' => $id]);

    }
    
}