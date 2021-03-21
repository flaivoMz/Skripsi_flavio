<?php
    if(!$this->session->userdata('cust-iduser')){
        redirect('auth');
    }
    $id_wisata = $this->input->post('id_wisata');
    $nama_wisata = $this->input->post('nama_wisata');
    $jml_dewasa = $this->input->post('jml_dewasa');
    $jml_balita = $this->input->post('jml_balita');
    $harga_dewasa = $this->input->post('harga_dewasa');
    $subtotal_dewasa = $this->input->post('subtotal_dewasa');
    $harga_balita = $this->input->post('harga_balita');
    $subtotal_balita = $this->input->post('subtotal_balita');
    $tgl_wisata = $this->input->post('tgl_wisata');
    $jam_wisata = $this->input->post('jam_wisata');
    $total = $subtotal_dewasa + $subtotal_balita;
    $datetime = date("c", strtotime($tgl_wisata . ' ' . $jam_wisata));
    $waktu_wisata = substr($datetime,0,10).' '.substr($datetime,11,8);
    

?>
<section id="hero_2">
    <div class="intro_title">
        <h1>Lengkapi Pesanan</h1>
        <div class="bs-wizard row">

            <div class="col-4 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum">Pilih Wisata</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
            </div>

            <div class="col-4 bs-wizard-step active">
                <div class="text-center bs-wizard-stepnum">Detail Pemesan</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
            </div>

            <div class="col-4 bs-wizard-step disabled">
                <div class="text-center bs-wizard-stepnum">Selesai</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
            </div>

        </div>
        <!-- End bs-wizard -->
    </div>
    <!-- End intro-title -->
</section>
<!-- End Section hero_2 -->

<main>
    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Wisata</a>
                </li>
                <li>Form Pesan</li>
            </ul>
        </div>
    </div>
    <!-- End position -->


    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-8 add_bottom_15">

                <div class="form_title">
                    <h3><strong>1</strong>Detail Pemesan</h3>

                </div>
                <form action="<?= base_url('wisata/pesan') ?>" method="post">
                    <input type="hidden" name="id_wisata" value="<?= $id_wisata ?>">
                    <input type="hidden" name="jml_dewasa" value="<?= $jml_dewasa ?>">
                    <input type="hidden" name="jml_balita" value="<?= $jml_balita ?>">
                    <input type="hidden" name="total_bayar" value="<?= $total ?>">
                    <input type="hidden" name="tgl_wisata" value="<?= $waktu_wisata ?>">
                    <div class="step">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pemesan</label>
                                    <input type="text" name="nama_pemesan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>No Handphone</label>
                                    <input type="text" name="no_hp_pemesan" class="form-control" required>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--End step -->
                    <div id="policy">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="policy_terms" id="policy_terms" required> Saya telah menyetujui syarat & ketentuan.</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </form>
            </div>

            <aside class="col-lg-4" id="sidebar">
                <div class="theiaStickySidebar">
                    <div class="box_style_1" id="booking_box">
                        <h3 class="inner">- Pesanan -</h3>
                        <div class="text-center font-weight-bold" style="font-size: 14px;">
                            <?= strtoupper($this->input->post('nama_wisata')) ?>
                        </div>
                        <table class="table table_summary mt-3">
                            <tbody>
                                <tr>
                                    <td>
                                        Subtotal Dewasa
                                    </td>
                                    <td class="text-right">
                                        <?= $jml_dewasa ?> x Rp. <?= format_rupiah($harga_dewasa) ?>
                                        <br />
                                        <span class="text-danger">Rp <?= format_rupiah($subtotal_dewasa) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Subtotal Balita
                                    </td>
                                    <td class="text-right">
                                        <?= $jml_balita ?> x Rp. <?= format_rupiah($harga_balita) ?>
                                        <br />
                                        <span class="text-danger">Rp <?= format_rupiah($subtotal_balita) ?></span>
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        Total
                                    </td>
                                    <td class="text-right">
                                        <span>Rp <?= format_rupiah($total) ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End sticky -->
            </aside>

        </div>
        <!--End row -->
    </div>
    <!--End container -->
</main>
<!-- End main -->