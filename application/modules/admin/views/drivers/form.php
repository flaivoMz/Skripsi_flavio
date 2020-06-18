<?php
    if($this->uri->segment(4) !== NULL){
        
        $id_rider = $driver->id_rider;
        $nama_rider = $driver->nama_rider;
        $alamat = $driver->alamat;
        $plat_nomor = $driver->plat_nomor;
        $tanggal_bergabung = $driver->tanggal_bergabung;
        $status = $driver->status;
        $url = base_url('admin/drivers/update');
        $submit = "Edit";
    }else{
        $id_rider=NULL;
        $nama_rider = NULL;
        $alamat = NULL;
        $plat_nomor = NULL;
        $tanggal_bergabung = NULL;
        $status = NULL;
        $url = base_url('admin/drivers/store');
        $submit="Tambah";
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-left-success">
  <!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
        <form action="<?= $url ?>" method="post" id="driver">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_rider">Nama</label>
                        <input type="hidden" name="id_rider" value="<?= $id_rider ?>">
                        <input type="text" class="form-control" name="nama_rider" id="name" placeholder="Driver name" required value="<?= $nama_rider ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="3" required><?= $alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="plat_nomor">No. Plat</label>
                        <input type="text" class="form-control" name="plat_nomor" minlength="5" required value="<?= $plat_nomor ?>">
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="tanggal_bergabung">Tanggal Bergabung</label>
                        <?php if($submit == "Edit"){ ?>
                        <input type="text" class="form-control" readonly value="<?= tanggal_indo($tanggal_bergabung) ?>">
                        <?php }else{ ?>
                        <input type="datetime-local" class="form-control" name="tanggal_bergabung" min="5" required value="<?= $tanggal_bergabung ?>">
                    <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="number" class="form-control" name="password" minlength="6" required <?= $submit=="Edit" ? "readonly" : "" ?>>
                        <small id="emailHelp" class="form-text text-muted"><?= $submit=="Edit" ? "password hanya bisa di edit oleh driver masing-masing" : "Password berupa pin dengan panjang 6 digit angka" ?></small>

                    </div>
                    <label for="status">Status Kurir</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="aktif" <?= $status=="aktif" ? "checked" : "" ?>>
                        <label class="form-check-label" for="status1">
                            Aktif
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="tidak" <?= $status=="tidak" ? "checked" : "" ?>>
                        <label class="form-check-label" for="status2">
                            Tidak Aktif
                        </label>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    
  </div>
  <div class="card-footer">
    <a href="<?= base_url('admin/drivers') ?>" class="btn btn-secondary ml-3">Batal</a>
    <input type="submit" name="submit" form="driver" class="btn btn-primary" value="<?= $submit ?>">
    </div>
</div>

</div>
<!-- /.container-fluid -->