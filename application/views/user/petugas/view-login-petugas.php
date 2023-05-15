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

									<form action="<?= base_url('auth/petugas') ?>" method="POST" class="user">
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">Email</div>
											<input type="text" class="form-control form-control-user" id="email" name="email">
											<?= form_error('email', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<div class="form-label ml-2" style="color: #FE804D">Password</div>
											<input type="password" class="form-control form-control-user" id="password" name="password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="row justify-content-center">

											<button type="submit" style="background-color: #FE804D" class="btn btn-user btn-block col-4">
												<div class="text-white">Login</div>
											</button>
										</div>


									</form>


									<div class="text-center mt-2">
										Belum Memiliki Akun ? <a style="color:#FE804D" href="<?= base_url('auth/registration') ?>">Buat Akun</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>


	</div>