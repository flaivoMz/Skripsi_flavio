<section class="parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/frontend/') ?>img/banner/banner1.jpg" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
            <h1>Hello <?= $user['nama_wisatawan'] ?></h1>
        </div>
    </div>
</section>
<!-- End section -->

<main>
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Account</a>
                </li>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    <div class="margin_60 container">
        <div id="tabs" class="tabs">
            <nav>
                <ul>
                    <li><a href="#section-1" class="icon-booking"><span>Pesanan</span></a>
                    </li>
                    <li><a href="#section-3" class="icon-settings"><span>Edit Password</span></a>
                    </li>
                    <li><a href="#section-4" class="icon-profile"><span>Profil</span></a>
                    </li>
                </ul>
            </nav>
            <div class="content">

                <section id="section-1">
                    <?php
                    if (count($pesanan) == 0) {
                        echo "<div class='alert alert-info'>";
                        echo "<div class='alert-heading'>Belum ada data pesanan</div>";
                        echo "</div>";
                    } else {
                        foreach ($pesanan as $p) {
                            $tgl_pesan = new DateTime($p['tgl_pesanan']);
                            $tgl_wisata = new DateTime($p['tgl_wisata']);
                            $tgl_expired = date('Y-m-d H:i:s', strtotime($p['tgl_pesanan'] . ' + 1 days'));
                    ?>
                            <div class="strip_booking">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2">
                                        <div class="date">
                                            <span class="month"><?= $tgl_wisata->format('M') ?></span>
                                            <span class="day"><strong><?= $tgl_wisata->format('d') ?></strong><?= $tgl_wisata->format('D') ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5">
                                        <h3 class="tours_booking"><?= strtoupper($p['nama_wisata']) ?><span><?= $p['jml_dewasa'] ?> Dewasa / <?= $p['jml_balita'] ?> Balita</span>
                                        </h3>
                                        <div class="col-md-3 ml-5">
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
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <ul class="info_booking">
                                            <li><strong>Kode Booking</strong> <?= $p['kode_booking'] ?></li>
                                            <li><strong>Tanggal Booking</strong> <?= tanggal_indo($p['tgl_pesanan']) ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="booking_buttons">
                                            <a href="#0" class="btn_2 detailOrder" data-toggle="modal" data-target="#detailOrder" data-idpesanan="<?= $p['id_pesanan'] ?>" data-blnwisata="<?= $tgl_wisata->format('M') ?>" data-tglwisata="<?= $tgl_wisata->format('d') ?>" data-hariwisata="<?= $tgl_wisata->format('D') ?>" data-namapemesan="<?= strtoupper($p['nama_pemesan']) ?>" data-nohppemesan="<?= $p['no_hp_pemesan'] ?>" data-jmldewasa="<?= $p['jml_dewasa'] ?>" data-jmlbalita="<?= $p['jml_balita'] ?>" data-totalbayar="<?= format_rupiah($p['total_bayar']) ?>" data-kodebooking="<?= $p['kode_booking'] ?>" data-statuspesan="<?= $p['status_pesan'] ?>" data-statusbayar="<?= $p['status_bayar'] ?>" data-namawisata="<?= $p['nama_wisata'] ?>" data-tglpesanan="<?= tanggal_indo($p['tgl_pesanan']) ?>" data-tglexpired="<?= tanggal_indo($tgl_expired) ?>" data-dpbayar="<?= format_rupiah(($p['total_bayar'] / 2)) ?>" data-nominalterbayar="<?= $p['nominal_terbayar'] != NULL ? format_rupiah($p['nominal_terbayar']) : format_rupiah(0) ?>" data-tglbayar="<?= $p['tgl_bayar'] != NULL ? tanggal_indo($p['tgl_bayar']) : '-' ?>" data-sisabayar="<?php if ($p['status_terbayar'] == "dp") {echo format_rupiah(($p['total_bayar'] - $p['nominal_terbayar']));} else if ($p['status_terbayar'] == "lunas") { echo format_rupiah(0);} else {echo format_rupiah($p['total_bayar']);} ?>">Detail</a>
                                            <?php if ($p['status_bayar'] == NULL || $p['status_bayar'] == "") {
                                                if ($p['status_pesan'] != "batal") { ?>
                                                    <a href="<?= base_url('account/batal-pesanan/' . $p['kode_booking']) ?>" class="btn_3 cancelOrder">Batal</a>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End row -->
                            </div>
                            <!-- End strip booking -->
                    <?php }
                    } ?>

                </section>
                <!-- End section 1 -->

                <section id="section-3">
                    <div class="row justify-content-center">
                        <div class="col-md-6 add_bottom_30">
                            <h4>Edit Password</h4>
                            <form action="<?= base_url('account/edit-password') ?>" method="post">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input class="form-control" name="old_password" id="old_password" type="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input class="form-control" name="new_password" id="new_password" type="password" required minlength="5">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Edit Password</button>
                            </form>
                        </div>

                    </div>
                    <!-- End row -->

                    <!-- End row -->
                </section>
                <!-- End section 3 -->

                <section id="section-4">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-12">
                            <h4>Edit Profil </span></h4>
                            <p class="float-right h6">username : <span class="badge badge-info"><?= strtolower($this->session->userdata('cust-username')) ?></span></p>
                            <hr class="mt-5" />
                            <form action="<?= base_url('account/edit-profil') ?>" method="post">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama_wisatawan" type="text" value="<?= strtoupper($user['nama_wisatawan']) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat_wisatawan" type="text" value="<?= $user['alamat_wisatawan'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jekel_wisatawan" class="form-control">
                                        <option value="L" <?= $user['jekel_wisatawan'] == "L" ? "selected" : "" ?>>Laki - laki</option>
                                        <option value="P" <?= $user['jekel_wisatawan'] == "P" ? "selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input class="form-control" name="no_hp_wisatawan" type="text" value="<?= $user['no_hp_wisatawan'] ?>" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Edit Profil</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End section 4 -->

            </div>
            <!-- End content -->
        </div>
        <!-- End tabs -->
    </div>
    <!-- end container -->
</main>
<!-- End main -->