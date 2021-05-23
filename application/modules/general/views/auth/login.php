<main>
    <section id="hero" class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div id="login">
                        <div class="text-center"><span class="h5">Silahkan Login</span></div>
                        <hr />
                        <form action="<?= base_url('auth') ?>" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class=" form-control " placeholder="Username" required value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class=" form-control" placeholder="Password" required>
                            </div>
                            <!-- <p class="small">
                                <a href="#">Forgot Password?</a>
                            </p> -->
                            <button type="submit" name="submit" class="btn_full">Masuk</button>
                            <a href="<?= base_url('auth/daftar') ?>" class="btn_full_outline"> Belum punya akun? Daftar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End main -->