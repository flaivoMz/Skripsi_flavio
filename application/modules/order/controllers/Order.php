<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OrderModel', 'mod');
        if(($this->session->userdata('id_customer')=="")||($this->session->userdata('id_rider')=="")){
            $_SESSION['msg'] = "login_dulu";
            redirect('/');
        }
    }

    public function index()
    {

        $id_customer            = $this->session->userdata('id_customer');
        $data['title']          = 'Order';
        $data['customer']       = $this->mod->m_get_data_customer($id_customer);
        $data['tmp_order']      = $this->mod->m_get_data_order_customer_tmp($id_customer);
        $data['sub_total']      = $this->mod->m_count_subtotal($id_customer);
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
        $berat = round(($panjang*$lebar*$tinggi)/6000,1);
        if(($berat_barang[0] == "overweight") && ($berat_barang[1] == "oversize")){
            echo "true 2 kondisi";
            $total = ceil($berat * ($tarif_barang['harga_overweight'] + $tarif_barang['harga_oversize']));
        }else if($berat_barang[0] == "overweight"){
            echo "true 1 overweight";
            $total = ceil($berat * $tarif_barang['harga_overweight']);
        }else if($berat_barang[0] == "oversize"){
            echo "true 1 oversize";
            $total = ceil($berat * $tarif_barang['harga_oversize']);
        }else{
            echo "normal";
            $total = ceil($berat * $tarif_barang['harga_normal']);
        }
        print('<pre>');print_r($berat_barang);
        print('<pre>');print_r($tarif_barang);
        $post = [
            'id_order'      => $this->input->post('id_order_db', true),
            'id_customer'   => $id_user,
            'volume_barang' => $panjang."x".$lebar."x".$tinggi,
            'berat_barang'  => $berat,
            'status_berat'  => $this->input->post('berat_barang', true),
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
            'status_berat'  => $this->input->post('berat_barang', true),
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

    public function count_ongkir()
    {
        $jarak = str_replace(' km', '', round($this->input->post('jarak',true)));
        $level = $this->session->userdata('level');
        $harga_ongkir = $this->mod->m_get_data_ongkir($level);
        if($harga_ongkir['status_jarak_minimal'] == "aktif"){
            if($jarak <= $harga_ongkir['jarak_minimal']){
                $total_ongkir = $jarak * $harga_ongkir['harga_jarak_minimal'];
            }else{
                $lebih_ongkir = $jarak - $harga_ongkir['jarak_minimal'];
                $total_ongkir = $harga_ongkir['harga_jarak_minimal'] + ($lebih_ongkir * $harga_ongkir['harga']);
            }
        }else{
            $total_ongkir = $jarak * $harga_ongkir['harga'];
        }
        print_r($total_ongkir);
    }

    public function save_to_order()
    {
        $id_customer    = $this->session->userdata('id_customer');
        $referal_code   = $this->input->post('referal_code', true);
        $cek_referal    = $this->mod->m_get_referal($referal_code);
        $post =  [
            'id_order'              => $this->input->post('id_order', true),
            'id_customer'           => $id_customer,
            'nama_pengirim'         => $this->input->post('pengirim', true),
            'nama_penerima'         => $this->input->post('penerima', true),
            'no_telpn_pengirim'     => $this->input->post('no_tlpn_pengirim', true),
            'no_telpn_penerima'     => $this->input->post('no_tlpn_penerima', true),
            'jenis_pembayaran'      => $this->input->post('jenis_pembayaran', true),
            'alamat_asal'           => $this->input->post('alamat_asal', true),
            'koordinat_asal'        => $this->input->post('koordinat_asal', true),
            'kabupaten_asal'        => $this->input->post('kabupaten_asal', true),
            'alamat_tujuan'         => $this->input->post('alamat_tujuan', true),
            'koordinat_tujuan'      => $this->input->post('koordinat_tujuan', true),
            'kabupaten_tujuan'      => $this->input->post('kabupaten_tujuan', true),
            'ongkir'                => $this->input->post('nominal_ongkir', true),
            'subtotal'              => $this->input->post('nominal_subtotal', true),
            'total'                 => $this->input->post('nominal_total', true),
            'tanggal_order'         => date('Y-m-d H:i:s'),
            'jarak'                 => $this->input->post('jarak', true),
            'verifikasi_customer'   => $this->input->post('verifikasi_customer', true)
        ];
        $temp = $this->mod->m_get_data_order_customer_tmp($id_customer);
        $i=0;
        foreach($temp as $val){
            $post_detail[$i] = [
                'id_barang'     => $val['id_barang'],
                'id_order'      => $val['id_order'],
                'id_customer'   => $val['id_customer'],
                'volume_barang' => $val['volume_barang'],
                'berat_barang'  => $val['berat_barang'],
                'status_berat'  => $val['status_berat'],
                'catatan'       => $val['catatan'],
                'total'         => $val['total']
            ];
            $i++;
        }
        // print('<pre>');print_r($post);
        // print('<pre>');print_r($temp);
        // print('<pre>');print_r($post_detail);exit();
        $this->mod->m_save_to_order($post);
        $this->mod->m_save_to_order_detail_customer($post_detail);
        $this->mod->m_destroy_all_order_detail_customer_tmp($id_customer);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Order Barang Berhasil
        </div>');
        redirect('order');
    }
    
    /* ---------- Riwayat Order ----------*/
    public function show_riwayat_order()
    {
        $id_customer = $this->session->userdata('id_customer');
        $data['title'] = 'Riwayat Order';
        $data['order'] = $this->mod->m_get_order_customer($id_customer);
        // print('<pre>');print_r($data);exit();
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('riwayat_order');
        $this->load->view('templates/frontend/depan/footer');
    }

    public function detail_riwayat()
    {
        $id_customer    = $this->session->userdata('id_customer');
        $id_order       = $this->uri->segment(3);
        $data['title']  = 'Detail  Order';
        $data['detail'] = $this->mod->m_get_detail_order_customer($id_order);
        $data['list_barang'] = $this->mod->m_get_list_order_customer($id_order);
        $data['charge']     = $this->mod->m_count_charge($id_order);
        // print('<pre>');print_r($data);exit();
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu');
        $this->load->view('riwayat_order_detail');
        $this->load->view('templates/frontend/depan/footer');
    }

    /*--------- Driver ----------*/
    public function order_driver_masuk()
    {
        $id_rider           = $this->session->userdata('id_rider');
        $data['title']      = 'Orderan Masuk';
        $data['order']       = $this->mod->m_get_order_driver_masuk($id_rider);
        // print('<pre>');print_r($data);exit();
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu_driver');
        $this->load->view('list_order_masuk', $data);
        $this->load->view('templates/frontend/depan/footer');
    }

    public function detail_order_driver()
    {
        $id_customer    = $this->session->userdata('id_customer');
        $id_order       = $this->input->post('id', true);
        $data['detail'] = $this->mod->m_get_detail_order_customer($id_order);
        $data['list_barang']    = $this->mod->m_get_list_order_customer($id_order);
        $data['level']          = $this->mod->m_get_level_customer($data['detail']['id_customer']);
        echo json_encode($data);
    }

    public function update_order_detail_driver()
    {
        $panjang        = $this->input->post('panjang', true);
        $lebar          = $this->input->post('lebar', true);
        $tinggi         = $this->input->post('tinggi', true);
        $berat_barang   = $this->input->post('berat_barang', true);
        $id_user        = $this->input->post('id_customer',true);
        $level_user     = $this->input->post('level_user', true);
        $tarif_barang   = $this->mod->m_get_tarif_barang($level_user);
        $total_sebelum  = $this->input->post('total_sebelum', true);
        $berat          = round(($panjang*$lebar*$tinggi)/6000,1);
        $harga_overweight   = ($tarif_barang['harga_overweight']*$total_sebelum)/100;
        $harga_oversize     = ($tarif_barang['harga_oversize']*$total_sebelum)/100;
        if(($berat_barang[0] == "overweight") && ($berat_barang[1] == "oversize")){
            echo "true 2 kondisi";
            $total = ceil(($berat * $tarif_barang['harga_normal'])+ $harga_overweight + $harga_oversize);
        }else if($berat_barang[0] == "overweight"){
            echo "true 1 overweight";
            $total = ceil(($berat * $tarif_barang['normal'])+ $harga_overweight);
        }else if($berat_barang[0] == "oversize"){
            echo "true 1 oversize";
            $total = ceil(($berat * $tarif_barang['normal'])+ $harga_oversize);
        }else{
            echo "normal";
            $total = ceil($berat * $tarif_barang['harga_normal']);
        }

        // if($uang_diterima ==""){
        //     $status_pembayaran = 'belum';
        // }else{
        //     $status_pembayaran = 'sudah';
        // }
        // print('<pre>');print_r($harga_overweight);
        // print('<pre>');print_r($harga_oversize);
        // print('<pre>');print_r($berat_barang);
        // print('<pre>');print_r($tarif_barang);
        $post = [
            'id_order'      => $this->input->post('id_order_db', true),
            'id_customer'   => $id_user,
            'volume_barang' => $panjang."x".$lebar."x".$tinggi,
            'berat_barang'  => $berat,
            'status_berat'  => implode(",",$this->input->post('berat_barang', true)),
            'catatan'       => $this->input->post('catatan', true),
            'total'         => $total
        ];
        $post_order_customer = [
            'id_order'          => $this->input->post('id_order_db', true),
            'verifikasi_driver' => 'sudah',
            'subtotal'          => $total,
            'total'             => $total + $this->input->post('ongkir', true)
        ];
        $post_order_driver = [
            'id_order'      => $this->input->post('id_order_db', true),
            'volume_barang' => $panjang."x".$lebar."x".$tinggi,
            'berat_barang'  => $berat,
            'status_berat'  => implode(",",$this->input->post('berat_barang', true))
        ];
        // print('<pre>');print_r($post);
        // print('<pre>');print_r($post_order_customer);
        // print('<pre>');print_r($post_order_driver);exit();
        $this->mod->m_update_order_customer($post_order_customer);
        $this->mod->m_update_order_detail_customer($post);
        $this->mod->m_save_order_driver($post_order_driver);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Barang Berhasil Diupdate
            </div>');
        redirect('order/order_driver_masuk');
    }

    public function proses_orderan()
    {
        $this->mod->m_save_proses_orderan_driver();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Barang Berhasil Diupdate
        </div>');
        redirect('order/order_driver_masuk');
        
    }

    public function selesai_orderan()
    {
        $this->mod->m_save_selesai_orderan_driver();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil menyelesaikan orderan
        </div>');
        redirect('order/order_driver_masuk');
    }

    public function order_driver_selesai()
    {
        $data['title']  = "Orderan Selesai";
        $id_rider       = $this->session->userdata('id_rider');
        $data['order']  = $this->mod->m_get_order_driver_selesai($id_rider);
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu_driver');
        $this->load->view('list_order_selesai', $data);
        $this->load->view('templates/frontend/depan/footer');

    }

    public function detail_order_driver_selesai()
    {
        $data['title']  = "Detail Orderan Selesai";
        $id_orderan     = $this->uri->segment(3);
        $data['detail'] = $this->mod->m_get_detail_order_driver_selesai($id_orderan);
        // print('<pre>');print_r($data);exit();
        $this->load->view('templates/frontend/depan/header', $data);
        $this->load->view('templates/frontend/depan/menu_driver');
        $this->load->view('list_order_selesai_detail', $data);
        $this->load->view('templates/frontend/depan/footer');
    }

}