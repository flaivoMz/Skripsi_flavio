<?php

class BayarModel extends CI_Model
{

    public function semuaPembayaran()
    {
        $this->db->select('b.*, p.kode_booking, p.nama_pemesan, u.username, w.nama_wisata');
        $this->db->from('bayar as b');
        $this->db->join('pesanan as p','p.id_pesanan=b.id_pesanan');
        $this->db->join('paket_wisata as w','w.id_wisata=p.id_wisata');
        $this->db->join('users as u','u.id_user=b.id_user');
        return $this->db->get()->result_array();
    }
    public function bayarById($id_bayar)
    {
        return $this->db->get_where('bayar', ['id_bayar' => $id_bayar])->row_array();
    }
    public function bayarByIdPesanan($id_pesanan)
    {
        return $this->db->get_where('bayar', ['id_pesanan' => $id_pesanan])->row_array();
    }

    public function tambahBayar()
    {
        try {
            $id_pesanan = $this->input->post('id_pesanan', true);
            $tgl_bayar = $this->input->post('tgl_bayar', true);
            $nominal_bayar = $this->input->post('nominal_bayar', true);
            $status_bayar = $this->input->post('status_bayar', true);
            $id_user = $this->input->post('id_user', true);

            $data = [
                "id_pesanan" => $id_pesanan,
                "tgl_bayar" => $tgl_bayar,
                "nominal_bayar" => $nominal_bayar,
                "status_bayar" => $status_bayar,
                "id_user" => $id_user,
            ];

            $this->db->insert('bayar', $data);

            $this->editStatusBayarPesanan($id_pesanan, $status_bayar);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editBayar()
    {
        try {
            $id_pesanan = $this->input->post('id_pesanan', true);
            $id_bayar = $this->input->post('id_bayar', true);
            $tgl_bayar = $this->input->post('tgl_bayar', true);
            $nominal_bayar = $this->input->post('nominal_bayar', true);
            $status_bayar = $this->input->post('status_bayar', true);
            $id_user = $this->input->post('id_user', true);

            $data = [
                "tgl_bayar" => $tgl_bayar,
                "nominal_bayar" => $nominal_bayar,
                "status_bayar" => $status_bayar,
                "id_user" => $id_user,
            ];

            $this->db->where('id_bayar', $id_bayar);
            $this->db->update('bayar', $data);

            $this->editStatusBayarPesanan($id_pesanan, $status_bayar);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function hapusBayar($id_bayar)
    {
        try {
            $dtBayar = $this->bayarById($id_bayar);

            if(count($dtBayar) > 0){
            
                $this->db->delete('bayar', ['id_bayar' => $id_bayar]);

                $dtBayarP = $this->bayarByIdPesanan($dtBayar['id_pesanan']);

                if(count($dtBayarP) > 0){
                    $status_bayar = $dtBayarP['status_bayar'];
                }else{
                    $status_bayar = NULL;
                }
                $this->editStatusBayarPesanan($dtBayar['id_pesanan'], $status_bayar);
                return true;
            }else{
                return false;
            }

            
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function editStatusBayarPesanan($id_pesanan, $status_bayar)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('pesanan', ['status_bayar' => $status_bayar]);
    }
}