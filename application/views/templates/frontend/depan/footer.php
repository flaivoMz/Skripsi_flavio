		<footer class="site-footer">
			<div class="container">
				<div class="row">
				<div class="col-md-6">
					<div class="row">
					<div class="col-md-7">
						<h2 class="footer-heading mb-4">About Us</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
					<div class="col-md-4 ml-auto">
						<h2 class="footer-heading mb-4">Features</h2>
						<ul class="list-unstyled">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Terms of Service</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Contact Us</a></li>
						</ul>
					</div>

					</div>
				</div>
				<div class="col-md-4 ml-auto">

					<div class="mb-5">
					<h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
					<form action="#" method="post" class="footer-suscribe-form">
						<div class="input-group mb-3">
						<input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
						</div>
						</div>
					</div>


					<h2 class="footer-heading mb-4">Follow Us</h2>
					<a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
					<a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
					<a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
					<a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
					</form>
				</div>
				</div>
				<div class="row pt-5 mt-5 text-center">
				<div class="col-md-12">
					<div class="border-top pt-5">
					<p class="copyright">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
					</div>
				</div>

				</div>
			</div>
		</footer>

    </div>

    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery.fancybox.min.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url()?>assets/frontend/depan/js/aos.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/depan/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<?php $module = $this->_module = $this->router->fetch_module();?>
	<?php $method = $this->router->fetch_method();?>
	<?php if($module == "order"):?>
		<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBau0Pzx51NtQ9aLA9xWadAph60lE30sY8&sensor=false"></script>  -->
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDAgO_spZs9ye05XI0BbPE-mDlJvaXuYzY&sensor=false"></script> 
	<?php endif;?>
	<script>
		<?php if($module == "home"):?>
			<?php if(isset($_SESSION['msg'])&& $_SESSION['msg']=="berhasil_login"):?>
				Swal.fire({
					text: "Berhasil Login",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'OK'
					}).then((result) => {
					if (result.value) {
						<?php unset($_SESSION['msg'])?>
					}
				});
			<?php endif;?>
		<?php endif; ?>
		<?php if($module == "order"):?>
			function gotoAsal(){
				window.location.href = "<?php echo base_url('order/show_alamat_asal');?>"
			}
			function gotoPenerima(){
				window.location.href = "<?php echo base_url('order/show_alamat_penerima');?>"
			}
			var map;
			var marker
			var geocoder = new google.maps.Geocoder();
			var koordinat = new google.maps.LatLng(-7.782946999999998,110.367038);
			var geocoder = new google.maps.Geocoder();
			var infowindow = new google.maps.InfoWindow();
        
			function taruhMarker(peta, posisiTitik){
				
				if( marker ){
				// pindahkan marker
					marker.setPosition(posisiTitik);
				} else {
				// buat marker baru
				marker = new google.maps.Marker({
					position: posisiTitik,
					map: peta,
					draggable: true 
				});
				}
				document.getElementById("latitude").value = posisiTitik.lat();
				document.getElementById("longitude").value = posisiTitik.lng();
			}
			
			function disablePOIInfoWindow(){
				var fnSet = google.maps.InfoWindow.prototype.set;
				google.maps.InfoWindow.prototype.set = function () {
				// alert('Ok');
				};
			}

			function initialize() {
				var propertiPeta = {
					center:koordinat,
					zoom:18,
					mapTypeId:google.maps.MapTypeId.ROADMAP,
					visible:true,
					gestureHandling: "greedy",
					disableDefaultUI: true
				};
				var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
				disablePOIInfoWindow();  
				
				// even listner ketika peta diklik
				google.maps.event.addListener(peta, 'click', function(event) {
					geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (results[0]) {
								// console.log(results[0].address_components[5]['long_name']);
								$('#kabupaten').val(results[0].address_components[5]['long_name']);
								$('#streetAddress').text(results[0].address_components[1]['long_name']);
								$('#detailAlamat').text(results[0].formatted_address);
								$('#alamat').val(results[0].formatted_address);
								$('#latitude').val(marker.getPosition().lat());
								$('#longitude').val(marker.getPosition().lng());
								// infowindow.setContent(results[0].formatted_address);
								// infowindow.open(map, marker);
							}
						}
					});
					taruhMarker(this, event.latLng);
				});
				if ($('#latitude').val() == "") {
					geocoder.geocode( { 'latLng': koordinat}, function(results, status) {
										if (status == google.maps.GeocoderStatus.OK) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();
						$('#kabupaten').val(results[0].address_components[5]['long_name']);
						$('#streetAddress').text(results[0].address_components[1]['long_name']);
						$('#detailAlamat').text(results[0].formatted_address);
						$('#alamat').val(results[0].formatted_address);
						$('#latitude').val(latitude);
						$('#longitude').val(longitude);
					} 
				})
				}
				marker = new google.maps.Marker({
				position: koordinat,
				map: peta,
				animation: google.maps.Animation,
				draggable:true
				});


				google.maps.event.addListener(marker, 'dragend', function() {
					geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (results[0]) {
								// console.log(results);
								$('#kabupaten').val(results[0].address_components[5]['long_name']);
								$('#streetAddress').text(results[0].address_components[1]['long_name']);
								$('#detailAlamat').text(results[0].formatted_address);
								$('#alamat').val(results[0].formatted_address);
								$('#latitude').val(marker.getPosition().lat());
								$('#longitude').val(marker.getPosition().lng());
								// infowindow.setContent(results[0].formatted_address);
								// infowindow.open(map, marker);
							}
						}
					});
				});
			}

			function getlatlang(){
				var address = document.getElementById('address').value;
				if (address != "") {
				geocoder.geocode( { 'address': address}, function(results, status) {

					if (status == google.maps.GeocoderStatus.OK) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();
						$('#kabupaten').val(results[0].address_components[5]['long_name']);
						$('#streetAddress').text(results[0].address_components[1]['long_name']);
						$('#detailAlamat').text(results[0].formatted_address);
						$('#alamat').val(results[0].formatted_address);
						$('#latitude').val(latitude);
						$('#longitude').val(longitude);
					} 
					var latlang = {lat: latitude, lng: longitude};

					map = new google.maps.Map(document.getElementById("map"), {
						zoom: 18,
						center: latlang,
						disableDefaultUI: true 
					});

					marker = new google.maps.Marker({
						map: map,
						position: latlang,
						disableDefaultUI: true,
						draggable: true
					});

					google.maps.event.addListener(marker, 'dragend', function() {
						geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								if (results[0]) {
									$('#kabupaten').val(results[0].address_components[5]['long_name']);
									$('#streetAddress').text(results[0].address_components[1]['long_name']);
									$('#detailAlamat').text(results[0].formatted_address);
									$('#alamat').val(results[0].formatted_address);
									$('#latitude').val(marker.getPosition().lat());
									$('#longitude').val(marker.getPosition().lng());
									// infowindow.setContent(results[0].formatted_address);
									// infowindow.open(map, marker);
								}
							}
						});
					});

					var propertiPeta = {
						center:koordinat,
						zoom:18,
						mapTypeId:google.maps.MapTypeId.ROADMAP,
						visible:true,
						gestureHandling: "greedy",
						disableDefaultUI: true
					};

					google.maps.event.addListener(map, 'click', function(event) {
						geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								if (results[0]) {
									$('#kabupaten').val(results[0].address_components[5]['long_name']);
									$('#streetAddress').text(results[0].address_components[1]['long_name']);
									$('#detailAlamat').text(results[0].formatted_address);
									$('#alamat').val(results[0].formatted_address);
									$('#latitude').val(marker.getPosition().lat());
									$('#longitude').val(marker.getPosition().lng());
									// infowindow.setContent(results[0].formatted_address);
									// infowindow.open(map, marker);
								}
							}
						});
						taruhMarker(this, event.latLng);
					});

				});
			}
			}
			var directionsService = new google.maps.DirectionsService();
			var koordinat_asal 		= $("input[name='koordinat_asal']").val();
			console.log(koordinat_asal);
			var koordinat_tujuan	= $("input[name='koordinat_tujuan']").val();
			console.log(koordinat_tujuan);
			var request = {
				origin      : koordinat_asal, 
				destination : koordinat_tujuan,
				travelMode  : google.maps.DirectionsTravelMode.DRIVING
			};
			directionsService.route(request, function(response, status) {
				if ( status == google.maps.DirectionsStatus.OK ) {
					jarak =  response.routes[0].legs[0].distance.text; 
					$("#judulOngkir").text("Ongkir ("+jarak+")");
					console.log(jarak);
				} 
			}); 
			<?php if($method=="show_alamat_asal" || $method == "show_alamat_penerima"):?>
				google.maps.event.addDomListener(window, 'load', initialize);
			<?php endif;?>
			// event jendela di-load  
			function tambahBarang(){
				$("#modalBarang").modal('show');
			}
			function editTmp(id){
				// console.log(id);
				$.ajax({
					url 	: "<?php echo base_url('order/show_order_detail_customer_tmp');?>",
					method 	: "POST",
					data 	: { id : id},
					success : function(res){
						var hasil = $.parseJSON(res);
						console.log(hasil);
						var vAsli = hasil.volume_barang;
						var vSplit = vAsli.split("x");
						var p = vSplit[0];
						var l = vSplit[1];
						var t = vSplit[2];
						var sbAsli 	= hasil.status_berat;
						if(sbAsli == "overweight,oversize,normal"){
							$("#overweight_edit").attr("checked", "checked");
							$("#oversize_edit").attr("checked", "checked");
							$("#normal_edit").attr("checked", "checked");
						}else if(sbAsli == "overweight,oversize" ){
							$("#overweight_edit").attr("checked", "checked");
							$("#oversize_edit").attr("checked", "checked");
							$("#normal_edit").removeAttr("checked", "checked");
						}else if(sbAsli == "overweight"){
							$("#overweight_edit").attr("checked", "checked");
							$("#oversize_edit").removeAttr("checked", "checked");
							$("#normal_edit").removeAttr("checked", "checked");
						}else if(sbAsli == "oversize"){
							$("#overweight_edit").removeAttr("checked", "checked");
							$("#oversize_edit").attr("checked", "checked");
							$("#normal_edit").removeAttr("checked", "checked");
						}else if(sbAsli == "normal"){
							$("#overweight_edit").removeAttr("checked", "checked");
							$("#oversize_edit").removeAttr("checked", "checked");
							$("#normal_edit").attr("checked", "checked");
						}
						$("#idBarang").val(hasil.id_barang);
						$("#panjang_edit").val(p);
						$("#lebar_edit").val(l);
						$("#tinggi_edit").val(t);
						$("#catatan_edit").val(hasil.catatan);
						$("#catatan_edit").text(hasil.catatan);
						$('#modalBarangEdit').modal('show');
					}
				});
			}
			function hapusTmp(id){
				// console.log(id);
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Ya',
					cancelButtonText: 'Tidak'
					}).then((result) => {
					if (result.value) {
						$.ajax({
							url 	: "<?php echo base_url('order/destroy_order_detail_customer_tmp'); ?>",
							method 	: "POST",
							data 	: {id : id},
							success : function(res){
								location.reload();
							}
						});
					}
				});
			}
		<?php endif;?>
	</script>

</body>

</html>