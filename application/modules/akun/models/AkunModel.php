<?php

class AkunModel extends CI_Model {

    public function m_show_details_account($id_customer)
    {
        $this->db->select()
            ->from('customer')
            ->where("id_customer", $id_customer);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_show_details_account_driver($id_driver)
    {
        $this->db->select()
            ->from('rider')
            ->where("id_rider", $id_driver);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }
    
}