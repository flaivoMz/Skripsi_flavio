
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="site-wrap" id="home-section">
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info@yourdomain.com</span></a>
            <span class="mx-md-2 d-inline-block"></span>
            <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">1+ (234) 5678 9101</span></a>
            <div class="float-right">
                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>
            </div>
            </div>
        </div>
    </div>
</div>
<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
            <a href="<?php echo base_url()?>" class="text-black"><span class="text-primary">Anter#Anter</a>
            </div>
            <div class="col-12">
            <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                    <li><a href="<?php echo base_url('home');?>" class="nav-link">Home</a></li>
                    <?php if($this->session->userdata('nama') != ""): ?>
                        <li class="has-children">
                            <a class="nav-link">Order</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="<?php echo base_url('order');?>" class="nav-link">Pesan</a></li>
                                <li><a href="<?php echo base_url('order/show_riwayat_order');?>" class="nav-link">Riwayat Order</a></li>
                            </ul>
                        </li>
                        <li><a href="#services-section" class="nav-link">Akun</a></li>
                    <?php endif;?>
                    <?php if($this->session->userdata('nama') == ""): ?>
                        <li><a href="<?php echo base_url('home/show_login')?>" class="nav-link">Login</a></li>
                    <?php else:?>
                        <li><a href="<?php echo base_url('home/logout')?>" class="nav-link">Logout</a></li>
                    <?php endif;?>
                </ul>
            </nav>
            </div>
            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>
</header>

