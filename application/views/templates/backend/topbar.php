<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark align-items-center">
    <div class="pr-4">
        <a href="<?= base_url() . 'admin/dashboard' ?>" class="d-inline-block pr-5">
            <img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <span><?= ucwords($this->session->userdata('admin-username')) ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url() . 'admin/logout' ?>" class="dropdown-item"><i class="icon-switch2"></i> Keluar</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->