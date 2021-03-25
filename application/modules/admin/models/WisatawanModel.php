<?php

class WisatawanModel extends CI_Model
{


    public function semuaWisatawan()
    {
        $this->db->select('w.*, u.*');
        $this->db->from('wisatawan as w');
        $this->db->join('users as u','u.id_user=w.id_user');
        return $this->db->get()->result_array();
    }
    public function wisatawanById($id_wisatawan)
    {
        $query = $this->db->get_where('wisatawan', ['id_wisatawan' => $id_wisatawan]);
        return $query->row_array();
    }
}