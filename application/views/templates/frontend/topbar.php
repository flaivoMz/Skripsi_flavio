<?php
$ci = get_instance();
$ci->load->model('PaketwisataModel');
$kategori = $ci->PaketwisataModel->semuaKategori();
if ($this->uri->segment(1) != "auth" && $this->uri->segment(1) != "account") {
?>
    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
<?php } ?>
<!-- End Preload -->
<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                    <h1><a href="<?= base_url() ?>" title="City tours travel">City Tours travel</a></h1>
                </div>
            </div>
            <nav class="col-9 ">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img src="<?= base_url('assets/frontend/') ?>img/logo_sticky.png" width="160" height="34" alt="City tours" data-retina="true">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <ul>
                                <li><a href="<?= base_url() ?>" class="active">Home</a></li>
                                <li><a href="<?= base_url('wisata') ?>" class="active">Wisata</a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Kategori <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="<?= base_url('wisata') ?>">Semua Kategori</a></li>
                                        <?php foreach ($kategori as $k) { ?>
                                            <li><a href="<?= base_url('wisata/kategori/' . strtolower(str_replace(' ', '-', $k['kategori']))) ?>"><?= ucwords($k['kategori']) ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url() ?>" class="">Hubungi Kami</a></li>
                                <?php if ($this->session->userdata('cust-iduser')) {  ?>
                                    <li class="submenu float-right mr-5">
                                        <a href="javascript:void(0);" class="show-submenu"><i class="icon-user-1"></i> Profil <i class="icon-down-open-mini"></i></a>
                                        <ul>
                                            <li><a href="<?= base_url('account/dashboard') ?>"><i class="icon-user-1"></i> Dashboard</a></li>
                                            <li><a href="<?= base_url('auth/logout') ?>"><i class="icon-angle-circled-right"></i> Keluar</a></li>
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <li class="float-right mr-5"><a href="<?= base_url('auth') ?>" class=""><i class="icon-user-1"></i> Masuk</a></li>

                                <?php } ?>
                            </ul>
                        </div><!-- End main-menu -->
                    </div>
                </div>
                <ul id="top_tools">
                    <li class="mr-3">
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                    </li>

                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header><!-- End Header -->