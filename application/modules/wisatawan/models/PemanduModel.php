<?php

class PemanduModel extends CI_Model
{
    public function pemanduByIdPesanan($id_pesanan)
    {
        $this->db->select('p.*,pw.id_pesanan');
        $this->db->from('pemandu as p');
        $this->db->join('pemandu_wisata as pw','pw.id_pemandu=p.id_pemandu');
        $this->db->where('pw.id_pesanan',$id_pesanan);

        return $this->db->get()->result_array();
    }
}