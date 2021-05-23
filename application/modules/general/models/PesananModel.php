<?php

class PesananModel extends CI_Model
{
    public function pesananByUser($id_wisatawan)
    {
        $this->db->select('p.*, pw.*,
        (SELECT nominal_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS nominal_terbayar,
        (SELECT tgl_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS tgl_bayar,
        (SELECT status_bayar FROM bayar WHERE id_pesanan=p.id_pesanan ORDER BY id_bayar DESC LIMIT 1) AS status_terbayar');
        $this->db->from('pesanan as p');
        $this->db->join('paket_wisata as pw', 'pw.id_wisata=p.id_wisata');
        $this->db->where('p.id_wisatawan', $id_wisatawan);
        $this->db->order_by('p.id_pesanan', 'desc');
        return $this->db->get()->result_array();
    }

    public function semuaPesanan()
    {
        return $this->db->get('pesanan')->result_array();
    }

    public function pesanWisata()
    {
        try {
            $data = [
                "kode_booking" => time(),
                "id_wisata" => $this->input->post('id_wisata'),
                "id_wisatawan" => $this->session->userdata('cust-idwisatawan'),
                "tgl_pesanan" => date('Y-m-d H:i:s'),
                "tgl_wisata" => $this->input->post('tgl_wisata'),
                "nama_pemesan" => $this->input->post('nama_pemesan'),
                "no_hp_pemesan" => $this->input->post('no_hp_pemesan'),
                "jml_dewasa" => $this->input->post('jml_dewasa'),
                "jml_balita" => $this->input->post('jml_balita'),
                "total_bayar" => $this->input->post('total_bayar'),
                "status_pesan" => "booking"
            ];
            $this->db->insert('pesanan', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function pesananByKodeBooking($kode_booking)
    {
        return $this->db->get_where('pesanan',['kode_booking' => $kode_booking])->row_array();
    }

    public function batalPesanan($kode_booking)
    {
        try{
            $this->db->where('kode_booking', $kode_booking);
            $this->db->update('pesanan', ['status_pesan' => 'batalw']);
            return true;
        }catch(\SQLException $e){
            return false;
        }
    }
    public function expiredPesanan($id_pesanan)
    {
        try {
            $this->db->where('id_pesanan', $id_pesanan);
            $this->db->update('pesanan', ['status_pesan' => 'expired']);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
}
