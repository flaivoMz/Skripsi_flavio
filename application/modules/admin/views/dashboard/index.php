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
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?= count($pesanan) ?></h3>
                        <span class="text-uppercase font-size-xs">total pesanan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-cart2 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?= $wisatawan ?></h3>
                        <span class="text-uppercase font-size-xs">total wisatawan</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-users4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-indigo-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?= $wisata ?></h3>
                        <span class="text-uppercase font-size-xs">total paket wisata</span>

                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-stack-text icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body bg-success-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0"><?= $pemandu ?></h3>
                        <span class="text-uppercase font-size-xs">total pemandu</span>

                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="icon-user-lock icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="card">
            <div class="card-header bg-light">
                <span class="h5 font-weight-semibold">Pesanan Expired</span>
            </div>
            <div class="card-body table-responsive">
                <?= flash() ?>
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th class="text-center">KODE</th>
                            <th class="text-center">TGL. PESAN</th>
                            <th class="text-center">PEMESAN</th>
                            <th class="text-center">NO. HP</th>
                            <th class="text-center">JML ORANG</th>
                            <th class="text-center">TOTAL BAYAR</th>
                            <th class="text-center">STATUS PESAN</th>
                            <th class="text-center">STATUS BAYAR</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pesanan as $p) {
                            $tgl_pesan = new DateTime($p['tgl_pesanan']);
                            $tgl_wisata = new DateTime($p['tgl_wisata']);
                            $tgl_expired = date('Y-m-d H:i:s', strtotime($p['tgl_pesanan'] . ' + 1 days'));
                            if (date('Y-m-d H:i:s') >= $tgl_expired) {
                            
                        ?>
                            <tr>
                                <td><?= $p['kode_booking'] ?></td>
                                <td><?= tanggal_indo($p['tgl_pesanan']) ?></td>
                                <td><?= strtoupper($p['nama_pemesan']) ?></td>
                                <td><?= $p['no_hp_pemesan'] ?></td>
                                <td><?= $p['jml_dewasa'] + $p['jml_balita'] ?></td>
                                <td><?= 'Rp. ' . format_rupiah($p['total_bayar']) ?></td>
                                <td class="text-center">
                                    <?php
                                    $status_pesan = $p['status_pesan'];
                                    if ($status_pesan == "booking") {
                                        echo "<span class='badge badge-primary'>BOOKING</span>";
                                    } else if ($status_pesan == "batal") {
                                        echo "<span class='badge badge-danger'>BATAL</span>";
                                    } else if ($status_pesan == "expired") {
                                        echo "<span class='badge badge-warning'>EXPIRED</span>";
                                    } else {
                                        echo "<span class='badge badge-success'>SELESAI</span>";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $status_bayar = $p['status_bayar'];
                                    if ($status_bayar == "dp") {
                                        echo "<span class='badge badge-warning'>DP</span>";
                                    } else if ($status_bayar == "lunas") {
                                        echo "<span class='badge badge-success'>LUNAS</span>";
                                    } else {
                                        echo "<span class='badge badge-danger'>BELUM BAYAR</span>";
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" data-konfirmasi="Ubah status pesanan <?= $p['nama_pemesan'] ?> menjadi expired ?" class="dropdown-item button-konfirmasi bg-danger">EXPIRED</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            }
                            $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-footer"></div> -->
        </div>
    </div>
</div>
<!-- /main charts -->