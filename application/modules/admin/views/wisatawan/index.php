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
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="3%">NO</th>
                        <th>USERNAME</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>JENIS KELAMIN</th>
                        <th>NO. HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($wisatawan as $s) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $s['username'] ?></td>
                            <td><?= strtoupper($s['nama_wisatawan']) ?></td>
                            <td><?= ucwords($s['alamat_wisatawan']) ?></td>
                            <td><?= $s['jekel_wisatawan'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
                            <td><?= $s['no_hp_wisatawan'] ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="card-footer"></div> -->
    </div>
</div>