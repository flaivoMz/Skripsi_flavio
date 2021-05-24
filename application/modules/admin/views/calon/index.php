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
            <a href="<?= base_url('admin/calon/form_calon') ?>" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="fas fa-plus"></i></b> Data Calon</a>

            <a href="<?= base_url('admin/calon/acak_nourut') ?>" class="btn bg-danger-400 btn-labeled btn-labeled-right float-right"><b><i class="fas fa-sync"></i></b> Acak No Urut</a>
        </div>
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>NO.CALON</th>
                        <th>PHOTO</th>
                        <th>KETUA</th>
                        <th>WAKIL</th>
                        <th>VISI MISI</th>
                        <th>PENGUSUL</th>
                        <th>PERIODE</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($calon as $s) { ?>
                        <tr>
                            <td class="text-center h1 text-danger font-weight-bold bg-light"><?= $s['no_urut'] ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/images/calon/' . $s['photo']) ?>" class="img-fluid img-preview rounded"></td>
                            <td><?= strtoupper($s['nama_ketua']) ?></td>
                            <td><?= strtoupper($s['nama_wakil']) ?></td>
                            <td><?= substr($s['visi_misi'],0,80).'...dst' ?></td>
                            <td>
                                <?php
                                $ci = get_instance();
                                if ($s['kategori'] == "parpol") {
                                    $parpols = explode(',', $s['id_parpol']);
                                    foreach ($parpols as $id_parpol) {
                                        if (trim($id_parpol) != "") {
                                            $partai = $ci->ParpolModel->parpolById($id_parpol);

                                            echo '<img src="' . base_url('assets/images/parpol/' . $partai['logo']) . '" class="img-fluid img-preview mt-1 ml-1" width="30px">';
                                        }
                                    }
                                ?>

                                <?php } else {
                                    echo "Perseorangan";
                                } ?>
                            </td>
                            <td><?= $s['periode_jabatan'] ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?= base_url('admin/calon/form_calon/'.$s['id_calon']) ?>" class="dropdown-item"><i class="icon-pencil5"></i> Edit</a>
                                            <a href="<?= base_url('admin/calon/hapus_calon/' . $s['id_calon']) ?>" data-konfirmasi="Data calon <?= strtoupper($s['nama_ketua']) ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
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