<?php

class OrdersModel extends CI_Model {

  
    public function getAllOrders()
    {
        $this->db->select('oc.*, r.nama_rider,c.nama,odc.volume_barang,odc.berat_barang,odc.catatan,od.gambar_pengambilan,od.gambar_pengantaran,od.berat_barang as kondisi_barang,odc.charge as denda');
        $this->db->from('order_customer AS oc');
        $this->db->join('customer AS c','c.id_customer=oc.id_customer');
        $this->db->join('order_detail_customer AS odc','odc.id_order=oc.id_order','left');
        $this->db->join('order_driver AS od','od.id_order=oc.id_order','left');
        $this->db->join('rider AS r','r.id_rider=oc.id_rider','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function jumlah_order()
    {
        $date=date('Y-m-d');
        $this->db->select('COUNT(id_order) AS total');
        $this->db->from('order_customer');
        $this->db->where('DATE(tanggal_order)', $date);
        $query = $this->db->get();
        return $query->row();
    }
    public function getAllAvailableKurir()
    {
        $this->db->select('r.id_rider,r.nama_rider,oc.id_order,oc.status_order');
        $this->db->from('rider AS r');
        $this->db->join('order_customer AS oc','oc.id_rider=r.id_rider','left');
        $this->db->where('oc.id_order IS NULL');
        $this->db->or_where('oc.status_order','selesai');
        $this->db->group_by('r.id_rider');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function update_lunas_bayar($id)
    {
        $data = [
            "status_pembayaran"=>"lunas"
        ];

        try{
            $this->db->where('id_order', $id);
            $this->db->update('order_customer', $data);
            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function update_kurir()
    {
        $id_order = $this->input->post('id_order', true);

        $data = [
            "id_rider" => $this->input->post('id_rider',true),
            "verifikasi_driver" => "sudah"
        ];
        try{
            $this->db->where('id_order', $id_order);
            $this->db->update('order_customer', $data);
            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}