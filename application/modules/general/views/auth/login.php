<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <!-- Login form -->
            <form class="login-form" action="<?= base_url() . 'masuk' ?>" method="post">
                <div class="card mb-0 shadow bg-white rounded">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-user-lock icon-2x text-teal-800 border-teal-800 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Silahkan Masuk</h5>
                            <span class="d-block text-muted">Masukkan Sesuai Data di E-KTP</span>
                        </div>
                        <?= flash() ?>
                        <label class="text-secondary">NIK</label>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <label class="text-secondary">Tanggal Lahir</label>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                            <div class="form-control-feedback">
                                <i class="icon-calendar text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Masuk <i class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <span class="form-text text-center text-muted">Jika lupa password, silahkan hubungi petugas KPU yang bertugas pada masing-masing daerah</span>
                    </div>
                </div>
            </form>
            <!-- /login form -->
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->