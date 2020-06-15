<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orders Data</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 border-left-danger">
  <!-- <div class="card-header py-3"> -->
    <!-- <h6 class="m-0 font-weight-bold text-primary">Orders Data</h6> -->
  <!-- </div> -->
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th>Cost</th>
            <th>Order Status</th>
            <th>Paid Status</th>
            <th>Pay Method</th>
            <th></th>
          </tr>
        </thead>
       
        <tbody>
        <?php
        $no=1;
        foreach($orders as $row){
        
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->id_order ?></td>
            <td><?= ucwords($row->nama) ?></td>
            <td><?= tanggal_indo($row->tanggal_order) ?></td>
            <td>Rp. <?= format_rupiah($row->charge) ?></td>
            <td>
                <?php 
                $order = $row->status_order;
                if($order == "order"){
                    echo "<span class='badge badge-primary'>Order</span>";
                }else if($order == "proses"){
                    echo "<span class='badge badge-warning'>Proses</span>";
                }else{
                    echo "<span class='badge badge-success'>Selesai</span>";
                }
                ?>
            </td>
             <td><?= ucwords($row->status_pembayaran) ?></td>
             <td><?= ucwords($row->jenis_pembayaran) ?></td>
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