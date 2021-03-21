<footer id="pattern_2" class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 justify-content-center">
                <p><img src="<?= base_url('assets/frontend/') ?>img/logo.png" width="160" height="34" alt="City tours" data-retina="true" id="logo"></p>
                <p class="">City tours adalah jasa layanan pemandu wisata didaerah propinsi bengkulu. Kami menyediakan banyak pilihan paket perjalanan dan wisata yang menyenangkan dan tentunya dengan biaya terjangkau. Kami berkomitmen memberikan pelayanan terbaik untuk membuat liburan dan berwisata Anda menyenangkan.</p>
            </div>
            <div class="col-md-3 col-sm-12">
                <h3>Halaman</h3>
                <ul>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('wisata') ?>">Wisata</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="<?= base_url('auth') ?>">Login</a></li>
                    <li><a href="<?= base_url('auth/daftar') ?>">Daftar</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12">
                <h3>Hubungi Kami</h3>
                <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
                <p>Senin - Minggu 08.00 - 22.00 WIB</p>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="icon-twitter"></i></a></li>
                        <li><a href="http://gmail.com/" target="_blank"><i class="icon-email"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>
                    <p>© Citytours 2021</p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
    <form action="<?= base_url('wisata') ?>" role="search" id="searchform" method="post">
        <input value="" name="keyword" type="search" placeholder="Masukkan tempat wisata..." required />
        <button type="submit" name="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->

<div class="modal fade" id="detailOrder" tabindex="-1" aria-labelledby="detailOrderLabel" aria-hidden="true">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Common scripts -->
<script src="<?= base_url('assets/frontend/') ?>js/jquery-2.2.4.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/common_scripts_min.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="<?= base_url('assets/frontend/') ?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/revolution_func.js"></script>

<script src="<?= base_url('assets/frontend/') ?>js/tabs.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/theia-sticky-sidebar.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/cat_nav_mobile.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/functions.js"></script>
<script>
    const flashData = $(".flash-data").data("flashdata");
    const flashDanger = $(".flash-danger").data("flashdata");

    if (flashData) {
        Swal.fire({
            title: "Success",
            text: flashData,
            type: "success",
        });
    }
    if (flashDanger) {
        Swal.fire({
            title: "Warning",
            text: flashDanger,
            type: "warning",
        });
    }

    jQuery('#sidebar').theiaStickySidebar({
        additionalMarginTop: 60
    });
    $('#cat_nav').mobileMenu();
    $('input.date-pick').datepicker('setDate', 'today');
    $('input.time-pick').timepicker({
        minuteStep: 15,
        showInpunts: false
    })
    new CBPFWTabs(document.getElementById('tabs'));
</script>

</body>

</html>