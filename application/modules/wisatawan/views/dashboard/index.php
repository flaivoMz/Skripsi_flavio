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
                    <div id="tools">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="styled-select-filters">
                                    <select name="sort_type" id="sort_type">
                                        <option value="" selected>Sort by type</option>
                                        <option value="tours">Tours</option>
                                        <option value="hotels">Hotels</option>
                                        <option value="transfers">Transfers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="styled-select-filters">
                                    <select name="sort_date" id="sort_date">
                                        <option value="" selected>Sort by date</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="recent">Recent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/tools -->

                    <div class="strip_booking">
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="date">
                                    <span class="month">Dec</span>
                                    <span class="day"><strong>23</strong>Sat</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5">
                                <h3 class="hotel_booking">Hotel Mariott Paris<span>2 Adults / 2 Nights</span></h3>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <ul class="info_booking">
                                    <li><strong>Booking id</strong> 23442</li>
                                    <li><strong>Booked on</strong> Sat. 23 Dec. 2015</li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="booking_buttons">
                                    <!-- <a href="#0" class="btn_2">Edit</a> -->
                                    <a href="#0" class="btn_3">Batal</a>
                                </div>
                            </div>
                        </div>
                        <!-- End row -->
                    </div>
                    <!-- End strip booking -->


                </section>
                <!-- End section 1 -->

                <section id="section-3">
                    <div class="row justify-content-center">
                        <div class="col-md-6 add_bottom_30">
                            <h4>Edit Password</h4>
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input class="form-control" name="old_password" id="old_password" type="password">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input class="form-control" name="new_password" id="new_password" type="password">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Edit Password</button>
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
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" name="nama_wisatawan" type="text" value="<?= strtoupper($user['nama_wisatawan']) ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat_wisatawan" type="text" value="<?= $user['alamat_wisatawan'] ?>">
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
                                <input class="form-control" name="no_hp_wisatawan" type="text" value="<?= $user['no_hp_wisatawan'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Edit Profil</button>
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