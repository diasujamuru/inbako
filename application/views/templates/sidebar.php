<body>
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #FE804D;" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
				<div class="sidebar-brand-icon">
					<i class="fas fa-store"></i>
				</div>
				<div class="sidebar-brand-text mx-3">InBako</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard'); ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider my-0">


			<li class="nav-item <?= $this->uri->segment(2) == 'dataWarga' || (!empty($warga)) ? 'active bg-danger rounded' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/dataWarga?keyword=&submit=Submit') ?>">
					<i class="fas fa-solid fa-users"></i>
					<span>Data Warga</span>
				</a>
			</li>
			<hr class="sidebar-divider my-0">

			<li class="nav-item <?= $this->uri->segment(2) == 'dataPetugas' || (!empty($petugas)) ? 'active bg-danger rounded' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/dataPetugas') ?>">
					<i class="fa fa-solid fa-user-tie"></i>
					<span>Data Petugas</span>
				</a>
			</li>
			<hr class="sidebar-divider my-0">

			<li class="nav-item <?= $this->uri->segment(2) == 'dataJadwal' || (!empty($jadwal)) ? 'active bg-danger rounded' : '' ?>">
				<a class="nav-link" href="<?= base_url('admin/dataJadwal') ?>">
					<i class="far fa-calendar-alt"></i>
					<span>Data Jadwal</span>
				</a>
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