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
            <a href="#" class="btn bg-teal-400 btn-labeled btn-labeled-left tambah-pemilih" data-toggle="modal" data-target="#pemilihModal"><b><i class="fas fa-plus"></i></b> Data Pemilih</a>
        </div>
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="3%">NO</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>TGL. LAHIR</th>
                        <th>AGAMA</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pemilih as $s) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $s['nik'] ?></td>
                            <td><?= ucwords($s['nama']) ?></td>
                            <td><?= $s['alamat'] ?></td>
                            <td><?= $s['jekel'] == "L" ? "Laki-laki" : "Perempuan"  ?></td>
                            <td><?= ucwords($s['tempat_lahir']) . ', ' . tanggal_indo($s['tgl_lahir']) ?></td>
                            <td><?= ucwords($s['agama']) ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item edit-pemilih" data-toggle="modal" data-target="#pemilihModal" data-idpemilih="<?= $s['id_pemilih'] ?>" data-nik="<?= $s['nik'] ?>" data-nama="<?= $s['nama'] ?>" data-jekel="<?= $s['jekel'] ?>"  data-tempatlahir="<?= $s['tempat_lahir'] ?>"  data-tgllahir="<?= $s['tgl_lahir'] ?>" data-alamat="<?= $s['alamat'] ?>" data-agama="<?= $s['agama'] ?>"><i class="icon-pencil5"></i> Edit</a>
                                            <a href="<?= base_url('admin/pemilih/hapus/' . $s['id_pemilih']) ?>" data-konfirmasi="Data pemilih <?= strtoupper($s['nama']) ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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


<div class="modal fade" id="pemilihModal" tabindex="-1" aria-labelledby="pemilihLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-800">
                <h5 class="modal-title" id="pemilihLabel">Tambah Data Pemilih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPemilih" action="<?= base_url('admin/pemilih/simpan_pemilih') ?>" method="post">
                    <input type="hidden" name="id_pemilih" id="idpemilih">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" id="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jekel" id="jekel" class="form-control">
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempatlahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgllahir" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="agama" class="form-control" id="agama">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" id="submit" name="submit" value="Tambah" form="formPemilih" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>