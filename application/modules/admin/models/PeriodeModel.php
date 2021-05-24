<?php

class PeriodeModel extends CI_Model
{


    public function semuaPeriode()
    {
        $query = $this->db->get('periode');
        return $query->result_array();
    }
    public function periodeAktif()
    {
        $query = $this->db->get_where('periode', ['status' => 'aktif']);
        return $query->row_array();
    }
    public function periodeById($id_periode)
    {
        $query = $this->db->get_where('periode', ['id_periode' => $id_periode]);
        return $query->row_array();
    }
    public function tambahPeriode()
    {
        try {
            $periode_jabatan = $this->input->post('periode_jabatan', true);
            $mulai_pilih = $this->input->post('mulai_pilih', true);
            $batas_pilih = $this->input->post('batas_pilih', true);
            $status = $this->input->post('status', true);
            $data = [
                "periode_jabatan" => $periode_jabatan,
                "mulai_pilih" => $mulai_pilih,
                "batas_pilih" => $batas_pilih,
                "status" => $status,
            ];

            $this->db->insert('periode', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editPeriode()
    {
        try {
            $id_periode = $this->input->post('id_periode');
            $periode_jabatan = $this->input->post('periode_jabatan', true);
            $mulai_pilih = $this->input->post('mulai_pilih', true);
            $batas_pilih = $this->input->post('batas_pilih', true);
            $status = $this->input->post('status', true);
            
            $data = [
                "periode_jabatan" => $periode_jabatan,
                "mulai_pilih" => $mulai_pilih,
                "batas_pilih" => $batas_pilih,
                "status" => $status,
            ];

            $this->db->where('id_periode', $id_periode);
            $this->db->update('periode', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusPeriode($id_periode)
    {
        try {
            $this->db->delete('periode', ['id_periode' => $id_periode]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
}
