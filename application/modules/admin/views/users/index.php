<?php


if ($this->uri->segment(3)) {
    //KONDISI TUNTUK EDIT DATA
    $iduser = $detail['id_user'];
    $username = $detail['username'];
    $role = $detail['role'];
    $is_active = $detail['is_active'];
    $submit = "Edit";
    $formType = "Edit Users";
} else {
    //KONDISI UNTUK TAMBAH DATA
    $iduser = NULL;
    $nama = NULL;
    $username = NULL;
    $role = "admin";
    $is_active = 1;
    $submit = "Tambah";
    $formType = "Tambah Admin";
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 table-responsive">
                    <?= flash() ?>
                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th>USERNAME</th>
                                <th class="text-center">ROLE</th>
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
                                    <td><?= $s['username'] ?></td>
                                    <td class="text-center"><?= $s['role'] == "admin" ? "ADMIN" : "WISATAWAN"  ?></td>
                                    <td class="text-center">
                                        <?php if ($s['is_active'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Nonaktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?= base_url('admin/users/' . $s['id_user']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                                    <a href="<?= base_url('admin/users/hapus_user/' . $s['id_user']) ?>" data-konfirmasi="Data user <?= $s['username'] ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="card-title font-weight-semibold"><?= $formType ?></h5>
                            <span class="float-right">Role : <span class="badge badge-info"><?= ucwords($role) ?></span></span>
                        </div>
                        <div class="card-body">
                            <form role="form" name="user" action="<?= base_url() . 'admin/users/simpan_user' ?>" method="post">
                                <div class="box-body table-responsive">
                                    <input type="hidden" name="id_user" value="<?= $iduser ?>">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="" placeholder="Masukkan username" minlength="5" required="" <?= $submit == "Edit" ? 'readonly=""' : ''  ?> value="<?= $username ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="" placeholder="Masukkan password" minlength="5" <?= $submit == "Tambah" ? 'required=""' : ''  ?> value="">
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
                                    <button type="submit" name="submit" value="<?= $submit ?>" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url() . 'admin/users' ?>" class="btn btn-secondary">Batal</a>
                                </div>
                                <!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>