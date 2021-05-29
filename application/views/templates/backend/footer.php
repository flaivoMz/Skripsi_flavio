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
        $("select").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == "parpol") {
                    $("#parpol").show();
                } else {
                    $("#parpol").hide();
                }
            });
        }).change();
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
            $("#nik").val("").removeAttr('readonly', 'readonly');
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
            console.log("nama : " + nama)

            $("#pemilihLabel").html('Edit Data Pemilih')
            $("#idpemilih").val(idpemilih);
            $("#nik").val(nik).attr('readonly', 'readonly');
            $("#nama").val(nama);
            $("#jekel").val(jekel);
            $("#alamat").val(alamat);
            $("#tempatlahir").val(tempatlahir);
            $("#tgllahir").val(tgllahir);
            $("#agama").val(agama);
            $("#submit").val("Edit");

        })


    })
</script>
</body>


</html>