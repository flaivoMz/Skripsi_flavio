<?php
if ($this->uri->segment(4)) {

    $id_calon = $detail['id_calon'];
    $id_ketua = $detail['id_ketua'];
    $id_wakil = $detail['id_wakil'];
    $photo = $detail['photo'];
    $visi_misi = $detail['visi_misi'];
    $kategori = $detail['kategori'];
    $id_periode = $detail['id_periode'];
    $id_parpol = $detail['id_parpol'];
    $formType = "Edit";
} else {
    $id_calon = null;
    $id_ketua = null;
    $id_wakil = null;
    $photo = null;
    $visi_misi = null;
    $kategori = null;
    $id_periode = null;
    $id_parpol = null;
    $formType = "Tambah";
}
?>
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header page-header-light" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; margin-bottom: 0;">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title">
                <h5>
                    <i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><?= $title ?></span>
                </h5>
            </div>

            <div class="header-elements py-0">
                <div class="breadcrumb">
                    <a href="<?= base_url('admin/dashboard') ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"><?= $title ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->

<div class="content">
    <div class="card">
        <div class="card-body table-responsive">
            <form class="" id="formSiswa" action="<?= base_url('admin/calon/simpan_calon') ?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_calon" value="<?= $id_calon ?>">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Nama Ketua</label>
                    <div class="col-lg-10">
                        <select name="id_ketua" class="select-search form-control" required>
                            <option value="">- Pilih Ketua -</option>
                            <?php foreach ($pemilih as $k) { ?>
                                <option value="<?= $k['id_pemilih'] ?>" <?= $id_ketua == $k['id_pemilih'] ? "selected" : "" ?>><?= $k['nik'] . ' - ' . strtoupper($k['nama']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Nama Wakil</label>
                    <div class="col-lg-10">
                        <select name="id_wakil" class="select-search form-control" required>
                            <option value="">- Pilih Wakil -</option>
                            <?php foreach ($pemilih as $k) { ?>
                                <option value="<?= $k['id_pemilih'] ?>" <?= $id_wakil == $k['id_pemilih'] ? "selected" : "" ?>><?= $k['nik'] . ' - ' . strtoupper($k['nama']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Periode Pilkada</label>
                    <div class="col-lg-10">
                        <select name="id_periode" class="select-search form-control" required>
                            <option value="">- Pilih Periode -</option>
                            <?php foreach ($periode as $k) { ?>
                                <option value="<?= $k['id_periode'] ?>" <?= $id_periode == $k['id_periode'] ? "selected" : "" ?>><?= $k['periode_jabatan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Kategori Pengusul</label>
                    <div class="col-lg-10">
                        <select name="kategori" class="form-control" required>
                            <option value="">- Pilih Kategori -</option>
                            <option value="independen" <?= $kategori == "independen" ? "selected" : "" ?>>INDEPENDEN</option>
                            <option value="parpol" <?= $kategori == "parpol" ? "selected" : "" ?>>PARTAI POLITIK</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row bg-light" id="parpol" style="display:none">
                    <label class="col-form-label col-lg-2">Partai Pengusul</label>
                    <div class="col-lg-10">
                        <div class="row">
                            <?php
                            if ($formType == "Edit") {
                                $partai = explode(',', $id_parpol);
                                // var_dump($partai);
                            } else {
                                $partai = [];
                            }
                            $i = 0;
                            foreach ($parpol as $p) {
                                $checked = "";
                                if (in_array($p['id_parpol'], $partai)) {
                                    $checked = "checked";
                                }
                                echo '<div class="col-md-3">';
                                echo '<div class="form-check">';
                                echo '<input type="checkbox" ' . $checked . ' class="form-check-input mr-2" name="parpol[]" value="' . $p['id_parpol'] . '"><label class="form-check-label">' . strtoupper($p['singkatan']) . '</label>';
                                echo '</div>';
                                echo '</div>';
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Foto Calon</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="photo_lama" value="<?= $photo ?>">
                        <input type="file" name="photo" class="form-control-uniform" data-fouc <?= $formType == "Tambah" ? "requried" : "" ?>>
                        <span class="text-danger"><?= $formType == "Edit" ? "Kosongkan gambar jika tidak diubah" : "" ?></span>
                    </div>
                </div>
                <hr />
                <p class="font-weight-semibold h5">Visi & Misi</p>
                <textarea name="visi_misi" id="editor-full" rows="4" cols="4"><?= $visi_misi ?></textarea>
            </form>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/calon') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" name="submit" form="formSiswa" class="btn btn-primary" value="<?= $formType ?>">Simpan</button>
        </div>
    </div>
</div>