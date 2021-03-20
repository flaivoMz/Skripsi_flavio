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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
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
        <input value="" name="keyword" type="search" placeholder="Masukkan tempat wisata..." required/>
        <button type="submit" name="submit"><i class="icon_set_1_icon-78"></i>
        </button>
    </form>
</div><!-- End Search Menu -->


<!-- Common scripts -->
<script src="<?= base_url('assets/frontend/') ?>js/jquery-2.2.4.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/common_scripts_min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/functions.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="<?= base_url('assets/frontend/') ?>rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/revolution_func.js"></script>

<script src="<?= base_url('assets/frontend/') ?>js/tabs.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/theia-sticky-sidebar.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/cat_nav_mobile.js"></script>
<script src="<?= base_url('assets/frontend/') ?>js/sweetalert2.all.min.js"></script>
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