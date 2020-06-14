<!-- Banner Area Start -->
<section class="jobguru-banner-area">
    <div class="banner-slider owl-carousel">
    <div class="banner-single-slider slider-item-1">
        <div class="slider-offset"></div>
    </div>
    <div class="banner-single-slider slider-item-2">
        <div class="slider-offset"></div>
    </div>
    </div>
    <div class="banner-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-search">
                <h2>Hire expert freelancers.</h2>
                <h4>We have 1542 job offers for you! </h4>
                <form>
                    <div class="banner-form-box">
                        <div class="banner-form-input">
                            <input type="text" placeholder="Job Title, Keywords, or Phrase">
                        </div>
                        <div class="banner-form-input">
                            <input type="text" placeholder="City, State or ZIP">
                        </div>
                        <div class="banner-form-input">
                            <select class="banner-select">
                            <option selected="">Select Sector</option>
                            <option value="1">Design & multimedia</option>
                            <option value="2">Programming & tech</option>
                            <option value="3">Accounting/finance</option>
                            <option value="4">content writting</option>
                            <option value="5">Training</option>
                            <option value="6">Digital Marketing</option>
                            </select>
                        </div>
                        <div class="banner-form-input">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Banner Area End -->


<!-- Categories Area Start -->
<section class="jobguru-categories-area section_70">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="site-heading">
                <h2>Job <span>Categories</span></h2>
                <p>A better career is out there. We'll help you find it. We're your first step to becoming everything you want to be.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach($kategori_pekerjaan as $row){ ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="#" class="single-category-holder account_cat">
                <div class="category-holder-icon">
                <i class="<?= $row->icon ?>"></i>
                </div>
                <div class="category-holder-text">
                <h3><?= ucwords($row->nama_kategori_pek) ?></h3>
                </div>
                <img src="<?= base_url() ?>assets\img\<?= $row->background_image ?>" alt="category">
            </a>
        </div>
        <?php } ?>
    </div>
   
    </div>
</section>
<!-- Categories Area End -->


<!-- Inner Hire Area Start -->
<section class="jobguru-inner-hire-area section_100">
    <div class="hire_circle"></div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="inner-hire-left">
                <h3>Hire an employee</h3>
                <p>placerat congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandit nunc.congue dui rhoncus sem et blandit .et consectetur Fusce nec nunc lobortis lorem ultrices facilisis. Ut dapibus placerat blandi </p>
                <a href="#" class="jobguru-btn-3">sign up as company</a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Inner Hire Area End -->


