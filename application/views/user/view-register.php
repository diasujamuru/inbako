<body style="background-color: #FE804D;">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-6">

				<div class="card o-hidden border-0 shadow-lg my-5 mb-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<img src="<?= base_url('assets/icon/logo-1.png') ?>" alt="inbako-logo" width="50%">
									</div>

									<br>

									<?= $this->session->flashdata('message'); ?>

									<form action="<?= base_url('auth/admin') ?>" method="POST" class="user">
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">NIK</div>
											<input type="text" class="form-control form-control-user" id="nik" name="nik">
											<?= form_error('username', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">Username</div>
											<input type="text" class="form-control form-control-user" id="username" name="username">
											<?= form_error('username', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">Password</div>
											<input type="password" class="form-control form-control-user" id="password" name="password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">Konfirmasi Password</div>
											<input type="password" class="form-control form-control-user" id="password" name="password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<center>
											<button type="submit" style="background-color: #FE804D" class="btn btn-user btn-block col-4">
												<div class="text-white">Daftar</div>
											</button>

										</center>
									</form>


									<div class="text-center mt-2">
										Sudah punya akun ? <a style="color:#FE804D" href="<?= base_url('auth') ?>">Login</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
