<?php

class UsersModel extends CI_Model
{

    public function usersByUsername($username)
    {
        return $this->db->get_where('kpu', ['username' => $username])->row_array();
    }
    public function usersById($id_kpu)
    {
        return $this->db->get_where('kpu', ['id_kpu' => $id_kpu])->row_array();
    }

    public function semuaUsers()
    {
        return $this->db->get('kpu')->result_array();
    }

    public function tambahAdmin()
    {
        try {
            $data = [
                "nama_lengkap" => $this->input->post('nama_lengkap', true),
                "username" => $this->input->post('username', true),
                "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                "is_active" => $this->input->post('status', true)
            ];

            $this->db->insert('kpu', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function editAdmin()
    {
        try {
            $id_kpu = $this->input->post('id_kpu', true);
            $nama_lengkap = $this->input->post('nama_lengkap');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $status = $this->input->post('status', true);

            if (empty($password)) {
                $data = [
                    "nama_lengkap" => $nama_lengkap,
                    "username" => $username,
                    "is_active" => $status
                ];
            } else {
                $data = [
                    "nama_lengkap" => $nama_lengkap,
                    "username" => $username,
                    "password" => password_hash($password, PASSWORD_DEFAULT),
                    "is_active" => $status
                ];
            }

            $this->db->where('id_kpu', $id_kpu);
            $this->db->update('kpu', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function hapusUser($id_kpu)
    {
        try {
            $this->db->delete('kpu', ['id_kpu' => $id_kpu]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    // ------------------------

}
