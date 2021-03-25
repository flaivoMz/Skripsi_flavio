<?php

class UsersModel extends CI_Model
{

    public function usersByUsername($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }
    public function usersById($id_user)
    {
        return $this->db->get_where('users', ['id_user' => $id_user])->row_array();
    }

    public function semuaUsers()
    {
        return $this->db->get('users')->result_array();
    }

    public function tambahAdmin()
    {
        try {
            $data = [
                "username" => $this->input->post('username', true),
                "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                "role" => "admin",
                "is_active" => $this->input->post('status', true)
            ];

            $this->db->insert('users', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function editAdmin()
    {
        try {
            $id_user = $this->input->post('id_user', true);
            $password = $this->input->post('password');
            $status = $this->input->post('status', true);

            if (empty($password)) {
                $data = [
                    "is_active" => $status
                ];
            } else {
                $data = [
                    "password" => password_hash($password, PASSWORD_DEFAULT),
                    "is_active" => $status
                ];
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('users', $data);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function hapusUser($id_user)
    {
        try {
            $this->db->delete('users', ['id_user' => $id_user]);
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    // ------------------------

}
