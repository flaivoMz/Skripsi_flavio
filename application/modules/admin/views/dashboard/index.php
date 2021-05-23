<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header page-header-light" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title">
                <h5>
                    <i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Halaman Utama</span>
                </h5>
            </div>

            <div class="header-elements py-0">
                <div class="breadcrumb">
                    <a href="<?= base_url('admin/dashboard') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Halaman Utama</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Main charts -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?//= count($pesanan) ?></h3>
                        <span class="text-uppercase font-size-xs">total pesanan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-cart2 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?//= $wisatawan ?></h3>
                        <span class="text-uppercase font-size-xs">total wisatawan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-users4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-indigo-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?//= $wisata ?></h3>
                        <span class="text-uppercase font-size-xs">total paket wisata</span>

                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-stack-text icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?//= $pemandu ?></h3>
                        <span class="text-uppercase font-size-xs">total pemandu</span>

                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="icon-user-lock icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /main charts -->