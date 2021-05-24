<!-- Page header -->
<?php
if ($this->uri->segment(3)) {
    //KONDISI TUNTUK EDIT DATA
    $id_periode = $detail['id_periode'];
    $periode_jabatan = $detail['periode_jabatan'];
    $mulai_pilih = $detail['mulai_pilih'];
    $batas_pilih = $detail['batas_pilih'];
    $status = $detail['status'];
    $submit = "Edit";
    $formType = "Edit Periode Pilkada";
} else {
    //KONDISI UNTUK TAMBAH DATA
    $id_periode = NULL;
    $nama = NULL;
    $periode_jabatan = NULL;
    $mulai_pilih = NULL;
    $batas_pilih = NULL;
    $status = NULL;
    $submit = "Tambah";
    $formType = "Tambah Periode Pilkada";
}

?>
<div class="page-header page-header-light">
    <div class="page-header page-header-light" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title">
                <h5>
                    <i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title ?></span>
                </h5>
            </div>

            <div class="header-elements py-0">
                <div class="breadcrumb">
                    <a href="<?= base_url('admin/dashboard') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"><?= $title ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body table-responsive">
                    <?= flash() ?>
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="3%">NO</th>
                                <th>PERIODE JABATAN</th>
                                <th>WAKTU PEMILU</th>
                                <th>STATUS</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($periode as $s) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= strtoupper($s['periode_jabatan']) ?></td>
                                    <td><?= tanggal_indo($s['mulai_pilih']).' s/d '.tanggal_indo($s['batas_pilih']) ?></td>
                                    <td><?= $s['status'] == "aktif" ? "<span class='badge badge-success'>AKTIF</span>" : "<span class='badge badge-danger'>NONAKTIF</span>" ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?= base_url('admin/periode/'.$s['id_periode']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                                    <a href="<?= base_url('admin/periode/hapus_periode/' . $s['id_periode']) ?>" data-konfirmasi="Data partai <?= strtoupper($s['periode_jabatan']) ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="card-footer"></div> -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-teal-800">
                    <h6 class="card-title font-weight-semibold"><?= $formType ?></h6>
                </div>
                <div class="card-body table-responsive">
                    <form id="formPeriode" name="formPeriode" action="<?= base_url('admin/periode/simpan_periode') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_periode" value="<?= $id_periode ?>">
                        <div class="form-group">
                            <label>Periode Jabatan</label>
                            <input type="text" name="periode_jabatan" id="periode_jabatan" class="form-control" required value="<?= $periode_jabatan ?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pilkada</label>
                            <input type="date" name="mulai_pilih" id="mulai_pilih" class="form-control" required value="<?= $mulai_pilih ?>">
                        </div>
                        <div class="form-group">
                            <label>s/d</label>
                            <input type="date" name="batas_pilih" id="batas_pilih" class="form-control" required value="<?= $batas_pilih ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                            <option value="aktif" <?= $status == "aktif" ? "selected" : "" ?>>AKTIF</option>
                            <option value="tidak" <?= $status == "tidak" ? "selected" : "" ?>>NONAKTIF</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('admin/periode') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="submit" form="formPeriode" value="<?= $submit ?>" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>