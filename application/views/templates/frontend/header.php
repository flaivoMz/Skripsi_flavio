<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title><?= $title . ' | City Tours' ?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Montserrat:300,400,700" rel="stylesheet">

    <!-- COMMON CSS -->
    <link href="<?= base_url('assets/frontend/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>css/vendors.css" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="<?= base_url('assets/frontend/') ?>css/admin.css" rel="stylesheet">

    <link href="<?= base_url('assets/frontend/') ?>css/custom.css" rel="stylesheet">

    <!-- REVOLUTION SLIDER CSS -->
    <link href="<?= base_url('assets/frontend/') ?>rs-plugin/css/settings.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>css/extralayers.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>css/sweetalert2.min.css" rel="stylesheet">

</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="flash-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>