<!-- Job Tab Area Start -->
<section class="jobguru-job-tab-area section_70">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="site-heading">
                <h2>Companies & <span>job offers</span></h2>
                <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class=" job-tab">
                <ul class="nav nav-pills job-tab-switch" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-companies-tab" data-toggle="pill" href="#pills-companies" role="tab" aria-controls="pills-companies" aria-selected="true">top Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="false">job openning</a>
                </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-companies" role="tabpanel" aria-labelledby="pills-companies-tab">
                <div class="top-company-tab">
                    <ul>
                        <?php 
                        foreach($perusahaan as $row){ 
                            $explode_alamat = explode(",",$row->alamat_perusahaan); 
                            $lokasi_perusahaan = $explode_alamat[count($explode_alamat) - 2].', '.end($explode_alamat);
                        ?>
                        <li>
                            <div class="top-company-list">
                            <div class="company-list-logo">
                                <a href="#">
                                <img src="<?= base_url() ?>assets\img\logo_perusahaan\<?= $row->logo_perusahaan ?>" alt="<?= ucwords($row->nama_perusahaan) ?>">
                                </a>
                            </div>
                            <div class="company-list-details">
                                <h3><a href="#"><?= ucwords($row->nama_perusahaan) ?> - <?= ucwords($row->nama_kategori_per) ?></a></h3>
                                <p class="company-state"><i class="fa fa-map-marker"></i> <?= ucwords($lokasi_perusahaan) ?></p>
                                <p class="open-icon"><i class="fa fa-briefcase"></i>32 open position</p>
                                <!-- <p class="varify"><i class="fa fa-check"></i>Verified</p> -->
                                <!-- <p class="rating-company">4.9</p> -->
                            </div>
                            <div class="company-list-btn">
                                <a href="#" class="jobguru-btn">view profile</a>
                            </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
                <div class="tab-pane fade" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                <div class="top-company-tab">
                    <ul>
                        <?php
                        foreach($jobOpening as $row){
                        $explode = explode(",",$row->lokasi_pekerjaan); 
                        $lokasi = $explode[count($explode) - 2].', '.end($explode);
                        ?>
                        <li>
                            <div class="top-company-list">
                            <div class="company-list-logo">
                                <a href="#">
                                <img src="<?= base_url() ?>assets\img\logo_perusahaan\<?= $row->logo_perusahaan ?>" alt="<?= ucwords($row->nama_perusahaan) ?>">
                                </a>
                            </div>
                            <div class="company-list-details">
                                <h3><a href="#"><?= ucwords($row->nama_lowongan) ?></a></h3>
                                <p class="company-state"><i class="fa fa-map-marker"></i> <?= ucwords($lokasi) ?></p>
                                <p class="open-icon"><i class="fa fa-calendar"></i><?= tanggal_indo($row->date_start).' - '.tanggal_indo($row->date_end) ?></p>
                                <p class="varify"><i class="fa fa-money"></i>Salary : <?= $row->gaji_min.' - '.$row->gaji_max ?></p>
                                <!-- <p class="rating-company">4.1</p> -->
                            </div>
                            <div class="company-list-btn">
                                <a href="#" class="jobguru-btn">apply now</a>
                            </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="load-more">
                <a href="#" class="jobguru-btn">browse more listing</a>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Job Tab Area End -->


<!-- Video Area Start -->
<section class="jobguru-video-area section_100">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="video-container">
                <h2>Hire experts freelancers today for <br> any job, any time.</h2>
                <div class="video-btn">
                <a class="popup-youtube" href="..\..\watch.html?v=k-R6AFn9-ek">
                <i class="fa fa-play"></i>
                how it works
                </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Video Area End -->


<!-- How Works Area Start -->
<section class="how-works-area section_70">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="site-heading">
                <h2>how it <span>works</span></h2>
                <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="how-works-box box-1">
                <img src="<?= base_url() ?>assets\img\arrow-right-top.png" alt="works">
                <div class="works-box-icon">
                <i class="fa fa-user"></i>
                </div>
                <div class="works-box-text">
                <p>sign up</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="how-works-box box-2">
                <img src="<?= base_url() ?>assets\img\arrow-right-bottom.png" alt="works">
                <div class="works-box-icon">
                <i class="fa fa-gavel"></i>
                </div>
                <div class="works-box-text">
                <p>post job</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="how-works-box box-3">
                <div class="works-box-icon">
                <i class="fa fa-thumbs-up"></i>
                </div>
                <div class="works-box-text">
                <p>choose expert</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- How Works Area End -->


<!-- Blog Area Start -->
<section class="jobguru-blog-area section_70">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="site-heading">
                <h2>Recent From <span>Blog</span></h2>
                <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <a href="#">
                <div class="single-blog">
                <div class="blog-image">
                    <img src="<?= base_url() ?>assets\img\blog-1.jpeg" alt="blog image">
                    <p><span> 21</span> July</p>
                </div>
                <div class="blog-text">
                    <h3>If you're having trouble coming up with</h3>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-12">
            <a href="#">
                <div class="single-blog">
                <div class="blog-image">
                    <img src="<?= base_url() ?>assets\img\blog-2.jpeg" alt="blog image">
                    <p><span> 21</span> July</p>
                </div>
                <div class="blog-text">
                    <h3>details about Apple’s new iPad Pro models</h3>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-12">
            <a href="#">
                <div class="single-blog">
                <div class="blog-image">
                    <img src="<?= base_url() ?>assets\img\blog-3.jpeg" alt="blog image">
                    <p><span> 21</span> July</p>
                </div>
                <div class="blog-text">
                    <h3>what are those Steps to be a Successful developer</h3>
                </div>
                </div>
            </a>
        </div>
    </div>
    </div>
</section>
<!-- Blog Area End -->