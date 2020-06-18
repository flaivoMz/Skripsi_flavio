<?php

class OrderModel extends CI_Model {

    // public function getAllKategoriPekerjaan()
    // {
    //     $query = $this->db->get('kategori_pekerjaan');

    //     return $query->result();
    // }
    // public function getAllPerusahaan()
    // {
    //     $this->db->select('p.*,kp.nama_kategori_per');
    //     $this->db->from('perusahaan as p');
    //     $this->db->join('kategori_perusahaan as kp', 'kp.id_kategori_per = p.id_kategori_perusahaan');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // public function getAllJobOpening()
    // {
    //     $now = date('Y-m-d');
    //     $this->db->select('l.*,p.nama_perusahaan,p.logo_perusahaan');
    //     $this->db->from('lowongan as l');
    //     $this->db->join('perusahaan as p', 'p.id_perusahaan = l.id_perusahaan');
    //     $this->db->where('l.date_end >= ', $now);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function m_save_daftar($post)
    {
        $this->db->insert('customer', $post);
        return true;
    }

    public function m_get_data_customer($id_customer)
    {
        $this->db->select()
                ->from('customer')
                ->where('customer.id_customer', $id_customer);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_save_order_detail_customer_tmp($post)
    {
        $this->db->insert('order_detail_customer_tmp', $post);
        return true;
    }
    
    /*--------- Orders ----------*/
    public function m_get_tarif_barang($level_user)
    {
        $this->db->select()
            ->from('tarif_barang')
            ->where("kategori", $level_user);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_get_data_order_customer_tmp($id_customer)
    {
        $this->db->select()
            ->from('order_detail_customer_tmp')
            ->where("id_customer", $id_customer);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_show_order_detail_customer_tmp($id)
    {
        $this->db->select()
            ->from('order_detail_customer_tmp')
            ->where("id_barang", $id);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_destroy_order_detail_customer_tmp($id)
    {
        $this->db->select()
            ->from('order_detail_customer_tmp')
            ->where("id_barang", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_update_order_detail_customer_tmp($post)
    {
        $this->db->select()
            ->from('order_detail_customer_tmp')
            ->where("id_barang" , $post['id_barang']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

}