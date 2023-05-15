<div class="container-fluid">
	<div class="d-flex flex-column">
		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>

			<!-- Topbar Navbar -->
			<ul class="navbar-nav ml-auto">

				<!-- Nav Item - Search Dropdown (Visible Only XS) -->
				<li class="nav-item dropdown no-arrow d-sm-none">
					<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-search fa-fw"></i>
					</a>
					<!-- Dropdown - Messages -->
					<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
						<form class="form-inline mr-auto w-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>


				<div class="topbar-divider d-none d-sm-block"></div>

				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['username']; ?></span>
						<img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_2.svg">
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="<?= base_url('home/viewProfile') ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Profile
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</li>

			</ul>

		</nav>
		<!-- End of Topbar -->

		<div class="text-center">
			<h2>Selamat Datang Admin</h2>
		</div>

		<br>

		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col">
				<div class="card" style="background-color: #FE804D;">
					<img src="<?= base_url('assets/img/admin-card-1.jpg') ?>" class="card-img-top" alt="warga">
					<div class="card-body">
						<div class="text-center">
							<h5 class="card-title text-white">Data Warga</h5>
						</div>
						<div class="text-center">
							<a href="<?= base_url('admin/dataWarga') ?>" class="btn btn-primary" style="background-color: white; color:#FE804D;">Kelola Data Warga</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="background-color: #FE804D;">
					<img src="<?= base_url('assets/img/admin-card-2.jpg') ?>" class="card-img-top" alt="petugas">
					<div class="card-body">
						<div class="text-center">
							<h5 class="card-title text-white">Data Petugas</h5>
						</div>
						<div class="text-center">
							<a href="<?= base_url('admin/dataPetugas') ?>" class="btn btn-primary" style="background-color: white; color:#FE804D;">Kelola Data Petugas</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="background-color: #FE804D;">
					<img src="<?= base_url('assets/img/admin-card-3.jpg') ?>" class="card-img-top" alt="petugas">
					<div class="card-body">
						<div class="text-center">
							<h5 class="card-title text-white">Data Jadwal</h5>
						</div>
						<div class="text-center">
							<a href="<?= base_url('admin/dataJadwal') ?>" class="btn btn-primary" style="background-color: white; color:#FE804D;">Kelola Data Jadwal</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</body>
