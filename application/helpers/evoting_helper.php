<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        // $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
        $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}

function custView($page = null, $data = null)
{
    $ci = get_instance();

    $ci->load->view('templates/frontend/header', $data);
    $ci->load->view('templates/frontend/topbar', $data);
    $ci->load->view($page, $data);
    $ci->load->view('templates/frontend/footer', $data);
}
function adminView($page = null, $data = null)
{
    $ci = get_instance();

    $ci->load->view('templates/backend/header', $data);
    $ci->load->view('templates/backend/topbar', $data);
    $ci->load->view('templates/backend/sidebar', $data);
    $ci->load->view($page, $data);
    $ci->load->view('templates/backend/footer', $data);
}
function format_rupiah($number)
{

    if ($number == '') $number = 0;
    return number_format($number, 0, '.', ',');
}

function is_logged_in_admin()
{
    $ci = get_instance();

    if (!$ci->session->userdata('admin-iduser')) {
        $ci->session->set_flashdata('danger', 'Silahkan login terlebih dahulu');
        redirect('admin');
    }
}

function is_logged_in_wisatawan()
{
    $ci = get_instance();

    if (!$ci->session->userdata('cust-iduser')) {
        $ci->session->set_flashdata('danger', 'Silahkan login terlebih dahulu');
        redirect('auth');
    }
    if ($ci->session->userdata('cust-role') != "wisatawan") {
        $ci->session->set_flashdata('danger', 'Anda tidak ada akses pada halaman tersebut');
        redirect('auth');
    }
}

function flash()
{
    $ci = get_instance();
    if ($ci->session->flashdata('danger')) {
        echo '<div class="alert alert-danger alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $ci->session->flashdata('danger') . '.
                </div>';
    }
    if ($ci->session->flashdata('success')) {
        echo '<div class="alert alert-success alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    ' . $ci->session->flashdata('success') . '.
                </div>';
    }
}
