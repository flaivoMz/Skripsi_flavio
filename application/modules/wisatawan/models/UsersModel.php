<?php

class UsersModel extends CI_Model
{
    public function userByUsername($username)
    {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }
    public function userById($iduser)
    {
        return $this->db->get_where('wisatawan', ['id_user' => $iduser])->row_array();
    }
}
