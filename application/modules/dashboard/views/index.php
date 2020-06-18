<?= $this->session->flashdata('message'); ?>
<section>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo base_url();?>assets/frontend/img/iklan/iklan.jpg" class="d-block w-100" alt="gambar_iklan">
            </div>
            <div class="carousel-item">
            <img src="<?php echo base_url();?>assets/frontend/img/iklan/iklan.jpg" class="d-block w-100" alt="gambar_iklan">
            </div>
            <div class="carousel-item">
            <img src="<?php echo base_url();?>assets/frontend/img/iklan/iklan.jpg" class="d-block w-100" alt="gambar_iklan">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <h1>Selamat Datang</h1>
        <span class="font-weight-bold text-uppercase"><?php echo $this->session->userdata('nama');?></span>
    </div>
</section>