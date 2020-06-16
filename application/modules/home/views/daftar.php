<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100-daftar">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo base_url();?>assets/frontend/img/anter_logo_crop.jpg" alt="IMG">
            </div>

            <form class="login100-form validate-form" action="<?php echo base_url()?>home/save_daftar" method="POST">
                <span class="login100-form-title">
                    Daftar Member
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="nama" placeholder="Masukkan Nama" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                    <i class="fa fa-user-circle"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" id="password" placeholder="Masukkan Password" required="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Masukkan email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="text" name="no_telpn"  placeholder="Masukkan Nomor Telepon" required="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <section class="container pt-3">
    <h3 class="text-center">Registrasi</h3>
    <?php echo form_open('home/save_daftar');?>
    <div class="row mt-3 mt-lg-5">
        <div class="col-12 col-md-6 pt-md-0 pt-2">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
        </div>
        <div class="col-12 col-md-6 pt-md-0 pt-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required="" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            <small id="passwordHelpBlock" class="form-text text-info">
            <i class='fa fa-info-circle'></i>&nbsp;Password berupa angka dengan panjang 6 karakter.
            </small>
        </div>
        <div class="col-12 col-md-6 pt-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="col-12 col-md-6 pt-2">
            <label for="no_telpn">Nomor Telpon</label>
            <input type="text" class="form-control" id="no_telpn" name="no_telpn" placeholder="Masukkan Nomortelpon" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14">
        </div>
        <div class="col-12 pt-2">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="10" placeholder="Masukkan Alamat" required></textarea>
        </div>
    </div>
    <div class="mt-3">
        <button class="btn btn-success btn-block text-uppercase">daftar</button>
    </div>
    <?php echo form_close();?>
</section> -->