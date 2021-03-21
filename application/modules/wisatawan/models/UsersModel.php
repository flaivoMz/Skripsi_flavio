<?php

class UsersModel extends CI_Model
{
    public function userByUsername($username)
    {
        return $this->db->get_where('users', ['username' => $username, 'role' => 'wisatawan'])->row_array();
    }

    public function wisatawanByIdUser($iduser)
    {
        return $this->db->get_where('wisatawan', ['id_user' => $iduser])->row_array();
    }
    public function userById($id_user)
    {
        return $this->db->get_where('users', ['id_user' => $id_user])->row_array();
    }
    public function editPassword()
    {
        try {
            $id_user = $this->session->userdata('cust-iduser');
            $password = $this->input->post('new_password');

            $data = [
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ];

            $this->db->where('id_user', $id_user);
            $this->db->update('users', $data);

            return true;
        } catch (\SQLException $e) {

            echo $e->getMessage();
        }
    }

    public function editProfil()
    {
        try {
            $id_user = $this->session->userdata('cust-iduser');
            $data = [
                "nama_wisatawan" => $this->input->post('nama_wisatawan'),
                "alamat_wisatawan" => $this->input->post('alamat_wisatawan'),
                "jekel_wisatawan" => $this->input->post('jekel_wisatawan'),
                "no_hp_wisatawan" => $this->input->post('no_hp_wisatawan'),
            ];

            $this->db->where('id_user', $id_user);
            $this->db->update('wisatawan', $data);

            return true;
        } catch (\SQLException $e) {

            echo $e->getMessage();
        }
    }

    public function daftarAkun()
    {
        try {
            $data = [
                "username" => $this->input->post('username', true),
                "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                "role" => "wisatawan",
                "is_active" => 1
            ];

            $this->db->insert('users', $data);
            return $this->db->insert_id();
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function daftarWisatawan($id_user)
    {
        try {
            $data = [
                "id_user" => $id_user,
                "nama_wisatawan" => $this->input->post('nama_wisatawan', true),
                "alamat_wisatawan" => $this->input->post('alamat_wisatawan', true),
                "jekel_wisatawan" => $this->input->post('jekel_wisatawan', true),
                "no_hp_wisatawan" => $this->input->post('no_hp_wisatawan', true)
            ];

            $this->db->insert('wisatawan', $data);
            return $this->db->insert_id();
        } catch (\SQLException $e) {
            return false;
        }
    }
}
