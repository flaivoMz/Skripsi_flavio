<?php

class OrderModel extends CI_Model {

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

    public function m_count_subtotal($id_customer)
    {
        $this->db->select_sum('total')
                ->where('id_customer', $id_customer);
        $query = $this->db->get('order_detail_customer_tmp')->row_array();
        return $query;
    }

    public function m_count_charge($id_order)
    {
        $this->db->select_sum('charge')
                ->where('id_order', $id_order);
        $query = $this->db->get('order_detail_customer')->row_array();
        return $query;
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

    public function m_get_data_ongkir($level)
    {
        $this->db->select()
            ->from('tarif_ongkir')
            ->where("kategori_harga", $level);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_get_referal($referal_code)
    {
        $this->db->select()
            ->from('customer')
            ->where("referal_code", $referal_code);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_save_to_order($post)
    {
        $this->db->insert('order_customer', $post);
        return true;
    }

    public function m_save_to_order_detail_customer($post_detail)
    {
        $this->db->insert_batch('order_detail_customer', $post_detail);
		return true;
    }

    public function m_destroy_all_order_detail_customer_tmp($id_customer)
    {
        $this->db->select()
            ->from('order_detail_customer_tmp')
            ->where("id_customer", $id_customer);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_get_list_order_customer($id_order)
    {
        $this->db->select()
            ->from('order_detail_customer')
            ->where("id_order", $id_order);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    /*--------- Riwayat Order ---------*/
    public function m_get_order_customer($id_customer)
    {
        $this->db->select()
            ->from('order_customer')
            ->where("id_customer", $id_customer);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_detail_order_customer($id_order)
    {
        $this->db->select()
            ->from('order_customer')
            ->where("id_order", $id_order);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }
}