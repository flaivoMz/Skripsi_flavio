<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Customers Data</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-left-warning">
  <!-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Driver</a></h6>
  </div> -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
       
        <tbody>
        <?php
        $no=1;
        foreach($customers as $row){
        
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucwords($row->nama) ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->no_telpn ?></td>
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