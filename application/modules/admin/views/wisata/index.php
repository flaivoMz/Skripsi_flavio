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
            <a href="<?= base_url('admin/wisata/form-wisata') ?>" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="fas fa-plus"></i></b> Data Wisata</a>
        </div>
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="3%">NO</th>
                        <th>GAMBAR</th>
                        <th>WISATA</th>
                        <th>KATEGORI</th>
                        <th>HARGA/<sup>Orang</sup></th>
                        <th>MIN. ORANG</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($wisata as $s) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url('assets/frontend/img/wisata/' . $s['gambar_wisata']) ?>" class="img-fluid img-preview rounded"></td>
                            <td><?= ucwords($s['nama_wisata']) ?></td>
                            <td><?= ucwords($s['kategori_wisata']) ?></td>
                            <td><?= 'Rp. ' . format_rupiah($s['harga_wisata']) ?></td>
                            <td><?= $s['min_orang'] ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?= base_url('admin/wisata/'.$s['id_wisata']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                            <a href="<?= base_url('admin/wisata/hapus-wisata/'.$s['id_wisata']) ?>" data-konfirmasi="Data wisata akan dihapus?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="card-footer"></div> -->
    </div>
</div>