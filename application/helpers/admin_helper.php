<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('tanggal_indo')) {
  function tanggal_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    // $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
    $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    return $result;
  }
}

function adminView($page = null, $data = null)
{
    $ci = get_instance();

    $ci->load->view('templates/backend/layout/header', $data);
    $ci->load->view('templates/backend/layout/menu', $data);
    $ci->load->view('templates/backend/layout/navbar', $data);
    $ci->load->view($page, $data);
    $ci->load->view('templates/backend/layout/footer', $data);
}
function format_rupiah($number)
{

    if ($number == '') $number = 0;
    return number_format($number, 0, '.', ',');
}
    