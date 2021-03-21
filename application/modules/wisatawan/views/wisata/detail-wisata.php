<section class="parallax-window" data-parallax="scroll" data-image-src="<?= base_url('assets/frontend/') ?>img/wisata/<?= $wisata['gambar_wisata'] ?>" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1><?= strtoupper($wisata['nama_wisata']) ?></h1>
                    <span><i class="icon-tags-1"></i> <?= ucwords($wisata['kategori_wisata']) ?></span>
                </div>
                <div class="col-md-4">
                    <div id="price_single_main">
                        <span><sup>Rp</sup><?= format_rupiah($wisata['harga_wisata']) ?></span>
                        / orang
                    </div>
                </div>
            </div>
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
                <li><a href="#">Wisata</a>
                </li>
                <li><a href="#">Detail</a>
                </li>
                <li><?= $wisata['nama_wisata'] ?></li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-8" id="single_tour_desc">

                <div class="row">
                    <div class="col-lg-3">
                        <h3>Description</h3>
                    </div>
                    <div class="col-lg-9">
                        <h4><?= ucwords($wisata['nama_wisata']) ?></h4>
                        <p class="justify-content-center">
                            <?= $wisata['deskripsi'] ?>
                            <?= $wisata['deskripsi'] ?>
                            <?= $wisata['deskripsi'] ?>
                            <?= $wisata['deskripsi'] ?>
                        </p>


                    </div>
                </div>
            </div>
            <!--End  single_tour_desc-->

            <aside class="col-lg-4" id="sidebar">
                <div class="theiaStickySidebar">
                    <div class="box_style_1 expose" id="booking_box">
                        <h3 class="inner">- Booking -</h3>
                        <form action="<?= base_url('wisata/form-pesan') ?>" method="post">
                            <div class="row">
                                <input type="hidden" name="id_wisata" value="<?= $wisata['id_wisata'] ?>">
                                <input type="hidden" name="nama_wisata" value="<?= $wisata['nama_wisata'] ?>">
                                <input type="hidden" name="harga_dewasa" id="harga_dewasa" value="<?= $wisata['harga_wisata'] ?>">
                                <input type="hidden" name="min_orang" id="min_orang" value="<?= $wisata['min_orang'] ?>">
                                <input type="hidden" name="subtotal_dewasa" id="subtotal_dewasa" value="0">
                                <input type="hidden" name="harga_balita" id="harga_balita" value="<?= ($wisata['harga_wisata'] / 2) ?>">
                                <input type="hidden" name="subtotal_balita" id="subtotal_balita" value="0">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Tanggal</label>
                                        <input class="date-pick form-control" name="tgl_wisata" data-date-format="M d, D" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><i class=" icon-clock"></i> Jam</label>
                                        <input class="time-pick form-control" name="jam_wisata" value="12:00 AM" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Dewasa</label>
                                        <div class="numbers-row">
                                            <input type="text" value="0" name="jml_dewasa" id="jml_dewasa" class="qty2 form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Balita</label>
                                        <div class="numbers-row">
                                            <input type="text" value="0" name="jml_balita" id="jml_balita" class="qty2 form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="text-danger">*Minimal <?= $wisata['min_orang'] ?> Orang</span>
                                </div>
                            </div>
                            <br>
                            <table class="table table_summary">
                                <tbody>

                                    <tr>
                                        <td>
                                            Subtotal Dewasa
                                        </td>
                                        <td class="text-right">
                                            <span id="subjml_dewasa_dis">0</span> x Rp. <span id="sub_harga_wisata"><?= format_rupiah($wisata['harga_wisata']) ?></span>
                                            <br />
                                            <span id="sub_dewasa_dis" class="text-danger">Rp 0</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Subtotal Balita
                                        </td>
                                        <td class="text-right">
                                            <span id="subjml_balita_dis">0</span> x <span id="sub_harga_wisata">Rp. <?= format_rupiah($wisata['harga_wisata'] / 2) ?></span> <br />
                                            <span id="sub_balita_dis" class="text-danger">Rp 0</span>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td>
                                            Total
                                        </td>
                                        <td class="text-right">
                                            <span id="total_harga">Rp 0</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if ($this->session->userdata('cust-iduser')) { ?>
                                <button type="submit" name="submit" id="submitBook" class="btn_full">Lanjut Pesan <i class="icon-left"></i></button>
                            <?php } else { ?>
                                <a href="<?= base_url('auth') ?>" class="btn_full">Masuk untuk pesan <i class="icon-lock-5"></i></a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <!--/box_style_1 -->

            </aside>
        </div>
        <!--End row -->

    </div>
    <!--End container -->
    <div class="white_bg">
        <div class="container margin_60">
            <div class="main_title">
                <h2>Wisata <span>Serupa</span> Lainnya</h2>
            </div>

            <div class="row">
                <?php foreach ($wisataSerupa as $w) { ?>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="tour_container">
                            <div class="img_container">
                                <a href="<?= base_url('wisata/' . $w['slug']) ?>">
                                    <img src="<?= base_url('assets/frontend/') ?>img/wisata/<?= $w['gambar_wisata'] ?>" width="800" height="533" class="img-fluid" alt="Image">
                                    <div class="short_info">
                                        <i class="icon-tags-1"></i><?= ucwords($w['kategori_wisata']) ?><span class="price"><sup>Rp</sup> <?= format_rupiah($w['harga_wisata']) ?></span>
                                    </div>
                                </a>
                            </div>
                            <div class="tour_title">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3><strong><?= strtoupper($w['nama_wisata']) ?></strong></h3>
                                    </div>
                                    <div class="col-md-3"><a href="<?= base_url('wisata/' . $w['slug']) ?>" class="btn btn-primary btn-sm btn-flat btn-block">Detail</a></div>
                                </div>
                            </div>
                        </div><!-- End box tour -->
                    </div><!-- End col -->
                <?php } ?>
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
    <div id="overlay"></div>
    <!-- Mask on input focus -->

</main>
<!-- End main -->