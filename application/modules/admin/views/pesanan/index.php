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
                            $expired = true;
                        } else {
                            $expired = false;
                        }
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
                                            <a href="#" class="dropdown-item detailOrder" data-toggle="modal" data-target="#detailOrder" data-idpesanan="<?= $p['id_pesanan'] ?>" data-akunpemesan="<?= $p['nama_wisatawan'] . ' - ' . $p['no_hp_wisatawan'] ?>" data-blnwisata="<?= $tgl_wisata->format('M') ?>" data-tglwisata="<?= $tgl_wisata->format('d') ?>" data-hariwisata="<?= $tgl_wisata->format('D') ?>" data-namapemesan="<?= strtoupper($p['nama_pemesan']) ?>" data-nohppemesan="<?= $p['no_hp_pemesan'] ?>" data-jmldewasa="<?= $p['jml_dewasa'] ?>" data-jmlbalita="<?= $p['jml_balita'] ?>" data-totalbayar="<?= format_rupiah($p['total_bayar']) ?>" data-kodebooking="<?= $p['kode_booking'] ?>" data-statuspesan="<?= $p['status_pesan'] ?>" data-statusbayar="<?= $p['status_bayar'] ?>" data-namawisata="<?= $p['nama_wisata'] ?>" data-tglpesanan="<?= tanggal_indo($p['tgl_pesanan']) ?>" data-tglexpired="<?= tanggal_indo($tgl_expired) ?>" data-dpbayar="<?= format_rupiah(($p['total_bayar'] / 2)) ?>" data-nominalterbayar="<?= $p['nominal_terbayar'] != NULL ? format_rupiah($p['nominal_terbayar']) : format_rupiah(0) ?>" data-tglbayar="<?= $p['tgl_bayar'] != NULL ? tanggal_indo($p['tgl_bayar']) : '-' ?>" data-sisabayar="<?php if ($p['status_terbayar'] == "dp") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo format_rupiah(($p['total_bayar'] - $p['nominal_terbayar']));
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } else if ($p['status_terbayar'] == "lunas") {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo format_rupiah(0);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo format_rupiah($p['total_bayar']);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?>">Detail</a>
                                            <?php if ($status_pesan == "booking" && $status_pesan != "selesai") { ?>
                                                <a href="<?= base_url('admin/pesanan/batalkan/' . $p['id_pesanan']) ?>" data-konfirmasi="Batalkan pesanan <?= $p['nama_pemesan'] ?> ?" class="dropdown-item button-konfirmasi text-danger"> Batalkan</a>
                                            <?php } ?>
                                            <?php if ($expired && $status_bayar == NULL && $status_pesan == "booking") { ?>
                                                <a href="<?= base_url('admin/pesanan/expired/' . $p['id_pesanan']) ?>" data-konfirmasi="Ubah status pesanan <?= $p['nama_pemesan'] ?> menjadi expired ?" class="dropdown-item button-konfirmasi text-warning">Pesanan Expired</a>
                                            <?php } ?>
                                            <?php if ($status_bayar == "dp" && $status_pesan != "batal") { ?>
                                                <a href="#" class="dropdown-item text-success setting-pemandu" data-toggle="modal" data-target="#settingPemanduModal" data-idpesanan="<?= $p['id_pesanan'] ?>">Setting Pemandu</a>
                                            <?php } ?>
                                            <!-- <?php //if (date('Y-m-d H:i:s') >= $p['tgl_wisata'] && $status_bayar == "dp"){ ?>
                                                <a href="#" class="dropdown-item text-primary">Selesai</a>
                                            <?php //} ?> -->
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

<div class="modal fade" id="detailOrder" aria-labelledby="detailOrderLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailOrderLabel">Detail Order #<span id="kode_booking"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: whitesmoke;">
                <div class="row">
                    <div class="col-md-4 border-right text-center mb-3">
                        <div class="mt-3">
                            <table class="table table-bordered">
                                <tr class="bg-danger">
                                    <td><span class="h3 text-white" id="bulan_wisata"></span></td>
                                </tr>
                                <tr style="background-color: lightcyan;">
                                    <td> <span class="font-weight-bold h1 text-danger" id="tanggal_wisata"></span><br />
                                        <span class="h5" id="hari_wisata"></span>
                                    </td>
                                </tr>
                            </table>
                            <hr />
                            <span class="badge" id="status_pesan" style="line-height: 20px; letter-spacing: 5px;"></span> <br />
                            <span class="badge mt-2 mb-3" id="status_bayar" style="line-height: 20px; letter-spacing: 5px;"></span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pesanan-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pesanan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pembayaran-tab" data-toggle="tab" href="#pembayaran" role="tab" aria-controls="pembayaran" aria-selected="false">Pembayaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pemandu-tab" data-toggle="tab" href="#pemandu" role="tab" aria-controls="pemandu" aria-selected="false">Pemandu</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pesanan-tab">
                                <div class="justify-content-center">
                                    <h5 class="h6 font-weight-bold ml-2" id="nama_wisata"></h5>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td width="35%">Pemesan</td>
                                        <th id="nama_pemesan"></th>
                                    </tr>
                                    <tr>
                                        <td>No HP Pemesan</td>
                                        <th id="no_hp_pemesan"></th>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Booking</td>
                                        <th id="tgl_pesanan"></th>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Dewasa</td>
                                        <th id="jml_dewasa"></th>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Balita</td>
                                        <th id="jml_balita"></th>
                                    </tr>
                                    <tr>
                                        <td>Akun Pemesan</td>
                                        <th id="akun_pemesan"></th>
                                    </tr>
                                    <tr id="row_expired">
                                        <td id="bayar_sebelum_text" class="text-danger font-weight-bold"></td>
                                        <th id="bayar_sebelum_tgl" class=" text-danger font-weight-bold"></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
                                <table class="table">
                                    <tr>
                                        <td>Total Bayar</td>
                                        <th class="text-danger font-weight-bold" id="total_bayar"></th>
                                    </tr>
                                    <tr>
                                        <td>DP Harus Dibayar (50%)</td>
                                        <th class="text-danger font-weight-bold" id="dp_bayar"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Terbayar</td>
                                        <th class="text-danger font-weight-bold" id="terbayar"></th>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <th class="text-danger font-weight-bold" id="tgl_bayar"></th>
                                    </tr>
                                    <tr>
                                        <td>Sisa Harus Dibayar</td>
                                        <th class="text-danger font-weight-bold" id="sisa_bayar"></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pemandu" role="tabpanel" aria-labelledby="pemandu-tab">
                                <table class="table font-weight-bold h6" id="table-pemandu"></table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="settingPemanduModal" data-backdrop="static" data-keyboard="false" aria-labelledby="settingPemanduModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title font-weight-semibold" id="settingPemanduModalLabel">Pemandu Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/pesanan/setting_pemandu') ?>" id="formPemanduWisata" method="post">
                            <input type="hidden" name="id_pesanan" id="idpesanan" value="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="3%">#</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>NO. HP</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($pemandu as $s) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="pemandu[]" id="pemandu<?= $s['id_pemandu'] ?>" value="<?= $s['id_pemandu'] ?>"></td>
                                            <td><?= ucwords($s['nama_pemandu']) ?></td>
                                            <td><?= ucwords($s['alamat_pemandu']) ?></td>
                                            <td><?= $s['jekel_pemandu'] == "L" ? "Laki-laki" : "Perempuan"  ?></td>
                                            <td><?= $s['no_hp_pemandu'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <span class="text-danger float-left">* ceklis untuk memilih pemandu</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Keluar</button>
                <button type="submit" name="submit" value="Tambah" form="formPemanduWisata" class="btn btn-primary mt-2">Simpan</button>
            </div>
        </div>
    </div>
</div>