<body style="background-color: #395144;">

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
										<h1>InBako</h1>
									</div>

									<?= $this->session->flashdata('message'); ?>

									<form action="<?= base_url('auth/admin') ?>" method="POST" class="user">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
											<?= form_error('username', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small> '); ?>
										</div>
										<center>
											<button type="submit" class="btn btn-dark btn-user btn-block col-6 ">
												Login
											</button>

										</center>
									</form>

									<hr>

									<div class="text-center">
										<a class="small" href="<?= base_url('auth/registration') ?>">Buat Akun</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>