<!-- Begin Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-left-success">
  <!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
        <form action="<?= base_url('admin/drivers/store') ?>" method="post" id="driver">
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_rider">Name</label>
                        <input type="text" class="form-control" name="nama_rider" id="name" placeholder="Driver name" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address</label>
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="plat_nomor">Plat Number</label>
                        <input type="text" class="form-control" name="plat_nomor" minlength="5" required>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="tanggal_bergabung">Join Date</label>
                        <input type="datetime-local" class="form-control" name="tanggal_bergabung" min="5" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" minlength="5" required>
                    </div>
                    <label for="status">Driver Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="aktif" checked>
                        <label class="form-check-label" for="status1">
                            Active
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="tidak">
                        <label class="form-check-label" for="status2">
                            Nonactive
                        </label>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    
  </div>
  <div class="card-footer">
    <a href="<?= base_url('admin/drivers') ?>" class="btn btn-danger ml-3">Cancel</a>
    <input type="submit" name="submit" form="driver" class="btn btn-primary" value="Save">
    </div>
</div>

</div>
<!-- /.container-fluid -->