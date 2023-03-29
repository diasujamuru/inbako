<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark" style="background-color: #FE804D;">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
			<img src="<?= base_url('assets/icon/logo-2.png') ?>" alt="logo-2" width="100px">
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
			<span class="navbar-dark navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-white" aria-current="page" href="#">Jadwal Pengambilan</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-white" aria-current="page" href="#">Data Penduduk</a>
				</li>

				<li class="nav-item">
					<a class="nav-link text-white" aria-current="page" href="#">|</a>
				</li>

				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle active text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Petugas
						<img class="img-profile rounded-circle" src="">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
