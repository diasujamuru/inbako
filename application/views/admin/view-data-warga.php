<br>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Warga</h3>
		</div>
		<div class="card-body">

			<div class="row justify-content-center mt-4">
				<div class="col-md-5">
					<form action="<?= base_url('admin/dataWarga'); ?>" method="get">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " name="keyword" autocomplete="off">
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn mb-3" style="background-color:#FE804D; color: white;" align="center" data-toggle="modal" data-target="#tambahWarga">Tambah Data Warga</a>

			<?php if ($this->session->flashdata('success_message')) : ?>
				<script>
					// Tampilkan SweetAlert menggunakan flash data
					Swal.fire("Sukses!", "<?php echo $this->session->flashdata('success_message'); ?>", "success");
				</script>
			<?php endif; ?>




			<h5>Hasil : <?= $total_rows; ?></h5>

			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
					<table class="table align-items-center mb-0">
						<thead>
							<tr>

								<th class="text-secondary text-center text-xs font-weight-bolder align-middle ">NO</th>
								<!-- <th class="text-secondary text-center text-xs font-weight-bolder align-middle m-0">FOTO</th> -->
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">NAMA</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">NIK</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Tanggal Lahir</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kota</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kecamatan</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kelurahan</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">RT/RW</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">No <br> Telepon</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kode <br> Wilayah</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Kode <br> Perwilayah</th>
								<th class="text-secondary text-center text-xs font-weight-bolder align-middle">Aksi</th>
							</tr>
						</thead>

						<tbody>
							<?php if (!empty($warga)) : ?>

								<?php
								foreach ($warga as $row) :
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
												<h6><?= $row->nama; ?></h6>
											</span>
											<span class="text-secondary mb-0 text-xs ">
												<p><?= $row->email; ?></p>
											</span>
										</td>

										<td class="align-middle text-center text-xs ">
											<span class="text-secondary text-xs "><?= $row->nik; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->ttl; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kota; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kecamatan; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kelurahan; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->rt; ?> / <?= $row->rw; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->no_telpon; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kode_wilayah; ?></span>
										</td>
										<td class="align-middle text-center text-xs ">
											<span class="text-secondary"><?= $row->kode_perwilayah; ?></span>
										</td>
										<td>
											<a class="badge badge-primary rounded-circle" data-toggle="modal" data-target="#editWarga<?= $row->id; ?>">
												<i class="fas fa-edit"></i> </a>
											<a class="badge badge-danger rounded-circle btn-delete" data-url="<?= base_url('admin/deleteDataWarga'); ?>/<?= $row->id; ?>">
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

<!-- Tambah Data Warga -->
<div class="modal fade" id="tambahWarga" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Warga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/tambahDataWarga'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label style="color:#FE804D;" class="form-label" for="nik">NIK</label>
						<input type="number" class="form-control mb-2" id="nik" name="nik" required>

						<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
						<input type="text" class="form-control mb-2" id="nama" name="nama" required>

						<label style="color:#FE804D;" class="form-label" for="email">Email</label>
						<input type="text" class="form-control mb-2" id="email" name="email" required>

						<label style="color:#FE804D;" class="form-label" for="ttl">tanggal Lahir</label>
						<input type="text" class="form-control mb-2" id="ttl" name="ttl" required>

						<label style="color:#FE804D;" class="form-label" for="nama">Kota</label>
						<input type="text" class="form-control mb-2" id="kota" name="kota" required>

						<label style="color:#FE804D;" class="form-label" for="kecamatan">Kecamatan</label>
						<input type="text" class="form-control mb-2" id="kecamatan" name="kecamatan" required>

						<label style="color:#FE804D;" class="form-label" for="kelurahan">Kelurahan</label>
						<input type="text" class="form-control mb-2" id="kelurahan" name="kelurahan" required>

						<label style="color:#FE804D;" class="form-label" for="rt">RT</label>
						<input type="number" class="form-control mb-2" id="rt" name="rt" required>

						<label style="color:#FE804D;" class="form-label" for="rw">RW</label>
						<input type="number" class="form-control mb-2" id="rw" name="rw" required>

						<label style="color:#FE804D;" class="form-label" for="no_telpon">Nomor Telepon</label>
						<input type="number" class="form-control mb-2" id="no_telpon" name="no_telpon" required>

						<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
						<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" required>

						<label style="color:#FE804D;" class="form-label" for="kode_perwilayah">Kode Perwilayah</label>
						<input type="number" class="form-control mb-2" id="kode_perwilayah" name="kode_perwilayah" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Ubah Data Warga-->
<?php foreach ($warga as $row) : ?>
	<div class="modal fade" id="editWarga<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Edit Data <?= $row->nama; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/editDataWarga'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" class="form-control mb-2" id="id" name="id" value="<?= $row->id; ?>">

							<label style="color:#FE804D;" class="form-label" for="nik">NIK</label>
							<input type="number" class="form-control mb-2" id="nik" name="nik" value="<?= $row->nik; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
							<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $row->nama; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="ttl">Tanggal Lahir</label>
							<input type="date" class="form-control mb-2" id="ttl" name="ttl" placeholder="ttl" value="<?= $row->ttl; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
							<input type="text" class="form-control mb-2" id="kota" name="kota" placeholder="Kota" value="<?= $row->kota; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kecamatan">Kecamatan</label>
							<input type="text" class="form-control mb-2" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $row->kecamatan; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kelurahan">Kelurahan</label>
							<input type="text" class="form-control mb-2" id="kelurahan" name="kelurahan" placeholder="Kelurahan" value="<?= $row->kelurahan; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="rt">RT</label>
							<input type="number" class="form-control mb-2" id="rt" name="rt" placeholder="RT" value="<?= $row->rt; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="rw">RW</label>
							<input type="number" class="form-control mb-2" id="rw" name="rw" placeholder="RW" value="<?= $row->rw; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="no_telpon">Nomor Telepon</label>
							<input type="number" class="form-control mb-2" id="no_telpon" name="no_telpon" placeholder="Nomor Telepon" value="<?= $row->no_telpon; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
							<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" placeholder="Kode Wilayah" value="<?= $row->kode_wilayah; ?>" required>

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

<!-- Hapus Data Warga -->
<?php foreach ($warga as $row) : ?>
	<div class="modal fade" id="deleteWarga<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Hapus Data <?= $row->nama; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<a class="btn btn-primary" href="<?= base_url('admin/deleteDataWarga'); ?>/<?= $row->id; ?>">Delete</a>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>