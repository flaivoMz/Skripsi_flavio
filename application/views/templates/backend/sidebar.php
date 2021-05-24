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
                        <div class="text-uppercase font-size-xs line-height-xs">PILKADA</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/calon' ?>" class="nav-link <?= $url == "calon" ? "active" : "" ?>">
                            <i class="fas fa-user-tie"></i>
                            <span>
                                Calon Pilkada
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/suara' ?>" class=" nav-link <?= $url == "suara" ? "active" : "" ?>">
                            <i class="fas fa-marker"></i>
                            <span>
                                Kotak Suara
                            </span>
                        </a>
                    </li>
                    <li class="nav-item-header">
                        <div class="text-uppercase font-size-xs line-height-xs">DATA MASTER</div> <i class="icon-menu" title="Main"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/pemilih' ?>" class=" nav-link <?= $url == "pemilih" ? "active" : "" ?>">
                            <i class="fas fa-users"></i>
                            <span>
                                Pemilih
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/parpol' ?>" class="nav-link <?= $url == "parpol" ? "active" : "" ?>">
                            <i class="fas fa-user-shield"></i>
                            <span>
                                Partai Politik
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url() . 'admin/periode' ?>" class="nav-link <?= $url == "periode" ? "active" : "" ?>">
                            <i class="fas fa-calendar"></i>
                            <span>
                                Periode
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