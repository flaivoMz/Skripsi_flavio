<!-- Begin Page Content -->
<div class="container-fluid">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Data Pesanan</h1>

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
            <th>Trx</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Kab.Asal</th>
            <th>Kab.Tujuan</th>
            <th>Tarif</th>
            <th>Status</th>
            <th>Bayar</th>
            <th>Kurir</th>
            <th></th>
          </tr>
        </thead>
       
        <tbody>
        <?php
        $no=1;
        foreach($orders as $row){
        
        ?>
          <tr>
            <td><?= $row->id_order ?></td>
            <td><?= ucwords($row->nama) ?></td>
            <td><?= tanggal_indo($row->tanggal_order) ?></td>
            <td><?= ucwords($row->kabupaten_asal) ?></td>
            <td><?= ucwords($row->kabupaten_tujuan) ?></td>
            <td><?= format_rupiah($row->charge) ?></td>
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
             <td><?= $row->nama_rider=='' ? '-' : ucwords($row->nama_rider) ?></td>
             <th>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Aksi
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <a data-toggle="modal" data-target="#detailOrder" class="dropdown-item detail-order" href="#" data-orderid="<?= $row->id_order ?>" data-alamatasal="<?= $row->alamat_asal.' <b> [ '.$row->koordinat_asal.' </b>] ' ?>" data-alamattujuan="<?= $row->alamat_tujuan.' <b> [ '.$row->koordinat_tujuan.' ] </b>' ?>" data-jarak="<?= $row->jarak ?>" data-verifikasidriver="<?= ucwords($row->verifikasi_driver) ?>" data-notelppenerima="<?= $row->no_telp_penerima ?>" data-kodereferal="<?= $row->referal_code ?>" data-penerima="<?= ucwords($row->nama_penerima) ?>" data-volumebarang="<?= $row->volume_barang ?>" data-beratbarang="<?= $row->berat_barang ?>" data-catatan="<?= $row->catatan ?>" data-gambarpengambilan="<?= $row->gambar_pengambilan ?>" data-gambarpengantaran="<?= $row->gambar_pengantaran ?>" data-kondisibarang="<?= $row->kondisi_barang ?>" >Detail</a>
                  <?php if($row->nama_rider == ""){ ?>
                  <a data-toggle="modal" data-target="#formPilihKurir" data-orderid="<?= $row->id_order ?>" href="#" class="dropdown-item pilih-kurir text-danger">Pilih Kurir</a>
                  <?php } ?>
                  <?php if($row->status_pembayaran == "belum"){ ?>
                  <a class="dropdown-item button-konfirmasi text-success" data-konfirmasi="Ubah status bayar menjadi lunas" href="<?= base_url('admin/orders/lunas_bayar/').$row->id_order ?>">Lunas Bayar</a>
                  <?php } ?>
                  
                  </div>
                </div>
             </th>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="formPilihKurir" tabindex="-1" role="dialog" aria-labelledby="formPilihKurirLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formPilihKurirLabel">Pilih Kurir Untuk Orderan #<span class="pilihkurir-orderId"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="pilihkurir" action="<?= base_url('admin/orders/pilih_kurir') ?>" method="post">
          <div class="form-group">
            <label for="">Pilih Kurir</label>
            <input type="hidden" name="id_order" class="value_id_order">
            <select name="id_rider" class="select2 form-control" id="" required style="width: 100%;">
              <?php  
                foreach($drivers as $d){
                  echo "<option value='".$d->id_rider."'>".ucwords($d->nama_rider)."</option>";
                }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <input type="submit" form="pilihkurir" name="submit" class="btn btn-primary" value="Simpan">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailOrder" tabindex="-1" role="dialog" aria-labelledby="detailOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailOrderLabel">Detail Order #<span class="modal-orderId"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table width="100" class="table table-borderless">
            <tr>
                <th width="20%">Alamat Asal</th>
                <th>:</th>
                <td colspan="2" class="alamatasal"></td>
            </tr>
            <tr>
                <th>Alamat Tujuan</th>
                <th>:</th>
                <td colspan="2" class="alamattujuan"></td>
            </tr>
        </table>
        <div class="row">
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <th>Penerima</th>
                <td class="penerima"></td>
              </tr>
              <tr>
                <th>Telp. Penerima</th>
                <td class="notelppenerima"></td>
              </tr>
              <tr>
                <th>Jarak</th>
                <td class="jarak"></td>
              </tr>
              <tr>
                <th>Kode Referal</th>
                <td class="kodereferal"></td>
              </tr>
              <tr>
                <th>Kondisi</th>
                <td class="kondisibarang"></td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <th>Volume</th>
                <td class="volumebarang"></td>
              </tr>
              <tr>
                <th>Berat</th>
                <td class="beratbarang"></td>
              </tr>
              <tr>
                <th>Pengambilan</th>
                <td class=""><a href="" class="gambarpengambilan" target="_blank">Lihat Gambar</a></td>
              </tr>
              <tr>
                <th>Pengantaran</th>
                <td class=""><a href="" class="gambarpengantaran" target="_blank">Lihat Gambar</a></td>
              </tr>
              <tr>
                <th>Catatan</th>
                <td class="catatan"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
      </div>
    </div>
  </div>
</div>