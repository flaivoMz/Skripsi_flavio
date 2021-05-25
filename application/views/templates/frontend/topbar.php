<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-teal-800 align-items-center">
		<div class="wmin-0 mr-5">
			<a href="<?= base_url() ?>" class="d-inline-block">
				<img src="<?= base_url('assets/global_assets/images/logo_light.png') ?>" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-menu7"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
      <li class="nav-item">
					<a href="<?= base_url() ?>" class="navbar-nav-link active">
						<i class="icon-home4 mr-2"></i>
						Home
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url() ?>" class="navbar-nav-link">
						<i class="icon-envelope mr-2"></i>
						Penghitungan Suara
					</a>
				</li>
			</ul>


			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>Victoria</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user"></i> Profil</a>
						<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Keluar</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->