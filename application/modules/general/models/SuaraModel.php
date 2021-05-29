<?php

class SuaraModel extends CI_Model
{

    public function jumlahSuara()
    {
        $this->db->select('ks.id_calon,(SELECT nama FROM pemilih WHERE id_pemilih=c.id_ketua) AS nama_ketua,
        (SELECT nama FROM pemilih WHERE id_pemilih=c.id_wakil) AS nama_wakil,
        COUNT(*) AS jml_suara');
        $this->db->from('kotak_suara AS ks');
        $this->db->join('periode AS pr','pr.id_periode=ks.id_periode');
        $this->db->join('calon AS c', 'c.id_calon=ks.id_calon');
        $this->db->where('pr.status','aktif');
        $this->db->group_by('ks.id_calon');
        $jml_memilih = $this->db->get()->result_array();

        $jml_tidak_memilih = $this->tidakMemilih();
        $data = array_push($jml_memilih, $jml_tidak_memilih);
        return $jml_memilih;
    }
    public function tidakMemilih()
    {
        $periode = $this->periodeAktif();
        $this->db->select('((SELECT COUNT(*) FROM pemilih) - (SELECT COUNT(*) FROM kotak_suara WHERE id_periode='.$periode['id_periode'].')) AS jml_suara');
        return $this->db->get()->row_array();
    }
    public function periodeAktif()
    {
        $query = $this->db->get_where('periode', ['status' => 'aktif']);
        return $query->row_array();
    }
}