<!-- Page content -->
<div class="page-content">
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->
        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- User menu -->
            <!-- <div class="sidebar-user">
        <div class="card-body">
        </div>
      </div> -->
            <!-- /user menu -->
            <?php
            $url = $this->uri->segment(2);
            ?>
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">MENU</div> <i class="icon-menu" title="MENU"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/dashboard' ?>" class="nav-link <?= $url == "dashboard" ? "active" : "" ?>">
                            <i class="icon-home4"></i>
                            <span>
                                Halaman Utama
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">TRANSAKSI</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'siswa' ?>" class=" nav-link <?= $url == "siswa" ? "active" : "" ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <span>
                                Pesanan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'kriteria' ?>" class="nav-link <?= $url == "kriteria" ? "active" : "" ?>">
                            <i class="fas fa-money-bill"></i>
                            <span>
                                Pembayaran
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">DATA MASTER</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/wisata' ?>" class=" nav-link <?= $url == "wisata" ? "active" : "" ?>">
                            <i class="fas fa-mountain"></i>
                            <span>
                                Wisata
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/pemandu' ?>" class="nav-link <?= $url == "pemandu" ? "active" : "" ?>">
                            <i class="fas fa-user-shield"></i>
                            <span>
                                Pemandu
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/wisatawan' ?>" class="nav-link <?= $url == "wisatawan" ? "active" : "" ?>">
                            <i class="fas fa-users"></i>
                            <span>
                                Wisatawan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/users' ?>" class="nav-link <?= $url == "users" ? "active" : "" ?>">
                            <i class="fas fa-users-cog"></i>
                            <span>
                                Users
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->
    <!-- Main content -->
    <div class="content-wrapper">