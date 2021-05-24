<?php

class ParpolModel extends CI_Model
{


    public function semuaParpol()
    {
        $query = $this->db->get('parpol');
        return $query->result_array();
    }
    public function parpolById($id_parpol)
    {
        $query = $this->db->get_where('parpol', ['id_parpol' => $id_parpol]);
        return $query->row_array();
    }
    public function tambahParpol()
    {
        try {
            $nama_parpol = $this->input->post('nama_parpol', true);
            $singkatan = $this->input->post('singkatan', true);
            $slug = url_title($singkatan, 'dash', TRUE) . '-' . time();
            $logo = $this->_uploadImage($slug);
            $data = [
                "nama_parpol" => $nama_parpol,
                "singkatan" => $singkatan,
                "logo" => $logo,
            ];

            $this->db->insert('parpol', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editParpol()
    {
        try {
            $id_parpol = $this->input->post('id_parpol');
            $nama_parpol = $this->input->post('nama_parpol', true);
            $singkatan = $this->input->post('singkatan', true);
            $slug = url_title($singkatan, 'dash', TRUE) . '-' . time();
            $old_image = $this->input->post('logo_lama', true);

            if (!empty($_FILES["logo"]["name"])) {
                $logo = $this->_uploadImage($slug);
                if ($old_image != "defaultlogo.png") {
                    $img_file = "./assets/images/parpol/" . $old_image;
                    unlink($img_file);
                }
            } else {
                $logo = $old_image;
            }
            $data = [
                "nama_parpol" => $nama_parpol,
                "singkatan" => $singkatan,
                "logo" => $logo,
            ];

            $this->db->where('id_parpol', $id_parpol);
            $this->db->update('parpol', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusParpol($id_parpol)
    {
        try {
            $this->db->delete('parpol', ['id_parpol' => $id_parpol]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    private function _uploadImage($parpol)
    {

        $config['upload_path']          = './assets/images/parpol/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $parpol;
        $config['overwrite']            = true;
        // $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }
        return "defaultparpol.png";
    }
}
