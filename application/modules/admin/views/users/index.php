<?php


if ($this->uri->segment(3)) {
    //KONDISI TUNTUK EDIT DATA
    $id_kpu = $detail['id_kpu'];
    $nama_lengkap = $detail['nama_lengkap'];
    $username = $detail['username'];
    $is_active = $detail['is_active'];
    $submit = "Edit";
    $formType = "Edit KPU";
} else {
    //KONDISI UNTUK TAMBAH DATA
    $id_kpu = NULL;
    $nama_lengkap = NULL;
    $username = NULL;
    $is_active = 1;
    $submit = "Tambah";
    $formType = "Tambah KPU";
}

?>
<!-- Page header -->
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

<!-- Main content -->
<div class="content">
    <div class="row">
        <div class="col-md-8 table-responsive">
            <div class="card">
                <div class="card-body">
                    <?= flash() ?>
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $s) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= strtoupper($s['nama_lengkap']) ?></td>
                                    <td><?= $s['username'] ?></td>
                                    <td class="text-center">
                                        <?php if ($s['is_active'] == 1) { ?>
                                            <span class="badge badge-success">AKTIF</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">NONAKTIF</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?= base_url('admin/users/' . $s['id_kpu']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                                    <a href="<?= base_url('admin/users/hapus_user/' . $s['id_kpu']) ?>" data-konfirmasi="Data user <?= $s['username'] ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success-800">
                    <h5 class="card-title font-weight-semibold"><?= $formType ?></h5>
                </div>
                <div class="card-body">
                    <form role="form" name="user" action="<?= base_url() . 'admin/users/simpan_user' ?>" method="post">
                        <div class="box-body table-responsive">
                            <input type="hidden" name="id_kpu" value="<?= $id_kpu ?>">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" minlength="5" required="" value="<?= $nama_lengkap ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="hidden" name="username_lama" class="form-control" value="<?= $username ?>">
                                <input type="text" name="username" class="form-control" minlength="5" required="" value="<?= $username ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="" minlength="5" <?= $submit == "Tambah" ? 'required=""' : ''  ?> value="">
                                <?= $submit == "Edit" ? '<span class="text-danger">Kosongkan password jika tidak diubah.</span>' : '' ?>

                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= $is_active == 1 ? "selected" : "" ?>>Aktif</option>
                                    <option value="0" <?= $is_active == 0 ? "selected" : "" ?>>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url() . 'admin/users' ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" name="submit" value="<?= $submit ?>" class="btn btn-primary">Simpan</button>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>