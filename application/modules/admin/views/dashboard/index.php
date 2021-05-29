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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <form>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 font-weight-semibold">Pilih Periode Pilkada</label>
                            <div class="col-lg-10">
                                <select name="periode" class="form-control">
                                    <?php
                                    $ci = $ci->get_instance;
                                    $periodes = $this->PeriodeModel->semuaPeriode();
                                    foreach ($periodes as $p) { ?>
                                        <option value="<?= $p['id_periode'] ?>" <?= $p['id_periode'] == $periode['id_periode'] ? "selected" : "" ?>><?= $p['periode_jabatan'] . ' ( ' . strtoupper($p['status']) . ' )' ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body table-responsive">
                    <h5 class="text-center font-weight-bold mt-2">HASIL PENGHITUNGAN SUARA</h5>
                    <div class="chart-container">
                        <div class="chart has-fixed-height" id="pie_basic"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main charts -->