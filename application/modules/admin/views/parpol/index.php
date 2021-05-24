<!-- Page header -->
<?php
if ($this->uri->segment(3)) {
    //KONDISI TUNTUK EDIT DATA
    $id_parpol = $detail['id_parpol'];
    $nama_parpol = $detail['nama_parpol'];
    $singkatan = $detail['singkatan'];
    $logo = $detail['logo'];
    $submit = "Edit";
    $formType = "Edit Partai Politik";
} else {
    //KONDISI UNTUK TAMBAH DATA
    $id_parpol = NULL;
    $nama = NULL;
    $nama_parpol = NULL;
    $singkatan = NULL;
    $logo = NULL;
    $submit = "Tambah";
    $formType = "Tambah Partai Politik";
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
                                <th>LOGO</th>
                                <th>NAMA PARTAI</th>
                                <th>SINGKATAN</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($parpol as $s) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td class="text-center"><img src="<?= base_url('assets/images/parpol/' . $s['logo']) ?>" class="img-fluid img-preview rounded"></td>
                                    <td><?= strtoupper($s['nama_parpol']) ?></td>
                                    <td><?= strtoupper($s['singkatan']) ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?= base_url('admin/parpol/'.$s['id_parpol']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                                    <a href="<?= base_url('admin/parpol/hapus_parpol/' . $s['id_parpol']) ?>" data-konfirmasi="Data partai <?= strtoupper($s['nama_parpol']) ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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
                <div class="card-header bg-info-800">
                    <h6 class="card-title font-weight-semibold"><?= $formType ?></h6>
                </div>
                <div class="card-body table-responsive">
                    <form id="formParpol" name="formParpol" action="<?= base_url('admin/parpol/simpan_parpol') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_parpol" value="<?= $id_parpol ?>">
                        <div class="form-group">
                            <label>Nama Partai</label>
                            <input type="text" name="nama_parpol" id="nama_parpol" class="form-control" required value="<?= $nama_parpol ?>">
                        </div>
                        <div class="form-group">
                            <label>Singkatan</label>
                            <input type="text" name="singkatan" id="singkatan" class="form-control" required value="<?= $singkatan ?>">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="hidden" name="logo_lama" value="<?= $logo ?>">
                            <input type="file" name="logo" id="logo" class="form-control" <?= $submit == "Tambah" ? "required" : "" ?>>
                            <?= $submit == "Edit" ? "<span class='text-danger'>Kosongkan jika tidak diubah</span>" : "" ?>
                            
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('admin/parpol') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="submit" form="formParpol" value="<?= $submit ?>" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>