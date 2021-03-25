<?php
if ($this->uri->segment(3) != "form-wisata") {

    $id_wisata = $detail['id_wisata'];
    $nama_wisata = $detail['nama_wisata'];
    $kategori_wisata = $detail['kategori_wisata'];
    $harga_wisata = $detail['harga_wisata'];
    $min_orang = $detail['min_orang'];
    $deskripsi = $detail['deskripsi'];
    $gambar_wisata = $detail['gambar_wisata'];
    $formType = "Edit";
} else {
    $id_wisata = null;
    $nama_wisata = null;
    $kategori_wisata = null;
    $harga_wisata = null;
    $min_orang = null;
    $deskripsi = null;
    $gambar_wisata = null;
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
        <div class="card-header bg-light">
            <span class="font-weight-semibold h5">Tambah Data Wisata</span>
        </div>
        <div class="card-body table-responsive">
            <form class="" id="formSiswa" action="<?= base_url('admin/wisata/simpan-wisata') ?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id_wisata" value="<?= $id_wisata ?>">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Nama Wisata</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="nama_wisata" required value="<?= $nama_wisata ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Kategori</label>
                    <div class="col-lg-10">
                        <select name="kategori_wisata" class="select-search form-control" required>
                            <option value="">- Pilih Kategori Wisata -</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= ucwords($k) ?>" <?= strtolower($kategori_wisata) == $k ? "selected" : "" ?>><?= strtoupper($k) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-4">Harga</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="number" name="harga_wisata" class="form-control" placeholder="Harga wisata per orang" required value="<?= $harga_wisata ?>">
                                    <span class="input-group-append">
                                        <span class="input-group-text">/orang</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-4 text-right">Minimal</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="number" name="min_orang" class="form-control" placeholder="Jumlah minimal wisatawan" required value="<?= $min_orang ?>">
                                    <span class="input-group-append">
                                        <span class="input-group-text">orang</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Gambar Wisata</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="gambar_lama" value="<?= $gambar_wisata ?>">
                        <input type="file" name="gambar_wisata" class="form-control-uniform" data-fouc <?= $formType == "Tambah" ? "requried" : "" ?>>
                        <span class="text-danger"><?= $formType == "Edit" ? "Kosongkan gambar jika tidak diubah" : "" ?></span>
                    </div>
                </div>
                <hr />
                <p class="font-weight-semibold h5">Deskripsi</p>
                <textarea name="deskripsi" id="editor-full" rows="4" cols="4"><?= $deskripsi ?></textarea>
            </form>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/wisata') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" name="submit" form="formSiswa" class="btn btn-primary" value="<?= $formType ?>">Simpan</button>
        </div>
    </div>
</div>