<?= $this->session->flashdata('message'); ?>
<?php
    $jumlah = $this->db->count_all('order_customer')+1;
    $level  = $customer['level'];
    $dt     = explode(" ",$customer['tanggal_bergabung']);
    $date   = explode("-",$dt[0]);
    $thn    = substr($date[0],2);
    $bln    = $date[1];

    if($level=="customer"){
        $level_user = "CC";
    }else if($level=="member"){
        $level_user = "MM";
    }else{
        $level_user = "B2B";
    }
    if($jumlah >= 1){
        $running_number = '000000'.$jumlah; 
    }else if($jumlah >9 && $jumlah< 100){
        $running_number = '00000'.$jumlah;
    }else if($jumlah >100 && $jumlah< 1000){
        $running_number = '0000'.$jumlah;
    }else if($jumlah >1000 && $jumlah< 10000){
        $running_number = '000'.$jumlah;
    }else if($jumlah >10000 && $jumlah< 100000){
        $running_number = '00'.$jumlah;
    }else if($jumlah >100000 && $jumlah< 1000000){
        $running_number = '0'.$jumlah;
    }else{
        $running_number = $jumlah;
    }
    $id_orderan = $level_user.$thn.$bln.$running_number;
?>
<div class="site-section-cover overlay inner-page bg-light" style="background-image: url('<?php echo base_url();?>assets/frontend/depan/images/box.jpg')" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-10">
                <div class="box-shadow-content">
                    <div class="block-heading-1">
                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Order Paket</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 blog-content mt-3 mt-md-0 order-last order-md-first">
                <?php echo form_open('order/save_to_order');?>
                <div class="card">
                    <div class="card-header">
                        Data Pengirim
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_order">ID ORDER</label>
                            <input type="text" class="form-control"  id="id_order" name="id_order" value="<?php echo $id_orderan; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="alamat_asal">Alamat Asal</label>
                            <?php if(isset($_SESSION['alamat_asal'])&&$_SESSION['alamat_asal']!=""):?>
                                <textarea name="alamat_asal" id="alamat_asal" class="form-control" placeholder="Masukkan alamat asal" required="" onclick="gotoAsal()"><?php echo $_SESSION['alamat_asal']['alamat']?></textarea>
                                <input type="hidden" name="koordinat_asal" value="<?php echo $_SESSION['alamat_asal']['koordinat']?>">
                                <input type="hidden" name="kabupaten_asal" value="<?php echo $_SESSION['alamat_asal']['kabupaten']?>">
                            <?php else:?>
                                <textarea name="alamat_asal" id="alamat_asal" class="form-control" placeholder="Masukkan alamat asal" required="" onclick="gotoAsal()"></textarea>
                            <?php endif;?>
                        </div>
                        <div class="form-group">
                            <label for="alamat_tujuan">Alamat Tujuan</label>
                            <?php if(isset($_SESSION['alamat_penerima'])&&$_SESSION['alamat_penerima']!=""):?>
                                <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" placeholder="Masukkan alamat asal" required="" onclick="gotoPenerima()"><?php echo $_SESSION['alamat_penerima']['alamat']?></textarea>
                                <input type="hidden" name="koordinat_tujuan" value="<?php echo $_SESSION['alamat_penerima']['koordinat']?>">
                                <input type="hidden" name="kabupaten_tujuan" value="<?php echo $_SESSION['alamat_penerima']['kabupaten']?>">
                            <?php else:?>
                                <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" placeholder="Masukkan alamat asal" required="" onclick="gotoPenerima()"></textarea>
                            <?php endif;?>
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim" readonly value="<?php echo $this->session->userdata('nama');?>">
                        </div>
                        <div class="form-group">
                            <label for="no_tlpn_pengirim">Nomor Telpon Pengirim</label>
                            <input type="text" class="form-control" id="no_tlpn_pengirim" name="no_tlpn_pengirim" placeholder="Masukkan nomor telpon penerima" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="14" required="">
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
                            <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required="">
                                <option disabled>Pilih Metode Pembayaran</option>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                                <option value="cicilan">Cicilan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="referal_code">Referal Code</label>
                            <input type="text" class="form-control" id="referal_code" name="referal_code" placeholder="Masukkan referal code">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span class="float-left" id="judulOngkir">Ongkir</span>
                            </div>
                            <div class="col-6">
                                <span class="float-right" id="nominalOngkir"></span>
                                <input type="hidden" id="jarak" name="jarak">
                                <input type="hidden" id="inputNominalOngkir" name="nominal_ongkir">
                            </div>
                            <div class="col-6">
                                <span class="float-left">Subtotal</span>
                            </div>
                            <div class="col-6">
                                <span class="float-right"><?php echo number_format($sub_total['total'],0,'.','.'); ?></span>
                                <?php if($sub_total['total'] =="" || $sub_total['total'] == 0):?>
                                    <input type="hidden" id="inputNominalSubtotal" name="nominal_subtotal" value="0">
                                <?php else:?>
                                    <input type="hidden" id="inputNominalSubtotal" name="nominal_subtotal" value="<?php echo $sub_total['total'];?>">
                                <?php endif;?>
                            </div>
                            <div class="col-6">
                                <span class="float-left">Total</span>
                            </div>
                            <div class="col-6">
                                <span class="float-right" id="nominalTotal"></span>
                                <input type="hidden" name="nominal_total" id="inputNominalTotal">
                            </div>
                        </div>
                        <hr class="style-two">
                        <span class="text-danger font-weight-bold">*Sebelum di verifikasi oleh driver harga bisa berubah</span><br>
                        <span class="font-weight-bold" data-toggle="modal" data-target="#modalPersyaratan" style="cursor:pointer">*Selengkapnya tentang persyaratan pengiriman</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="sudah" id="verifikasi_customer" name="verifikasi_customer" required="">
                            <label class="form-check-label" for="verifikasi_customer">
                                Menyetujui Persyaratan Pengiriman.
                            </label>
                        </div>
                        <button class="btn btn-success btn-block text-uppercase mt-2" type="submit">order</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
            <div class="col-md-6 sidebar  order-first order-md-last">
                <div class="card">
                    <div class="card-header">
                        List Barang
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary <?php if(count($tmp_order) > 0){ echo "d-none"; }?>" type="button" onclick="tambahBarang()">Masukkan Barang</button>
                        <?php if($tmp_order !=""):?>
                            <?php foreach($tmp_order as $tmp):?>
                            <div class="row border rounded mt-3">
                                <div class="col-md-4 py-md-2 pt-5 d-none d-md-block">
                                    <img src="<?php echo base_url()?>assets/frontend/img/box.png" alt="box" class="img-fluid">
                                </div>
                                <div class=" col-12 col-md-8 py-2 row">
                                    <div class="col-6">Volume</div>
                                    <div class="col-6"><?php echo $tmp['volume_barang']; ?></div>
                                    <div class="col-6">Berat</div>
                                    <div class="col-6"><?php echo number_format($tmp['berat_barang'],1,'.','.'); ?>&nbsp;kg</div>
                                    <div class="col-6">Total</div>
                                    <div class="col-6"><?php echo number_format($tmp['total'],0,'.','.'); ?></div>
                                    <div class="col-12">
                                        <span class="text-success" style="cursor:pointer;" onclick="editTmp(<?php echo $tmp['id_barang'];?>)">Edit</span>&nbsp;||&nbsp;<span class="text-danger" onclick="hapusTmp(<?php echo $tmp['id_barang']; ?>)" style="cursor:pointer;">Hapus</span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('order/save_order_detail_customer_tmp');?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_order_db">ID ORDER</label>
                    <input type="text" class="form-control" id="id_order_db" name="id_order_db" value="<?php echo $id_orderan; ?>" readonly>
                </div>
                <small class="form-text text-info"><i class="fa fa-info-circle"></i> Satuan volume dalam cm</small>
                <div class="form-group row">
                    <div class="col">
                        <label for="panjang">Panjang</label>
                        <input type="number" min="1" max="40" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  class="form-control" id="panjang" name="panjang" placeholder="P" required>
                    </div>
                    <div class="col">
                        <label for="lebar">Lebar</label>
                        <input type="number" min="1" max="40" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="lebar" name="lebar" placeholder="L" required>
                    </div>
                    <div class="col">
                        <label for="tinggi">Tinggi</label>
                        <input type="number" min="1" max="40" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="tinggi" name="tinggi" placeholder="T" required>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="overweight" value="overweight" name="berat_barang[]">
                            <label class="form-check-label" for="overweight">Overweight</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="oversize" value="oversize" name="berat_barang[]">
                            <label class="form-check-label" for="oversize">Oversize</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="normal" value="normal" name="berat_barang[]">
                            <label class="form-check-label" for="normal">Normal</label>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <input type="hidden" name="berat_barang" value="normal">
                    <textarea class="form-control" name="catatan" id="catatan" name="catatan" placeholder="Masukkan catatan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submot" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- Modal Tambah Edit -->
