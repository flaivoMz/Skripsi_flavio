<?php

class PemilihModel extends CI_Model
{
    public function loginPemilih($nik,$tgl_lahir)
    {
        return $this->db->get_where('pemilih', ['nik' => $nik, 'tgl_lahir' => $tgl_lahir])->row_array();
    }
}
