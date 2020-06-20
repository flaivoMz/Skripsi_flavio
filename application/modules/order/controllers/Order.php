<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrderModel', 'mod');
    }

    public function index()
    {

        $id_customer            = $this->session->userdata('id_customer');
        $data['title']          = 'Order';
        $data['customer']       = $this->mod->m_get_data_customer($id_customer);
        $data['tmp_order']      = $this->mod->m_get_data_order_customer_tmp($id_customer);
        // $data['jobOpening'] = $this->home->getAllJobOpening();
        // print('<pre>');print_r($data);exit();
        $this->load->view('templates/frontend/depan/header',$data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('index', $data);
        $this->load->view('templates/frontend/depan/footer');
    }

    public function show_alamat_asal()
    {
        $data['title'] = 'Alamat Pengirim';
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('alamat_asal');
        $this->load->view('templates/frontend/depan/footer');
    }

    public function save_alamat_asal()
    {
        $koordinat = $this->input->post('latitude', true).",".$this->input->post('longitude', true);
        $post = [
            'alamat'        => $this->input->post('alamat', true),
            'koordinat'     => $koordinat,
            'kabupaten'     => $this->input->post('kabupaten',true)
        ];
        // print('<pre>');print_r($post);exit();
        $_SESSION['alamat_asal'] = $post;
        redirect('order');
    }

    public function show_alamat_penerima()
    {
        $data['title'] = 'Alamat Penerima';
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('alamat_penerima');
        $this->load->view('templates/frontend/depan/footer');
    }

    public function save_alamat_penerima()
    {
        $koordinat = $this->input->post('latitude', true).",".$this->input->post('longitude', true);
        $post = [
            'alamat'        => $this->input->post('alamat', true),
            'koordinat'     => $koordinat,
            'kabupaten'     => $this->input->post('kabupaten',true)
        ];
        // print('<pre>');print_r($post);exit();
        $_SESSION['alamat_penerima'] = $post;
        redirect('order');
    }

    /*---------- Order Barang ----------*/
    public function save_order_detail_customer_tmp()
    {
        $panjang        = $this->input->post('panjang', true);
        $lebar          = $this->input->post('lebar', true);
        $tinggi         = $this->input->post('tinggi', true);
        $berat_barang   = $this->input->post('berat_barang', true);
        $id_user        = $this->session->userdata('id_customer');
        $level_user     = $this->session->userdata('level');
        $tarif_barang   = $this->mod->m_get_tarif_barang($level_user);
        if(($berat_barang[0] == "overweight") && ($berat_barang[1] == "oversize")){
            echo "true 2 kondisi";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * ($tarif_barang['harga_overweight'] + $tarif_barang['harga_oversize']));
        }else if($berat_barang[0] == "overweight"){
            echo "true 1 overweight";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_overweight']);
        }else if($berat_barang[0] == "oversize"){
            echo "true 1 oversize";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_oversize']);
        }else{
            echo "normal";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_normal']);
        }
        print('<pre>');print_r($berat_barang);
        print('<pre>');print_r($tarif_barang);
        $post = [
            'id_order'      => $this->input->post('id_order_db', true),
            'id_customer'   => $id_user,
            'volume_barang' => $panjang."x".$lebar."x".$tinggi,
            'berat_barang'  => $berat,
            'status_berat'  => implode(",",$this->input->post('berat_barang', true)),
            'catatan'       => $this->input->post('catatan', true),
            'total'         => $total
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_save_order_detail_customer_tmp($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Barang Berhasil DItambahkan
            </div>');
        redirect('order');
    }

    public function show_order_detail_customer_tmp()
    {
        $id = $this->input->post('id', true);
        $data = $this->mod->m_show_order_detail_customer_tmp($id);
        echo json_encode($data);
    }

    public function update_order_detail_customer_tmp()
    {
        $panjang        = $this->input->post('panjang', true);
        $lebar          = $this->input->post('lebar', true);
        $tinggi         = $this->input->post('tinggi', true);
        $berat_barang   = $this->input->post('berat_barang', true);
        $id_user        = $this->session->userdata('id_customer');
        $level_user     = $this->session->userdata('level');
        $tarif_barang   = $this->mod->m_get_tarif_barang($level_user);
        if(($berat_barang[0] == "overweight") && ($berat_barang[1] == "oversize")){
            echo "true 2 kondisi";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * ($tarif_barang['harga_overweight'] + $tarif_barang['harga_oversize']));
        }else if($berat_barang[0] == "overweight"){
            echo "true 1 overweight";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_overweight']);
        }else if($berat_barang[0] == "oversize"){
            echo "true 1 oversize";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_oversize']);
        }else{
            echo "normal";
            $berat = round(($panjang*$lebar*$tinggi)/6000,1);
            $total = ceil($berat * $tarif_barang['harga_normal']);
        }
        print('<pre>');print_r($berat_barang);
        print('<pre>');print_r($tarif_barang);
        $post = [
            'id_barang'     => $this->input->post('id_barang', true),
            'id_order'      => $this->input->post('id_order_db', true),
            'id_customer'   => $id_user,
            'volume_barang' => $panjang."x".$lebar."x".$tinggi,
            'berat_barang'  => $berat,
            'status_berat'  => implode(",",$this->input->post('berat_barang', true)),
            'catatan'       => $this->input->post('catatan', true),
            'total'         => $total
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_update_order_detail_customer_tmp($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Barang Berhasil Diupdate
            </div>');
        redirect('order');
    }

    public function destroy_order_detail_customer_tmp()
    {
        $id = $this->input->post('id', true);
        $data = $this->mod->m_destroy_order_detail_customer_tmp($id);
        print_r($id);
    }
    

}