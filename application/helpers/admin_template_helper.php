<?php

function adminView($page = null, $data = null)
{
    $ci = get_instance();

    $ci->load->view('templates/backend/layout/header', $data);
    $ci->load->view('templates/backend/layout/menu', $data);
    $ci->load->view('templates/backend/layout/navbar', $data);
    $ci->load->view($page, $data);
    $ci->load->view('templates/backend/layout/footer', $data);
}