<div class="modal fade" id="modalBarangEdit" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('order/update_order_detail_customer_tmp');?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_order_db_edit">ID ORDER</label>
                    <input type="text" class="form-control" id="id_order_db_edit" name="id_order_db" value="<?php echo $id_orderan; ?>" readonly>
                </div>
                <small class="form-text text-info"><i class="fa fa-info-circle"></i> Satuan volume dalam cm</small>
                <div class="form-group row">
                    <div class="col">
                        <label for="panjang_edit">Panjang</label>
                        <input type="text" class="form-control" id="panjang_edit" name="panjang" placeholder="P" required>
                    </div>
                    <div class="col">
                        <label for="lebar_edit">Lebar</label>
                        <input type="text" class="form-control" id="lebar_edit" name="lebar" placeholder="L" required>
                    </div>
                    <div class="col">
                        <label for="tinggi_edit">Tinggi</label>
                        <input type="text" class="form-control" id="tinggi_edit" name="tinggi" placeholder="T" required>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="overweight_edit" value="overweight" name="berat_barang[]">
                            <label class="form-check-label" for="overweight_edit">Overweight</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="oversize_edit" value="oversize" name="berat_barang[]">
                            <label class="form-check-label" for="oversize_edit">Oversize</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="normal_edit" value="normal" name="berat_barang[]">
                            <label class="form-check-label" for="normal_edit">Normal</label>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <label for="catatan_edit">Catatan</label>
                    <textarea class="form-control" name="catatan" id="catatan_edit" name="catatan" placeholder="Masukkan catatan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_barang" id="idBarang">
                <input type="hidden" name="berat_barang" value="normal">
                <button type="submot" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- Modal Persyaratan -->
