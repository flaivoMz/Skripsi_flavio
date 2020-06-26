
<div class="limiter">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo base_url();?>assets/frontend/img/anter_logo_crop.jpg" alt="IMG">
            </div>
            <form class="login100-form validate-form" action="<?php echo base_url()?>home/login" method="POST">
                <span class="login100-form-title">
                    Login
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="no_telpn" id="no_telpn" placeholder="Masukkan Nomor Telpon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" required="">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" id="password" placeholder="Masukkan Password" required="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                <div class="text-center p-t-136">
                    <a class="txt2 btn btn-primary text-white btn-sm" href="<?php echo base_url('home/daftar');?>">
                        Daftar
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <section class="container mt-5">
    <div class="col-md-4 col-8 mx-auto">
        <img src="<?php echo base_url();?>assets/frontend/img/anter_logo_crop.jpg" alt="logo-anter" class="img-fluid">
    </div>
    <div class="mt-3">
        <?php echo form_open('home/login')?>
        <div class="form-group">
            <label for="no_telpn">Nomor Telpon</label>
            <input type="text" class="form-control" name="no_telpn" id="no_telpn" placeholder="Masukkan Nomor Telpon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" required="">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required="" maxlength="6">
        </div>
        <div class="">
            <button class="btn btn-success btn-block text-uppercase" type="submit">masuk</button>
            <a href="<?php echo base_url('home/daftar');?>" class="btn btn-primary btn-block text-uppercase">daftar</a>
        </div>
        <?php echo form_close();?>
    </div>
</section> -->