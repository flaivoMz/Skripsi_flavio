<?php

class SuaraModel extends CI_Model
{

    public function semuaSuara()
    {
        $this->db->select('ks.*, p.nama as nama_pemilih, p.nik, c.*, pr.*');
        $this->db->from('kotak_suara as ks');
        $this->db->join('pemilih as p','p.id_pemilih=ks.id_pemilih');
        $this->db->join('calon as c', 'c.id_calon=ks.id_calon');
        $this->db->join('periode as pr', 'pr.id_periode=ks.id_periode');
        $this->db->order_by('ks.tgl_pilih','DESC');
        return $this->db->get()->result_array();
    }
}