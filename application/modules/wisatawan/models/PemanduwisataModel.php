<?php

class PemanduwisataModel extends CI_Model
{

    public function pemanduByIdWisata($id_wisata)
    {
        $this->db->select('pw.*, p.*');
        $this->db->from('pemandu_wisata as pw');
        $this->db->join('pemandu as p','p.id_pemandu=pw.id_pemandu');
        $this->db->where('pw.id_wisata=',$id_wisata);
        return $this->db->get()->result_array();
    }
}