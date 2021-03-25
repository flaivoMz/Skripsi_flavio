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


<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            <a href="#" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal" data-target="#pemandu1"><b><i class="fas fa-plus"></i></b> Data Pemandu</a>
        </div>
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="3%">NO</th>
                        <th>FOTO</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>NO. HP</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pemandu as $s) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url('assets/frontend/img/pemandu/' . $s['photo']) ?>" class="img-fluid img-preview rounded"></td>
                            <td><?= ucwords($s['nama_pemandu']) ?></td>
                            <td><?= ucwords($s['alamat_pemandu']) ?></td>
                            <td><?= $s['jekel_pemandu'] == "L" ? "Laki-laki" : "Perempuan"  ?></td>
                            <td><?= $s['no_hp_pemandu'] ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#pemandu<?= $i + 1 ?>"><i class="icon-pencil5"></i> Edit</a>
                                            <a href="<?= base_url('admin/pemandu/hapus-pemandu/' . $s['id_pemandu']) ?>" data-konfirmasi="Data pemandu <?= $s['nama_pemandu'] ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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
<?php

for ($i = 1; $i <= count($pemandu) + 1; $i++) {

    if ($i != 1) {
        $index = $i - 2;
        $formType = "Edit";
        $id_pemandu = $pemandu[$index]['id_pemandu'];
        $nama_pemandu = $pemandu[$index]['nama_pemandu'];
        $alamat_pemandu = $pemandu[$index]['alamat_pemandu'];
        $jekel_pemandu = $pemandu[$index]['jekel_pemandu'];
        $no_hp_pemandu = $pemandu[$index]['no_hp_pemandu'];
        $photo = $pemandu[$index]['photo'];
    } else {
        $formType = "Tambah";
        $id_pemandu = null;
        $nama_pemandu = null;
        $alamat_pemandu = null;
        $jekel_pemandu = null;
        $no_hp_pemandu = null;
        $photo = null;
    }

?>
    <div class="modal fade" id="pemandu<?= $i ?>" tabindex="-1" aria-labelledby="pemanduLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info-800">
                    <h5 class="modal-title" id="pemanduLabel"><?= $formType . ' Data Pemandu' ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPemandu<?= $i ?>" action="<?= base_url('admin/pemandu/simpan-pemandu') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pemandu" value="<?= $id_pemandu ?>">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_pemandu" class="form-control" required value="<?= $nama_pemandu ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat_pemandu" class="form-control" required value="<?= $alamat_pemandu ?>">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jekel_pemandu" class="form-control">
                                <option value="L" <?= $jekel_pemandu == "L" ? "selected" : "" ?>>Laki - laki</option>
                                <option value="P" <?= $jekel_pemandu == "P" ? "selected" : "" ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. Handphone</label>
                            <input type="number" name="no_hp_pemandu" class="form-control" required value="<?= $no_hp_pemandu ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="foto_lama" value="<?= $photo ?>">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control-uniform" data-fouc <?= $formType == "Tambah" ? "required" : "" ?>>
                            <span class="text-danger">
                                <?= $formType == "Edit" ? "Kosongkan foto jika tidak diubah" : "" ?>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" value="<?= $formType ?>" form="formPemandu<?= $i ?>" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>