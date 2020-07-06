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
        $this->db->order_by('oc.tanggal_order','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getAllAvailableKurir()
    {
        $this->db->select('r.id_rider,r.nama_rider,oc.id_order,oc.status_order');
        $this->db->from('rider AS r');
        $this->db->join('order_customer AS oc','oc.id_rider=r.id_rider','left');
        // $this->db->where('oc.id_order IS NULL');
        // $this->db->or_where('oc.status_order','selesai');
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
    public function paid_billing()
    {
        $id_order = $this->input->post('id_order');
        $total_bayar = $this->input->post('total_bayar');
        $paid = $this->input->post('paid');
        $dibayar = $this->input->post('dibayar');

        if($paid == $total_bayar){
            $data = [
                "paid"=>$paid,
                "status_pembayaran"=>"lunas"
            ];
        }else if(($dibayar + $paid) >= $total_bayar){
            $data = [
                "paid"=>$total_bayar,
                "status_pembayaran"=>"lunas"
            ];
            
        }else{
            $data = [
                "paid"=>$paid
            ];
        }

        try{
            $this->db->where('id_order', $id_order);
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
            "id_rider" => $this->input->post('id_rider',true)
            // "verifikasi_driver" => "sudah"
        ];
        try{
            $this->db->where('id_order', $id_order);
            $this->db->update('order_customer', $data);
            return true;
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function countJarak($data = null)
    {
        if($data != null){
            $this->db->where('tanggal_order >= ', $data['date_start']);
            $this->db->where('tanggal_order <= ', $data['date_end']);
        }
        $this->db->select_sum('jarak');
        return $this->db->get('order_customer')->row();
    
    }
    public function countOrders($data = null)
    {
        if($data != null){
            $this->db->where('tanggal_order >= ', $data['date_start']);
            $this->db->where('tanggal_order <= ', $data['date_end']);
        }
        return $this->db->count_all_results('order_customer');
    }
    public function order_hari_ini($data = null)
    {
        // if($data != null){
        //     $this->db->where('tanggal_order >= ', $data['date_start']);
        //     $this->db->where('tanggal_order <= ', $data['date_end']);
        // }else{
            $date=date('Y-m-d');
            $this->db->where('DATE(tanggal_order)', $date);
        // }
        return $this->db->count_all_results('order_customer');
        
    }
    public function countCustomer($data = null)
    {
        if($data != null){
            $this->db->where('tanggal_order >= ', $data['date_start']);
            $this->db->where('tanggal_order <= ', $data['date_end']);
        }
        $this->db->select('COUNT(DISTINCT id_customer) AS total_customer');
        $this->db->from('order_customer');
        return $this->db->get()->row();
    }
}