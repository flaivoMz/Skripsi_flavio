<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        <div class="col-md-12 text-center">
            <span class="navbar-text">
                &copy; 2021. <a href="#">E-VOTING</a> oleh <a href="#">165410182 | FLAVIO MONIZ DOUTEL FATIMA</a>
            </span>
        </div>
    </div>
</div>
<!-- /footer -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->



<script type="text/javascript">
    $(document).ready(function() {
        const flashData = $(".flash-data").data("flashdata");
        const flashDanger = $(".flash-danger").data("flashdata");

        if (flashData) {
            Swal.fire({
                title: "Success",
                text: flashData,
                type: "success",
                confirmButtonClass: 'btn btn-primary',
            });
        }
        if (flashDanger) {
            Swal.fire({
                title: "Warning",
                text: flashDanger,
                type: "warning",
                confirmButtonClass: 'btn btn-primary',
            });
        }

        $(".button-konfirmasi").on("click", function(e) {
            e.preventDefault();
            const href = $(this).attr("href");
            const pesan_konfirm = $(this).data("konfirmasi");

            Swal.fire({
                title: "Konfirmasi",
                text: pesan_konfirm,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger",
                cancelButtonClass: "btn btn-secondary",
                cancelButtonText: "Batal",
                confirmButtonText: "Ya, Konfirmasi!",
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            });
        });
        $(".tambah-pemilih").on("click", function(e) {
            e.preventDefault();
            $("#pemilihLabel").html('Tambah Data Pemilih')
            $("#idpemilih").val("");
            $("#nik").val("").removeAttr('readonly','readonly');
            $("#nama").val("");
            $("#jekel").val("");
            $("#alamat").val("");
            $("#tempatlahir").val("");
            $("#tgllahir").val("");
            $("#agama").val("");
            $("#submit").val("Tambah");
        })
        $(".edit-pemilih").on("click", function(e) {
            e.preventDefault();

            var idpemilih = $(this).data("idpemilih");
            var nik = $(this).data("nik");
            var nama = $(this).data("nama");
            var jekel = $(this).data("jekel");
            var tempatlahir = $(this).data("tempatlahir");
            var tgllahir = $(this).data("tgllahir");
            var alamat = $(this).data("alamat");
            var agama = $(this).data("agama");
            console.log("nama : "+nama)

            $("#pemilihLabel").html('Edit Data Pemilih')
            $("#idpemilih").val(idpemilih);
            $("#nik").val(nik).attr('readonly','readonly');
            $("#nama").val(nama);
            $("#jekel").val(jekel);
            $("#alamat").val(alamat);
            $("#tempatlahir").val(tempatlahir);
            $("#tgllahir").val(tgllahir);
            $("#agama").val(agama);
            $("#submit").val("Edit");
           
        })
        $(".detailOrder").on("click", function(e) {
            e.preventDefault();
            var idpesanan = $(this).data("idpesanan");
            $("#table-pemandu tr").remove();
            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>admin/pesanan/list-pemandu/" + idpesanan,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            $("#table-pemandu").append(
                                "<tr>" +
                                "<td><img class='thumbnail rounded-circle' src='<?= base_url(); ?>assets/frontend/img/pemandu/" +
                                data[i]["photo"] +
                                "'></td>" +
                                "<td style='vertical-align:middle;'>" +
                                data[i]["nama_pemandu"].toString().toUpperCase() +
                                "</td>" +
                                "<td style='vertical-align:middle;'>" +
                                data[i]["no_hp_pemandu"] +
                                "</td>" +
                                "</tr>"
                            );
                        }
                    } else {
                        $("#table-pemandu").append(
                            "<tr>" +
                            "<td class='font-weight-bold'>Data pemandu kosong</td>" +
                            "</tr>"
                        );
                    }
                },
            });
            var namawisata = $(this).data("namawisata");
            var blnwisata = $(this).data("blnwisata");
            var tglwisata = $(this).data("tglwisata");
            var hariwisata = $(this).data("hariwisata");
            var namapemesan = $(this).data("namapemesan");
            var nohppemesan = $(this).data("nohppemesan");
            var jmldewasa = $(this).data("jmldewasa");
            var jmlbalita = $(this).data("jmlbalita");
            var kodebooking = $(this).data("kodebooking");
            var statusbayar = $(this).data("statusbayar");
            var statuspesan = $(this).data("statuspesan");
            var tglpesanan = $(this).data("tglpesanan");
            var tgl_expired = $(this).data("tglexpired");
            var totalbayar = $(this).data("totalbayar");
            var dpbayar = $(this).data("dpbayar");
            var nominalterbayar = $(this).data("nominalterbayar");
            var tglbayar = $(this).data("tglbayar");
            var sisabayar = $(this).data("sisabayar");
            var akunpemesan = $(this).data("akunpemesan");

            $("#kode_booking").html(kodebooking);
            $("#nama_wisata").html(namawisata);
            $("#nama_pemesan").html(namapemesan);
            $("#no_hp_pemesan").html(nohppemesan);
            $("#tgl_pesanan").html(tglpesanan);
            $("#tgl_pesanan").html(tglpesanan);
            $("#akun_pemesan").html(akunpemesan);
            $("#jml_dewasa").html(jmldewasa + " Orang");
            $("#jml_balita").html(jmlbalita + " Orang");
            $("#total_bayar").html("Rp. " + totalbayar);
            $("#bulan_wisata").html(blnwisata);
            $("#tanggal_wisata").html(tglwisata);
            $("#hari_wisata").html(hariwisata);
            $("#dp_bayar").html("Rp. " + dpbayar);
            $("#tgl_bayar").html(tglbayar);
            $("#terbayar").html("Rp. " + nominalterbayar);
            $("#sisa_bayar").html("Rp. " + sisabayar);

            if (statuspesan == "booking") {
                $("#status_pesan").html("BOOKING");
                $("#status_pesan").removeClass("badge-danger");
                $("#status_pesan").removeClass("badge-success");
                $("#status_pesan").removeClass("badge-warning");
                $("#status_pesan").addClass("badge-info");
            } else if (statuspesan == "batal") {
                $("#status_pesan").html("BATAL");
                $("#status_pesan").removeClass("badge-info");
                $("#status_pesan").removeClass("badge-success");
                $("#status_pesan").removeClass("badge-warning");

                $("#status_pesan").addClass("badge-danger");
            } else if (statuspesan == "expired") {
                $("#status_pesan").html("EXPIRED");
                $("#status_pesan").removeClass("badge-danger");
                $("#status_pesan").removeClass("badge-success");
                $("#status_pesan").removeClass("badge-info");

                $("#status_pesan").addClass("badge-warning");
            } else {
                $("#status_pesan").html("SELESAI");
                $("#status_pesan").removeClass("badge-danger");
                $("#status_pesan").removeClass("badge-info");
                $("#status_pesan").removeClass("badge-warning");
                $("#status_pesan").addClass("badge-success");
            }

            if (statusbayar == "") {
                $("#status_bayar").html("BELUM BAYAR");
                $("#status_bayar").removeClass("badge-success");
                $("#status_bayar").removeClass("badge-warning");
                $("#status_bayar").addClass("badge-danger");
            } else if (statusbayar == "dp") {
                $("#status_bayar").html("DP");
                $("#status_bayar").removeClass("badge-success");
                $("#status_bayar").removeClass("badge-danger");
                $("#status_bayar").addClass("badge-warning");
            } else {
                $("#status_bayar").html("LUNAS");
                $("#terbayar").html("Rp." + totalbayar);
                $("#status_bayar").removeClass("badge-danger");
                $("#status_bayar").removeClass("badge-warning");
                $("#status_bayar").addClass("badge-success");
            }

            if (statusbayar == "" && statuspesan == "booking") {
                $("#row_expired").css("background-color", "wheat");
                $("#bayar_sebelum_text").html("Tanggal Expired");
                $("#bayar_sebelum_tgl").html(tgl_expired);
            } else {
                $("#row_expired").css("background-color", "white");
                $("#bayar_sebelum_text").html("");
                $("#bayar_sebelum_tgl").html("");
            }
        });


    })
</script>
</body>


</html>