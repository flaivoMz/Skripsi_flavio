<?php

class CalonModel extends CI_Model
{

    public function semuaCalon()
    {
        $this->db->select('c.*,pr.periode_jabatan,(SELECT nama from pemilih WHERE id_pemilih=c.id_ketua) as nama_ketua, (SELECT nama from pemilih WHERE id_pemilih=c.id_wakil) as nama_wakil');
        $this->db->from('calon as c');
        $this->db->join('periode as pr','pr.id_periode=c.id_periode');
        $this->db->where('pr.status','aktif');
        $this->db->order_by('c.no_urut','ASC');
        return $this->db->get()->result_array();
    }
    // backend
    public function calonPeriodeAktif()
    {
        $this->db->select('c.*');
        $this->db->from('calon as c');
        $this->db->join('periode as p','p.id_periode=c.id_periode');
        $this->db->where('p.status','aktif');
        $this->db->order_by('c.id_calon','RANDOM');

        return $this->db->get()->result_array();
    }
    public function updateNoUrut($id_calon, $no_urut){
        $this->db->where('id_calon', $id_calon);
        $this->db->update('calon', ['no_urut' => $no_urut]);
    }

    public function calonById($id_calon)
    {
        $query = $this->db->get_where('calon', ['id_calon' => $id_calon]);
        return $query->row_array();
    }

    public function tambahCalon()
    {
        try {
            $id_ketua = $this->input->post('id_ketua', true);
            $id_wakil = $this->input->post('id_wakil', true);
            $kategori = $this->input->post('kategori', true);
            $id_periode = $this->input->post('id_periode', true);
            $visi_misi = $this->input->post('visi_misi', true);
            $id_kpu = $this->session->userdata('admin-iduser');

            if($kategori == "parpol"){
                $parpol = $this->input->post('parpol');
                $id_parpol = "";
                foreach($parpol as $p){
                    $id_parpol .= $p.',';
                }
            }else{
                $id_parpol = NULL;
            }

            $photo = $this->_uploadImage(time());
            $data = [
                "id_ketua" => $id_ketua,
                "id_wakil" => $id_wakil,
                "photo" => $photo,
                "visi_misi" => $visi_misi,
                "kategori" => $kategori,
                "id_periode" => $id_periode,
                "id_parpol" => $id_parpol,
                "id_kpu" => $id_kpu,
            ];

            $this->db->insert('calon', $data);
            return true;
        } catch (\SQLEXception $e) {
            return false;
        }
    }
    public function editCalon()
    {
        try {
            $id_calon = $this->input->post('id_calon', true);
            $id_ketua = $this->input->post('id_ketua', true);
            $id_wakil = $this->input->post('id_wakil', true);
            $kategori = $this->input->post('kategori', true);
            $id_periode = $this->input->post('id_periode', true);
            $visi_misi = $this->input->post('visi_misi', true);
            $photo_lama = $this->input->post('photo_lama', true);
            $id_kpu = $this->session->userdata('admin-iduser');

            if($kategori == "parpol"){
                $parpol = $this->input->post('parpol');
                $id_parpol = "";
                foreach($parpol as $p){
                    $id_parpol .= $p.',';
                }
            }else{
                $id_parpol = NULL;
            }

            if (!empty($_FILES["photo"]["name"])) {
                $photo = $this->_uploadImage(time());
                if ($photo_lama != "defaultcalon.png") {
                    $img_file = "./assets/images/calon/" . $photo_lama;
                    unlink($img_file);
                }
            } else {
                $photo = $photo_lama;
            }
            $data = [
                "id_ketua" => $id_ketua,
                "id_wakil" => $id_wakil,
                "photo" => $photo,
                "visi_misi" => $visi_misi,
                "kategori" => $kategori,
                "id_periode" => $id_periode,
                "id_parpol" => $id_parpol,
                "id_kpu" => $id_kpu,
            ];

            $this->db->where('id_calon', $id_calon);
            $this->db->update('calon', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusCalon($id_calon)
    {
        try {
            $this->db->delete('calon', ['id_calon' => $id_calon]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    private function _uploadImage($filename)
    {

        $config['upload_path']          = './assets/images/calon/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $filename;
        $config['overwrite']            = true;
        // $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        return "defaultcalon.png";
    }
}