<div class="modal fade" id="modalPersyaratan" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Persyaratan Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti, temporibus autem rem excepturi harum, nemo optio sit deleniti dicta, dolores tenetur eum neque sequi quod rerum vel sapiente in voluptatibus. At veniam odit fugit impedit sint dolorem quo asperiores eum eos veritatis aliquam aperiam voluptatibus praesentium rerum quae eveniet, sed non harum, nam architecto, velit accusantium quis iste saepe? Nam ea quae assumenda! Molestiae fuga minus vel quibusdam nisi at aperiam perspiciatis possimus quos doloribus dolor totam odit iure tempore, repellendus quia obcaecati neque, recusandae delectus labore eveniet voluptates voluptatem eligendi! Debitis perferendis fuga quibusdam velit assumenda deleniti repellendus illum voluptates eaque doloribus? Eaque ullam natus excepturi velit commodi dolor veritatis ipsa at odit reprehenderit dolore, eveniet beatae. Illum qui asperiores praesentium laborum, amet voluptates unde vero quam ad optio? Laborum distinctio accusantium culpa reprehenderit, blanditiis quam, libero sapiente, pariatur iste doloremque aut sunt. Totam architecto voluptates, nisi alias ut labore esse nostrum similique repudiandae optio atque, necessitatibus dolorum, expedita consequatur debitis. Optio ratione quos ullam fuga consectetur dignissimos totam odit recusandae quis officia provident, nostrum necessitatibus aut autem blanditiis dolorem non pariatur, enim quasi voluptates error. Pariatur atque repellendus sunt eveniet odio ipsum molestiae aspernatur quibusdam doloremque praesentium ducimus, distinctio, architecto eum cumque. Nisi quo incidunt sed explicabo itaque quas ea cum temporibus et sequi qui ratione totam aliquam provident accusantium culpa distinctio eligendi dolore inventore consequuntur maiores, vitae iusto, minima expedita! Accusamus a illum fugiat itaque, eaque recusandae doloribus amet commodi ipsam ut? Quis at vel nisi sunt tempora? Aspernatur modi illum libero eveniet sint possimus non magni corporis itaque at voluptatibus molestias aliquid enim quis esse, quo delectus deleniti voluptate laborum molestiae quasi. Sint maiores fuga cum ea, tempora consequatur error ad dolore, reiciendis pariatur illum tenetur, asperiores eius adipisci cupiditate inventore quidem sed aut debitis ut deserunt numquam veniam. Nam veritatis suscipit deleniti nesciunt numquam quod itaque earum sequi similique debitis optio explicabo temporibus nihil totam sint esse, accusamus voluptatem unde vitae! Quidem, iure velit ipsum ipsa corrupti voluptatibus quia officia sequi nihil beatae ad vero. Consequatur aspernatur voluptates voluptatum. Earum minus consequatur vero deleniti quas eaque vel? Officia voluptas distinctio corporis? Rem molestias fuga saepe porro veniam quos, ratione est ipsa ad esse. A dignissimos non totam unde nihil saepe repudiandae laudantium distinctio obcaecati optio, eos maiores voluptas eaque adipisci sint. Sed, eaque, asperiores ipsum nesciunt perspiciatis tempore atque voluptas maiores beatae, quae veritatis libero commodi! Exercitationem, ad harum minima reprehenderit cumque sunt fugit dolores? Quaerat eaque doloribus ad dolorem, animi corrupti veniam molestiae natus maxime, id cupiditate ipsam inventore recusandae porro nihil qui odit quo omnis incidunt, architecto eius? Delectus veritatis animi excepturi. Quae delectus nam, harum magni debitis assumenda quis voluptate corporis iusto dolor? Quae maxime numquam unde, repellat et animi fuga temporibus aut non molestias incidunt in officia nulla eaque consequatur saepe, voluptates possimus ullam expedita facere rem tenetur. Mollitia cupiditate tenetur amet quam incidunt necessitatibus officia, adipisci deserunt numquam deleniti odio, illo debitis! Velit dolores, nihil nobis nulla tenetur placeat asperiores.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>