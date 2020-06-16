<?= $this->session->flashdata('message'); ?>
<section class="container mt-5">
    <h2 class="text-center">Halaman Order</h2>
    <div class="row mt-4">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    Data Pengirim
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_order">ID ORDER</label>
                        <input type="text" class="form-control" id="id_order" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" id="pengirim" readonly value="<?php echo $this->session->userdata('nama');?>">
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Masukkan nama penerima" required="">
                    </div>
                    <div class="form-group">
                        <label for="no_tlpn_penerima">Nomor Telpon Penerima</label>
                        <input type="text" class="form-control" id="no_tlpn_penerima" name="no_tlpn_penerima" placeholder="Masukkan nomor telpon penerima" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" required="">
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required>
                            <option>Pilih Metode Pembayaran</option>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                            <option value="cicilan">Cicilan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_asal">Alamat Asal</label>
                        <textarea name="alamat_asal" id="alamat_asal" class="form-control" placeholder="Masukkan alamat asal" required=""></textarea>
                        <input type="hidden" name="koordinat_asal" value="">
                    </div>
                    <div class="form-group">
                        <label for="alamat_tujuan">Alamat Tujuan</label>
                        <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" placeholder="Masukkan alamat asal" required=""></textarea>
                        <input type="hidden" name="koordinat_tujuan" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    List Barang
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

</section>