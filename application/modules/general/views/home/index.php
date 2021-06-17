<?php
$statusPeriode = false;
if ((strtotime(Date('Y-m-d')) >= strtotime($periode['mulai_pilih'])) && (strtotime(Date('Y-m-d')) <= strtotime($periode['batas_pilih']))) {
    $statusPeriode = true;
}
?>
<!-- Page content -->
<div class="page-content pt-0">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content">
            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="<?= !$statusVote ? "col-md-12" : "col-md-8" ?>">
                            <div class="alert alert-info alert-styled-left">
                                <span class="font-weight-semibold">INFORMASI JADWAL PEMILU</span>
                                <?= !$statusPeriode ? '<span class="text-danger font-weight-semibold">[ PERIODE PEMILU SUDAH SELESAI ]</span>' : '' ?><br />
                                Pemilu akan dilaksanakan pada tanggal <span class="font-weight-bold"><?= tanggal_indo($periode['mulai_pilih']) . ' s/d ' . tanggal_indo($periode['batas_pilih']) ?></span>. Pemilihan dilakukan melalui website ini sesuai dengan waktu yang ditentukan
                            </div>
                        </div>
                        <?php if ($statusVote) { ?>
                            <div class="col-md-4">
                                <div class="alert alert-success alert-styled-left pb-4">
                                    <span class="font-weight-semibold">Anda sudah memilih. </span> Terima kasih sudah menggunakan hak pilih
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <?//= flash() ?>
                    <div class="card">
                        <div class="card-header bg-info-800">
                            <h5 class="card-title font-weight-semibold text-center">CALON PILKADA PERIODE <?= $periode['periode_jabatan'] ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <?php foreach ($calon as $c) { ?>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="card shadow bg-white rounded">
                                            <div class="card-img-actions mx-1 mt-1">
                                                <img class="card-img" src="<?= base_url('assets/images/calon/' . $c['photo']) ?>" alt="" height="300px">
                                                <div class="card-img-actions-overlay card-img">
                                                    <a href="<?= base_url('assets/images/calon/' . $c['photo']) ?>" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                                                        <i class="icon-plus3"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2 bg-danger-800 align-items-center">
                                                        <div class="text-center font-weight-bold col-md-12" style="font-size:40px;"><?= $c['no_urut'] ?></div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h6 class="font-weight-semibold mt-2"><?= strtoupper($c['nama_ketua']) ?></h6>
                                                        <h6 class="font-weight-semibold"><?= strtoupper($c['nama_wakil']) ?></h6>
                                                    </div>
                                                </div>
                                                <hr />
                                                <?php
                                                $ci = get_instance();
                                                if ($c['kategori'] == "parpol") {
                                                    $parpols = explode(',', $c['id_parpol']);
                                                    echo '<div class="text-center">';
                                                    foreach ($parpols as $id_parpol) {
                                                        if (trim($id_parpol) != "") {
                                                            $partai = $ci->ParpolModel->parpolById($id_parpol);

                                                            echo '<img src="' . base_url('assets/images/parpol/' . $partai['logo']) . '" class="img-fluid img-preview mt-1 ml-1" width="30px">';
                                                        }
                                                    }
                                                    echo '</div>';
                                                }else{
                                                    echo '<h5 class="font-weight-semibold text-center" style="line-height:38px;">PERSEORANGAN</h5>';
                                                }
                                                ?>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="<?= $statusPeriode && !$statusVote ? 'col-md-4' : 'col-md-12' ?> col-xs-12">
                                                        <button class="btn btn-lg bg-primary-800 btn-block mb-2 detail-visi-misi" data-toggle="modal" data-target="#calonModal" data-ketua="<?= $c['nama_ketua'] ?>" data-wakil="<?= $c['nama_wakil'] ?>" data-visimisi="<?= $c['visi_misi'] ?>">Visi Misi</button>
                                                    </div>
                                                    <?php
                                                    if ($statusPeriode) {
                                                    ?>
                                                        <div class="col-md-8 col-xs-12">
                                                            <?php
                                                            if ($this->session->userdata('pemilih-iduser')) {
                                                                if (!$statusVote) { ?>
                                                                    <a href="<?= base_url('vote/' . $c['id_calon']) ?>" class="btn btn-lg bg-success-800 btn-labeled btn-labeled-right btn-block button-konfirmasi" data-konfirmasi="Vote <?= strtoupper($c['nama_ketua']) ?> dan <?= strtoupper($c['nama_wakil']) ?> ?"><b><i class="fas fa-marker"></i></b> VOTE</a>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <a href="<?= base_url('masuk') ?>" class="btn btn-lg bg-orange-800 btn-labeled btn-labeled-right btn-block"><b><i class="fas fa-lock"></i></b> MASUK UNTUK VOTE</a>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow bg-white rounded">
                        <div class="card-body">
                            <span style="display:none" id="mulai_pilih"><?= $periode['mulai_pilih'] ?></span>
                            <h3 class="font-weight-bold text-center">MENUJU PILKADA <?= $periode['periode_jabatan'] ?></h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card rounded border-success bg-slate-800">
                                        <div class="card-body text-center font-weight-bold col-md-12">
                                            <span class="" id="hari" style="font-size:30px;">00</span><br />
                                            <span>HARI</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card rounded border-success bg-slate-800">
                                        <div class="card-body text-center font-weight-bold col-md-12">
                                            <span class="" id="jam" style="font-size:30px;">00</span><br />
                                            <span>JAM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card rounded border-success bg-slate-800">
                                        <div class="card-body text-center font-weight-bold col-md-12">
                                            <span class="" id="menit" style="font-size:30px;">00</span><br />
                                            <span>MENIT</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card rounded border-success bg-slate-800">
                                        <div class="card-body text-center font-weight-bold col-md-12">
                                            <span class="" id="detik" style="font-size:30px;">00</span><br />
                                            <span>DETIK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /main charts -->
        </div>
        <!-- /content area -->
    </div>
    <!-- /main content -->
</div>


<div class="modal fade" id="calonModal" tabindex="-1" aria-labelledby="calonModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info-800">
                <h5 class="modal-title" id="calonModal"><span id="ketua"></span> & <span id="wakil"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="visi_misi"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>