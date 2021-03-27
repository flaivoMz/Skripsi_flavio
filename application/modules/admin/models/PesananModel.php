<?php

class PesananModel extends CI_Model
{


    public function semuaPesanan()
    {
        $this->db->select('p.*, pw.*,ws.nama_wisatawan,ws.no_hp_wisatawan,
        (SELECT nominal_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS nominal_terbayar,
        (SELECT tgl_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS tgl_bayar,
        (SELECT status_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS status_terbayar');
        $this->db->from('pesanan as p');
        $this->db->join('paket_wisata as pw', 'pw.id_wisata=p.id_wisata');
        $this->db->join('wisatawan as ws', 'ws.id_wisatawan=p.id_wisatawan');
        $this->db->order_by('p.id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }
    public function pesananById($id_pesanan)
    {
        try {
            return $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        } catch (\SQLEXception $e) {
            return $e->getMessage();
        }
    }

    public function settingPemandu()
    {
        try {
            $id_pesanan = $this->input->post('id_pesanan');
            $id_user = $this->session->userdata('admin-iduser');

            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->delete('pemandu_wisata');
            $i = 0;
            foreach ($this->input->post('pemandu') as $p) {
                $data[$i] = [
                    'id_pesanan' => $id_pesanan,
                    'id_pemandu' => $p,
                    'id_user' => $id_user
                ];
                $i++;
            }

            $this->db->insert_batch('pemandu_wisata', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function batalPesanan($id_pesanan)
    {
        try {
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->update('pesanan', ['status_pesan' => 'batal']);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
}
