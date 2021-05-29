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
					<a href="<?= base_url() ?>" class="navbar-nav-link <?= count($this->uri->segment_array()) == 0 ? 'active' : '' ?>">
						<i class="icon-home4 mr-2"></i>
						HOME 
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('suara') ?>" class="navbar-nav-link <?= $this->uri->segment(1) == "suara" ? 'active' : '' ?>">
						<i class="icon-envelope mr-2"></i>
						PENGHITUNGAN SUARA
					</a>
				</li>
			</ul>


			<ul class="navbar-nav ml-auto">
				<?php if($this->session->userdata('pemilih-nik')){ ?>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url('assets/global_assets/images/placeholders/placeholder.jpg') ?>" class="rounded-circle mr-2" height="34" alt="">
						<span><?= strtoupper($this->session->userdata('pemilih-nama')) ?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<!-- <a href="#" class="dropdown-item"><i class="icon-user"></i> Profil</a> -->
						<a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="icon-switch2"></i> Keluar</a>
					</div>
				</li>
				<?php }else{ ?>
					<li class="nav-item">
					<a href="<?= base_url('masuk') ?>" class="navbar-nav-link <?= $this->uri->segment(1) == "masuk" ? 'active' : '' ?>">
						<i class="icon-lock mr-2"></i>
						MASUK
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->