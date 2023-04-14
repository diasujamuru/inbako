<body>
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion"  style="background-color: #FE804D;" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-fw fa-book"></i>
				</div>
				<div class="sidebar-brand-text mx-3">KampusKita</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-user"></i>
					<span>Data</span>
				</a>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
					<div class="table-secondary py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?= base_url('mahasiswa') ?>">Warga</a>
						<a class="collapse-item" href="<?= base_url('mahasiswa') ?>">Petugas</a>
						<a class="collapse-item" href="<?= base_url('mahasiswa') ?>">Jadwal</a>
					</div>
				</div>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('auth/logoutAdmin') ?>">
					<i class="fas fa-sign-out-alt"></i>
					<span>Log Out</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">


			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->
