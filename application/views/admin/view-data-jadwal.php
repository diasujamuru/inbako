<br>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Petugas</h3>
		</div>
		<div class="card-body">

			<div class="row justify-content-center mt-4">
				<div class="col-md-5">
					<form action="<?= base_url('admin/dataJadwal'); ?>" method="get">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " value="<?= isset($keyword) ? $keyword : ''; ?>" name="keyword" autocomplete="off">
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn mb-3" style="background-color:#FE804D; color: white; text-align:center;" data-toggle="modal" data-target="#tambahJadwal">Tambah Data Jadwal</a>

			<?php if ($this->session->flashdata('success_message')) : ?>
				<script>
					// Tampilkan SweetAlert dengan pesan sukses
					Swal.fire({
						title: "Success",
						text: "<?= $this->session->flashdata('success_message'); ?>",
						icon: "success"
					}).then(function() {
						// Redirect ke halaman dataPetugas setelah pengguna menutup SweetAlert
						window.location.href = "<?= base_url('admin/dataJadwal'); ?>";
					});
				</script>
			<?php endif; ?>

			<?php echo validation_errors(); ?>

			<h5>Hasil : <?= $total_rows; ?></h5>

			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
					<table class="table align-items-center mb-0">
						<thead>
							<tr>

								<th class="text-secondary text-center text-xs font-weight-bolder align-middle ">NO</th>
								<!-- <th class="text-secondary text-center text-xs font-weight-bolder align-middle m-0">FOTO</th> -->
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kode Wilayah</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Tanggal</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Mulai</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Selesai</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kode Perwilayah</th>

						</thead>

						<tbody>
							<?php if (!empty($jadwal)) : ?>

								<?php
								foreach ($jadwal as $row) :
								?>

									<tr>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary text-xs "><?= ++$start; ?></span>
										</td>
										<!-- <td class="position-relative">
											<div>
												<img src=" ../assets/img/team-2.jpg" class="img img-fluid rounded-circle w-50 position-absolute" alt="team-2.jpg">
											</div>
										</td> -->
										<td class="align-middle text-center text-xs p-2">
											<span class="text-secondary mb-0 text-xs ">
												<h6><?= $row->kode_wilayah; ?></h6>
											</span>
										</td>

										<td class="align-middle text-center text-xs ">
											<span class="text-secondary text-xs "><?= $row->tanggal; ?></span>
										</td>

										<td class="align-middle text-center text-xs ">
											<span class="text-secondary text-xs "><?= $row->mulai; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->selesai; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kode_perwilayah; ?></span>
										</td>
										<td>
											<a class="badge badge-primary rounded-circle" data-toggle="modal" data-target="#editDataJadwal<?= $row->id; ?>">
												<i class="fas fa-edit"></i> </a>
											<a class="badge badge-danger rounded-circle btn-delete-petugas" data-url="<?= base_url('admin/deleteDataJadwal'); ?>/<?= $row->id; ?>">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
							<?php else : ?>

								<div class="alert alert-danger" role="alert">Hasil Tidak ditemukan.</div>
							<?php endif; ?>
						</tbody>
					</table>



				</div>
			</div>
		</div>
		<?= $pagination; ?>

		<hr class="container-divider">
	</div>
</div>

<!-- Tambah Data Petugas -->
<div class="modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/tambahDataJadwal'); ?>" id="formTambahData" method="post">

				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control mb-2" id="id" name="id">

						<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
						<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" required>

						<label style="color:#FE804D;" class="form-label" for="tanggal">Tanggal</label>
						<input type="date" class="form-control mb-2" id="tanggal" name="tanggal" required>

						<label style="color:#FE804D;" class="form-label" for="mulai">Mulai</label>
						<input type="time" class="form-control mb-2" id="mulai" name="mulai" required>

						<label style="color:#FE804D;" class="form-label" for="selesai">Selesai</label>
						<input type="time" class="form-control mb-2" id="selesai" name="selesai" required>

						<label style="color:#FE804D;" class="form-label" for="kode_perwilayah">Kode Perwilayah</label>
						<input type="number" class="form-control mb-2" id="kode_perwilayah" name="kode_perwilayah" required>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" id="submitBtn" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
< <!-- Ubah Data Petugas-->
	<?php foreach ($jadwal as $row) : ?>
		<div class="modal fade" id="editDataJadwal<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="newMenuModalLabel">Edit Data <?= $row->tanggal; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('admin/editDataJadwal'); ?>" id="formUbahData" method="post">
						<div class="modal-body">
							<div class="form-group">
								<input type="hidden" class="form-control mb-2" id="id" name="id" value="<?= $row->id; ?>">

								<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
								<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" value="<?= $row->kode_wilayah; ?>" required>

								<label style="color:#FE804D;" class="form-label" for="tanggal">Tanggal</label>
								<input type="date" class="form-control mb-2" id="tanggal" name="tanggal" placeholder="tanggal" value="<?= $row->tanggal; ?>" required>

								<label style="color:#FE804D;" class="form-label" for="mulai">Mulai</label>
								<input type="time" class="form-control mb-2" id="mulai" name="mulai" placeholder="mulai" value="<?= $row->mulai; ?>" required>

								<label style="color:#FE804D;" class="form-label" for="selesai">Selesai</label>
								<input type="time" class="form-control mb-2" id="selesai" name="selesai" placeholder="selesai" value="<?= $row->selesai; ?>" required>

								<label style="color:#FE804D;" class="form-label" for="kode_perwilayah">Kode Perwilayah</label>
								<input type="number" class="form-control mb-2" id="kode_perwilayah" name="kode_perwilayah" placeholder="Kode Perwilayah" value="<?= $row->kode_perwilayah; ?>" required>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Ubah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
