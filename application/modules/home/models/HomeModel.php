<?php

class HomeModel extends CI_Model {

    public function getAllKategoriPekerjaan()
    {
        $query = $this->db->get('kategori_pekerjaan');

        return $query->result();
    }
    public function getAllPerusahaan()
    {
        $this->db->select('p.*,kp.nama_kategori_per');
        $this->db->from('perusahaan as p');
        $this->db->join('kategori_perusahaan as kp', 'kp.id_kategori_per = p.id_kategori_perusahaan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllJobOpening()
    {
        $now = date('Y-m-d');
        $this->db->select('l.*,p.nama_perusahaan,p.logo_perusahaan');
        $this->db->from('lowongan as l');
        $this->db->join('perusahaan as p', 'p.id_perusahaan = l.id_perusahaan');
        $this->db->where('l.date_end >= ', $now);
        $query = $this->db->get();
        return $query->result();
    }
    
}