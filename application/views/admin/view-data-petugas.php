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
					<form action="<?= base_url('admin/dataPetugas'); ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " name="keyword" autocomplete="off" autofocus>
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn mb-3" style="background-color:#FE804D; color: white;" align="center" data-toggle="modal" data-target="#tambahPetugas">Tambah Data Petugas</a>

			<center>
				<div class="row justify-content-center">
					<div class="col-4">
						<?= $this->session->flashdata('message'); ?>
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</center>

			<h5>Hasil : <?= $total_rows; ?></h5>

			<table class="table table-hover text-dark">
				<thead class="table-secondary">
					<tr>
						<th scope="col">No</th>
						<th scope="col">NIK</th>
						<th scope="col">Nama</th>
						<th scope="col">Kota</th>
						<th scope="col">Email</th>
						<th scope="col">Kecamatan</th>
						<th scope="col">Kelurahan</th>
						<th scope="col">Kode Wilayah</th>
						<th scope="col">Status</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php if (empty($petugas)) : ?>
						<tr>
							<td colspan="6">
								<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>
							</td>
						</tr>
					<?php endif; ?>

					<?php
					foreach ($petugas as $row) :
					?>

						<tr>
							<td><?= ++$start; ?></td>
							<td><?= $row->nik; ?></td>
							<td><?= $row->nama; ?></td>
							<td><?= $row->kota; ?></td>
							<td><?= $row->email; ?></td>
							<td><?= $row->kecamatan; ?></td>
							<td><?= $row->kelurahan; ?></td>
							<td><?= $row->kode_wilayah; ?></td>
							<td><?= $row->status; ?></td>
							<td>
								<a class="badge badge-success" data-toggle="modal" data-target="#editPetugas<?= $row->nik; ?>" href=""><i class="fas fa-fw fa-edit"></i></a>
								<a class="badge badge-danger" data-toggle="modal" data-target="#deletePetugas<?= $row->nik; ?>"><i class="fas fa-fw fa-trash"></i></a>
							</td>
						</tr>

					<?php endforeach; ?>
				</tbody>
			</table>

			<?= $this->pagination->create_links(); ?>

			<hr class="container-divider">

		</div>
	</div>
</div>
</div>
</div>

<!-- Tambah Data Petugas -->
<div class="modal fade" id="tambahPetugas" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/tambahDataPetugas'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label style="color:#FE804D;" class="form-label" for="nik">NIK</label>
						<input type="number" class="form-control mb-2" id="nik" name="nik" required>

						<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
						<input type="text" class="form-control mb-2" id="nama" name="nama" required>

						<label style="color:#FE804D;" class="form-label" for="nama">Kota</label>
						<input type="text" class="form-control mb-2" id="kota" name="kota" required>

						<label style="color:#FE804D;" class="form-label" for="nama">Email</label>
						<input type="email" class="form-control mb-2" id="email" name="email" required>

						<label style="color:#FE804D;" class="form-label" for="kecamatan">Kecamatan</label>
						<input type="text" class="form-control mb-2" id="kecamatan" name="kecamatan" required>

						<label style="color:#FE804D;" class="form-label" for="kelurahan">Kelurahan</label>
						<input type="text" class="form-control mb-2" id="kelurahan" name="kelurahan" required>

						<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
						<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" required>

						<label style="color:#FE804D;" class="form-label" for="status">Status</label>
						<input type="text" class="form-control mb-2" id="status" name="status" required>
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

<!-- Ubah Data Petugas-->
<?php foreach ($petugas as $row) : ?>
	<div class="modal fade" id="editPetugas<?= $row->nik; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Edit Data <?= $row->nama; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/editDataPetugas'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label style="color:#FE804D;" class="form-label" for="nik">NIK</label>
							<input type="number" class="form-control mb-2" id="nik" name="nik" value="<?= $row->nik; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
							<input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama" value="<?= $row->nama; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="nama">Nama</label>
							<input type="text" class="form-control mb-2" id="kota" name="kota" placeholder="Kota" value="<?= $row->kota; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="nama">Email</label>
							<input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email" value="<?= $row->email; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kecamatan">Kecamatan</label>
							<input type="text" class="form-control mb-2" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="<?= $row->kecamatan; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kelurahan">Kelurahan</label>
							<input type="text" class="form-control mb-2" id="kelurahan" name="kelurahan" placeholder="Kelurahan" value="<?= $row->kelurahan; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
							<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" placeholder="Kode Wilayah" value="<?= $row->kode_wilayah; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kode_perwilayah">Status</label>
							<input type="text" class="form-control mb-2" id="status" name="status" placeholder="Status" value="<?= $row->status; ?>" required>
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

<!-- Hapus Data Petugas -->
<?php foreach ($petugas as $row) : ?>
	<div class="modal fade" id="deletePetugas<?= $row->nik; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
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
					<a class="btn btn-primary" href="<?= base_url('admin/deleteDataPetugas'); ?>/<?= $row->nik; ?>">Delete</a>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>
