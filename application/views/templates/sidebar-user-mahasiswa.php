<body>
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #395144;" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/loadPageMahasiswa'); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-fw fa-book"></i>
				</div>
				<div class="sidebar-brand-text mx-3">KampusKita</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('user/loadPageMahasiswa'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('user/loadProfileMahasiswa') ?>">
					<i class="fas fa-book"></i>
					<span>Profil</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('user/loadKelasMahasiswaPage') ?>">
					<i class="fas fa-book"></i>
					<span>Kelas</span>
				</a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('auth/logoutUser') ?>">
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