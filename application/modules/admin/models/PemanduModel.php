<?php

class PemanduModel extends CI_Model
{

    public function semuaPemandu()
    {
        $query = $this->db->get('pemandu');
        return $query->result_array();
    }
    public function pemanduById($id_pemandu)
    {
        $query = $this->db->get_where('pemandu', ['id_pemandu' => $id_pemandu]);
        return $query->row_array();
    }

    public function tambahPemandu()
    {
        try {
            $nama_pemandu = $this->input->post('nama_pemandu', true);
            $alamat_pemandu = $this->input->post('alamat_pemandu', true);
            $jekel_pemandu = $this->input->post('jekel_pemandu', true);
            $no_hp_pemandu = $this->input->post('no_hp_pemandu', true);
            $slug = url_title($nama_pemandu, 'dash', TRUE) . '-' . time();

            $photo = $this->_uploadImage($slug);
            $data = [
                "nama_pemandu" => $nama_pemandu,
                "alamat_pemandu" => $alamat_pemandu,
                "jekel_pemandu" => $jekel_pemandu,
                "no_hp_pemandu" => $no_hp_pemandu,
                "photo" => $photo,
            ];

            $this->db->insert('pemandu', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editPemandu()
    {
        try {
            $id_pemandu = $this->input->post('id_pemandu');
            $nama_pemandu = $this->input->post('nama_pemandu', true);
            $alamat_pemandu = $this->input->post('alamat_pemandu', true);
            $jekel_pemandu = $this->input->post('jekel_pemandu', true);
            $no_hp_pemandu = $this->input->post('no_hp_pemandu', true);
            $slug = url_title($nama_pemandu, 'dash', TRUE) . '-' . time();
            $old_image = $this->input->post('foto_lama', true);

            if (!empty($_FILES["photo"]["name"])) {
                $photo = $this->_uploadImage($slug);
                if ($old_image != "profile.png") {
                    $img_file = "./assets/frontend/img/pemandu/" . $old_image;
                    unlink($img_file);
                }
            } else {
                $photo = $old_image;
            }
            $data = [
                "nama_pemandu" => $nama_pemandu,
                "alamat_pemandu" => $alamat_pemandu,
                "jekel_pemandu" => $jekel_pemandu,
                "no_hp_pemandu" => $no_hp_pemandu,
                "photo" => $photo,
            ];

            $this->db->where('id_pemandu', $id_pemandu);
            $this->db->update('pemandu', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusPemandu($id_pemandu)
    {
        try {
            $this->db->delete('pemandu', ['id_pemandu' => $id_pemandu]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    private function _uploadImage($nama_pemandu)
    {

        $config['upload_path']          = './assets/frontend/img/pemandu/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $nama_pemandu;
        $config['overwrite']            = true;
        // $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        return "profile.png";
    }
}