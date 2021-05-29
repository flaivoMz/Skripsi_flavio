<?php

class ParpolModel extends CI_Model
{

    public function parpolById($id_parpol)
    {
        $query = $this->db->get_where('parpol', ['id_parpol' => $id_parpol]);
        return $query->row_array();
    }
}
