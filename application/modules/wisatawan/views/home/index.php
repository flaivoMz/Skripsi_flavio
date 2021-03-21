<main>
    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="<?= base_url('assets/frontend/') ?>img/slides_bg/banner2.jpg" alt="slidebg1" data-lazyload="<?= base_url('assets/frontend/') ?>img/slides_bg/banner2.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Pilihan jasa pemandu wisata terbaik
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="color:#ffffff; font-size:16px; text-transform:uppercase">
                            City Tours / Tour Guides</div>
                    </div>
                    
                </li>
                <!-- SLIDE  -->
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
    <!-- End Slider -->

    <div class="container margin_60">
        <div class="main_title">
            <h2>Rekomendasi <span>Wisata</span></h2>
        </div>

        <div class="row">
            <?php foreach ($wisata as $w) { ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="tour_container">
                        <div class="ribbon_3 popular"><span>populer</span></div>
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

        <p class="text-center nopadding">
            <a href="<?= base_url('wisata') ?>" class="btn_1 medium"><i class="icon-eye-7"></i>View all tours </a>
        </p>
    </div><!-- End container -->

    <div class="white_bg">
        <div class="container margin_60">
            <div class="main_title">
                <h2>Kategori <span>Wisata</span> Populer</h2>
            </div>
            <div id="tabs" class="tabs">
                <nav>
                    <ul>
                        <?php
                        $i = 1;
                        foreach ($kategori as $k) {
                        ?>
                            <li><a href="#section-<?= $i ?>" class="bg-light list_tours_<?= strtolower($k['kategori']) ?>"><span><?= ucwords($k['kategori']) ?></span></a></li>
                        <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </nav>
                <div class="content">
                    <?php
                    $i = 1;
                    $ci = get_instance();
                    foreach ($kategori as $k) {
                        $wisataKat = $ci->db->get_where('paket_wisata', ['kategori_wisata' => $k['kategori']], 3)->result_array();
                    ?>
                        <section id="section-<?= $i ?>">
                            <div class="row list_tours_<?= strtolower($k['kategori']) ?>">
                                <?php foreach ($wisataKat as $w) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="tour_container">
                                            <div class="ribbon_3 popular"><span>populer</span></div>
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
                            </div>
                        </section>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
                <!-- /content -->
            </div>
            <!-- End tabs -->
        </div>
        <!-- End container -->
    </div>
    <!-- End white_bg -->


    <div class="container margin_60">

        <div class="main_title">
            <h2>Mengapa <span>Memilih</span> Kami ?</h2>
        </div>

        <div class="row">

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-41"></i>
                    <h3><span>+120</span> Wisata</h3>
                    <p>
                        Memiliki beragam destinasi perjalanan menarik, dan biaya terjangkau
                    </p>
                </div>
            </div>

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><span>+100</span> Pemandu</h3>
                    <p>
                        Wisata dipandu oleh para pemandu wisata yang berpengalaman dan ramah
                    </p>
                </div>
            </div>

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon-clock-alt"></i>
                    <h3><span>Proses </span> cepat</h3>
                    <p>
                        Proses booking hingga pembayaran mudah dan cepat. Dilayani customer service 24 jam
                    </p>
                </div>
            </div>

        </div>
        <!--End row -->

        <hr>

        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('assets/frontend/') ?>img/laptop.png" alt="Laptop" class="img-fluid laptop">
            </div>
            <div class="col-md-6">
                <h3><span>Mulai Perjalanan</span> bersama City Tours</h3>
                <p>
                    Cari destinasi dan pemandu wisata mudah dan cepat dengan langkah berikut
                </p>
                <ul class="list_order">
                    <li><span>1</span>Pilih Paket Wisata/ Perjalanan</li>
                    <li><span>2</span>Bayar DP Minimal 50%</li>
                    <li><span>3</span>Selesaikan Pembayaran Ketika Sudah Selesai Berwisata</li>
                </ul>
                <a href="all_tour_list.html" class="btn_1">Cari Wisata</a>
            </div>
        </div>
        <!-- End row -->

    </div>
    <!-- End container -->
</main>
<!-- End main -->