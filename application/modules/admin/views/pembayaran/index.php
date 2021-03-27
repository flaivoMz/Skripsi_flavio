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


<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header bg-light">
            <a href="#" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modalTambahBayar"><b><i class="fas fa-plus"></i></b> Data Bayar</a>
        </div>
        <div class="card-body table-responsive">
            <?= flash() ?>
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th width="3%">NO</th>
                        <th>KODE BOOKING</th>
                        <th>PEMESAN</th>
                        <th>TGL. BAYAR</th>
                        <th>NOMINAL</th>
                        <th>STATUS BAYAR</th>
                        <th>DIINPUT OLEH</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pembayaran as $s) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $s['kode_booking'] ?></td>
                            <td><?= ucwords($s['nama_pemesan']) ?></td>
                            <td><?= tanggal_indo($s['tgl_bayar']) ?></td>
                            <td><?= 'Rp.' . format_rupiah($s['nominal_bayar']) ?></td>
                            <td class="text-center"><?= $s['status_bayar'] == "dp" ? "<span class='badge badge-warning'>DP</span>" : "<span class='badge badge-success'>LUNAS</span>"  ?></td>
                            <td><?= $s['username'] ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item edit-bayar" data-toggle="modal" data-target="#modalEditBayar" data-idbayar="<?= $s['id_bayar'] ?>" data-idpesanan="<?= $s['id_pesanan'] ?>" data-tglbayar="<?= $s['tgl_bayar'] ?>" data-nominalbayar="<?= $s['nominal_bayar'] ?>" data-statusbayar="<?= $s['status_bayar'] ?>" data-kodebooking="<?= $s['kode_booking'] ?>" data-namawisata="<?= $s['nama_wisata'] ?>" data-namapemesan="<?= strtoupper($s['nama_pemesan']) ?>"><i class="icon-pencil5"></i> Edit</a>
                                            <a href="<?= base_url('admin/bayar/hapus_bayar/'.$s['id_bayar']) ?>" data-konfirmasi="Data pembayaran <?= $s['kode_booking'] ?> akan dihapus ?" class="dropdown-item button-konfirmasi"><i class="icon-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="card-footer"></div> -->
    </div>
</div>

<div class="modal fade" id="modalTambahBayar" aria-labelledby="modalTambahBayarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-semibold" id="modalTambahBayarLabel">Buat Pembayaran <span id="kode_booking"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahBayar" action="<?= base_url('admin/bayar/simpan_bayar') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Booking</label>
                        <select class="select-search form-control" name="id_pesanan" required>
                            <option value="">- Masukkan Kode Booking -</option>
                            <?php foreach ($pesanan as $p) { ?>
                                <option value="<?= $p['id_pesanan'] ?>"><?= '[ ' . $p['kode_booking'] . ' ] ' . strtoupper($p['nama_pemesan']) . ' - ' . $p['nama_wisata'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="datetime-local" name="tgl_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nominal Bayar</label>
                        <input type="number" step="0" name="nominal_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status Bayar</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status_bayar" class="form-check-input-styled-danger" required value="dp">
                                DP (Down Payment)
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status_bayar" class="form-check-input-styled-success" required value="lunas">
                                Lunas
                            </label>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('admin-iduser') ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" name="submit" value="Tambah" form="formTambahBayar" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!--  -->

<div class="modal fade" id="modalEditBayar" aria-labelledby="modalEditBayarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-semibold" id="modalEditBayarLabel">Edit Pembayaran <span id="kode_booking"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditBayar" action="<?= base_url('admin/bayar/simpan_bayar') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Booking</label>
                        <input type="hidden" name="id_bayar" id="idbayar" class="form-control" required>
                        <input type="hidden" name="id_pesanan" id="idpesanan" class="form-control" required>
                        <input type="text" name="idpesananlabel" id="idpesananlabel" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="datetime-local" name="tgl_bayar" id="tglbayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nominal Bayar</label>
                        <input type="number" step="0" name="nominal_bayar" id="nominalbayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status Bayar</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status_bayar" id="statusbayardp" class="" required value="dp">
                                DP (Down Payment)
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status_bayar" id="statusbayarlunas" class="" required value="lunas">
                                Lunas
                            </label>
                        </div>
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('admin-iduser') ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" name="submit" value="Edit" form="formEditBayar" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>