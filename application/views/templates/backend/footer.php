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
                &copy; 2021. <a href="#">CITY TOURS</a> oleh <a href="#">1654100138 | ANGGRI CONESTEN</a>
            </span>
        </div>
    </div>
</div>
<!-- /footer -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->
</body>

<script type="text/javascript">
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
</script>

</html>