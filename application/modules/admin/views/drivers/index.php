<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Drivers Data</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-left-success">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('admin/drivers/create') ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Driver</a></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <?php if( $this->session->flashdata('success') ): ?>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Plat Number</th>
            <th>Join Date</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
       
        <tbody>
        <?php
        $no=1;
        foreach($drivers as $row){
        
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucwords($row->nama_rider) ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= strtoupper($row->plat_nomor) ?></td>
            <td><?= tanggal_indo($row->tanggal_bergabung) ?></td>
            <td><?= ucwords($row->status) ?></td>
            <th><a href="#" class="btn btn-success btn-sm">Detail</a></th>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->