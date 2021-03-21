<main>
    <section id="hero" class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-8">
                    <div id="login">
                        <div class="text-center"><span class="h5">Daftar</span></div>
                        <hr />

                        <form action="<?= base_url('auth/daftar') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" name="nama_wisatawan" type="text" value="<?= set_value('nama_wisatawan') ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat_wisatawan" type="text" value="<?= set_value('alamat_wisatawan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jekel_wisatawan" class="form-control">
                                    <option value="L">Laki - laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No. Handphone</label>
                                <input class="form-control" name="no_hp_wisatawan" type="text" value="<?= set_value('no_hp_wisatawan') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class=" form-control " placeholder="Username" required value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" minlength="5" placeholder="Password" required>
                            </div>
                            <button type="submit" name="submit" class="btn_full">Daftar</button>
                            <a href="<?= base_url('auth') ?>" class="btn_full_outline">Sudah punya akun? Masuk</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End main -->