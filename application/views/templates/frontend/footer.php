<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
  <div class="text-center d-lg-none w-100">
    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
      <i class="icon-unfold mr-2"></i>
      Footer
    </button>
  </div>

  <div class="navbar-collapse collapse" id="navbar-footer">
    <span class="navbar-text">
      &copy; 2021. <a href="#">E-VOTING</a> oleh <a href="#">165410182 | FLAVIO MONIZ DOUTEL FATIMA</a>
    </span>
  </div>
</div>
<!-- /footer -->
<script type="text/javascript">
  // Set the date we're counting down to
  var mulai_pilih = $('#mulai_pilih').html()
  var countDownDate = new Date(mulai_pilih).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
    //   minutes + "m " + seconds + "s ";

    document.getElementById("hari").innerHTML = days;
    document.getElementById("jam").innerHTML = hours;
    document.getElementById("menit").innerHTML = minutes;
    document.getElementById("detik").innerHTML = seconds;

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("hari").innerHTML = '00';
      document.getElementById("jam").innerHTML = '00';
      document.getElementById("menit").innerHTML = '00';
      document.getElementById("detik").innerHTML = '00';
    }
  }, 1000);
  const flashData = $(".flash-data").data("flashdata");
  const flashDanger = $(".flash-danger").data("flashdata");
  // $(document).ready(function() {
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
  // })

  $(".detail-visi-misi").on("click", function(e) {
    e.preventDefault();

    var ketua = $(this).data("ketua");
    var wakil = $(this).data("wakil");
    var visi_misi = $(this).data("visimisi");

    $("#ketua").html(ketua);
    $("#wakil").html(wakil);
    $("#visi_misi").html(visi_misi);
  })
</script>
</body>

</html>