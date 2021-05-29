<?php

class CalonModel extends CI_Model
{

    public function semuaCalon()
    {
        $this->db->select('c.*,pr.periode_jabatan,(SELECT nama from pemilih WHERE id_pemilih=c.id_ketua) as nama_ketua, (SELECT nama from pemilih WHERE id_pemilih=c.id_wakil) as nama_wakil');
        $this->db->from('calon as c');
        $this->db->join('periode as pr', 'pr.id_periode=c.id_periode');
        $this->db->where('pr.status', 'aktif');
        $this->db->order_by('c.no_urut', 'ASC');
        return $this->db->get()->result_array();
    }
    public function calonById($id_calon)
    {
        $query = $this->db->get_where('calon', ['id_calon' => $id_calon]);
        return $query->row_array();
    }

    public function voteCalon($id_calon)
    {
        $id_pemilih = $this->session->userdata('pemilih-iduser');
        $id_periode = $this->calonById($id_calon);
        $tgl_pilih = date('Y-m-d H:i:s');
        try {
            $data = [
                "id_pemilih" => $id_pemilih,
                "id_calon" => $id_calon,
                "id_periode" => $id_periode['id_periode'],
                "tgl_pilih" => $tgl_pilih,
            ];

            $this->db->insert('kotak_suara', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function cekVote($id_pemilih, $id_periode)
    {
            return $this->db->get_where('kotak_suara', ['id_pemilih' => $id_pemilih, 'id_periode' => $id_periode])->row_array();
    }
}
