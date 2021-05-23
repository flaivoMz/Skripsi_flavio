<?php

class PemilihModel extends CI_Model
{

    public function semuaPemilih()
    {
        $query = $this->db->get('pemilih');
        return $query->result_array();
    }
    public function pemilihById($id_pemilih)
    {
        $query = $this->db->get_where('pemilih', ['id_pemilih' => $id_pemilih]);
        return $query->row_array();
    }
    public function pemilihByNik($nik)
    {
        $query = $this->db->get_where('pemilih', ['nik' => $nik]);
        return $query->row_array();
    }

    public function tambahPemilih()
    {
        try {
            $nik = $this->input->post('nik', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $jekel = $this->input->post('jekel', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $agama = $this->input->post('agama', true);

            $data = [
                "nik" => $nik,
                "nama" => $nama,
                "alamat" => $alamat,
                "jekel" => $jekel,
                "tempat_lahir" => $tempat_lahir,
                "tgl_lahir" => $tgl_lahir,
                "agama" => $agama,
            ];

            $this->db->insert('pemilih', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editPemilih()
    {
        try {
            $id_pemilih = $this->input->post('id_pemilih', true);
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $jekel = $this->input->post('jekel', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $agama = $this->input->post('agama', true);

            $data = [
                "nama" => $nama,
                "alamat" => $alamat,
                "jekel" => $jekel,
                "tempat_lahir" => $tempat_lahir,
                "tgl_lahir" => $tgl_lahir,
                "agama" => $agama,
            ];

            $this->db->where('id_pemilih', $id_pemilih);
            $this->db->update('pemilih', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusPemilih($id_pemilih)
    {
        try {
            $this->db->delete('pemilih', ['id_pemilih' => $id_pemilih]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
}