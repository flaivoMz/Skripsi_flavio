<?php

class SuaraModel extends CI_Model
{
      public function semuaSuara()
      {
            $this->db->select('ks.*, p.nama as nama_pemilih, p.nik, c.*, pr.*');
            $this->db->from('kotak_suara as ks');
            $this->db->join('pemilih as p', 'p.id_pemilih=ks.id_pemilih');
            $this->db->join('calon as c', 'c.id_calon=ks.id_calon');
            $this->db->join('periode as pr', 'pr.id_periode=ks.id_periode');
            $this->db->order_by('ks.tgl_pilih', 'DESC');
            return $this->db->get()->result_array();
      }
      public function jumlahSuara($id_periode)
      {
            $this->db->select('ks.id_calon,(SELECT nama FROM pemilih WHERE id_pemilih=c.id_ketua) AS nama_ketua,
        (SELECT nama FROM pemilih WHERE id_pemilih=c.id_wakil) AS nama_wakil,
        COUNT(*) AS jml_suara');
            $this->db->from('kotak_suara AS ks');
            $this->db->join('periode AS pr', 'pr.id_periode=ks.id_periode');
            $this->db->join('calon AS c', 'c.id_calon=ks.id_calon');
            $this->db->where('pr.status', 'aktif');
            $this->db->where('pr.id_periode', $id_periode);
            $this->db->group_by('ks.id_calon');
            $jml_memilih = $this->db->get()->result_array();

            $jml_tidak_memilih = $this->tidakMemilih($id_periode);
            $data = array_push($jml_memilih, $jml_tidak_memilih);
            return $jml_memilih;
      }
      public function tidakMemilih($id_periode)
      {
            $this->db->select('((SELECT COUNT(*) FROM pemilih) - (SELECT COUNT(*) FROM kotak_suara WHERE id_periode=' . $id_periode . ')) AS jml_suara');
            return $this->db->get()->row_array();
      }
}
