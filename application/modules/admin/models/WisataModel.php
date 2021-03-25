<?php

class WisataModel extends CI_Model
{


    public function semuaWisata()
    {
        $query = $this->db->get('paket_wisata');
        return $query->result_array();
    }
    public function wisataById($id_wisata)
    {
        $query = $this->db->get_where('paket_wisata', ['id_wisata' => $id_wisata]);
        return $query->row_array();
    }
    public function tambahWisata()
    {
        try {
            $nama_wisata = $this->input->post('nama_wisata', true);
            $kategori_wisata = $this->input->post('kategori_wisata', true);
            $harga_wisata = $this->input->post('harga_wisata', true);
            $min_orang = $this->input->post('min_orang', true);
            $gambar_wisata = $this->input->post('gambar_wisata', true);
            $deskripsi = $this->input->post('deskripsi');
            $slug = url_title($nama_wisata, 'dash', TRUE) . '-' . time();

            $foto = $this->_uploadImage($slug);
            $data = [
                "nama_wisata" => $nama_wisata,
                "kategori_wisata" => $kategori_wisata,
                "harga_wisata" => $harga_wisata,
                "min_orang" => $min_orang,
                "gambar_wisata" => $gambar_wisata,
                "deskripsi" => $deskripsi,
                "gambar_wisata" => $foto,
                "slug" => $slug
            ];

            $this->db->insert('paket_wisata', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editWisata()
    {
        try {
            $id_wisata = $this->input->post('id_wisata');
            $nama_wisata = $this->input->post('nama_wisata', true);
            $kategori_wisata = $this->input->post('kategori_wisata', true);
            $harga_wisata = $this->input->post('harga_wisata', true);
            $min_orang = $this->input->post('min_orang', true);
            $gambar_wisata = $this->input->post('gambar_wisata', true);
            $deskripsi = $this->input->post('deskripsi');
            $slug = url_title($nama_wisata, 'dash', TRUE) . '-' . time();
            $old_image = $this->input->post('gambar_lama', true);

            if (!empty($_FILES["gambar_wisata"]["name"])) {
                $foto = $this->_uploadImage($slug);
                if ($old_image != "defaultwisata.png") {
                    $img_file = "./assets/frontend/img/wisata/" . $old_image;
                    unlink($img_file);
                }
            } else {
                $foto = $old_image;
            }
            $data = [
                "nama_wisata" => $nama_wisata,
                "kategori_wisata" => $kategori_wisata,
                "harga_wisata" => $harga_wisata,
                "min_orang" => $min_orang,
                "gambar_wisata" => $gambar_wisata,
                "deskripsi" => $deskripsi,
                "gambar_wisata" => $foto,
                "slug" => $slug
            ];

            $this->db->where('id_wisata', $id_wisata);
            $this->db->update('paket_wisata', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusWisata($id_wisata)
    {
        try {
            $this->db->delete('paket_wisata', ['id_wisata' => $id_wisata]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    private function _uploadImage($nama_wisata)
    {

        $config['upload_path']          = './assets/frontend/img/wisata/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $nama_wisata;
        $config['overwrite']            = true;
        // $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar_wisata')) {
            return $this->upload->data("file_name");
        }
        return "defaultwisata.png";
    }


    // ---------------------



    public function update_status_driver($id_driver, $status_driver)
    {
        $data = [
            "status" => $status_driver
        ];
        try {
            $this->db->where('id_rider', $id_driver);
            $this->db->update('rider', $data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
