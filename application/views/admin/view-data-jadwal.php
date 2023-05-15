<br>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-secondary" align="center">Data Jadwal</h3>
		</div>
		<div class="card-body">

			<div class="row justify-content-center mt-4">
				<div class="col-md-5">
					<form action="<?= base_url('admin/dataJadwal'); ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " name="keyword" autocomplete="off" autofocus>
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn mb-3" style="background-color:#FE804D; color: white;" align="center" data-toggle="modal" data-target="#tambahJadwal">Tambah Data Jadwal</a>

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
						<th scope="col">Kode Wilayah</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Mulai</th>
						<th scope="col">Selesai</th>
						<th scope="col">Kode Perwilayah</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php if (empty($jadwal)) : ?>
						<tr>
							<td colspan="6">
								<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>
							</td>
						</tr>
					<?php endif; ?>

					<?php
					foreach ($jadwal as $row) :
					?>

						<tr>
							<td><?= ++$start; ?></td>
							<td><?= $row->kode_wilayah; ?></td>
							<td><?= $row->tanggal; ?></td>
							<td><?= $row->mulai; ?></td>
							<td><?= $row->selesai; ?></td>
							<td><?= $row->kode_perwilayah; ?></td>
							<td>
								<a class="badge badge-success" data-toggle="modal" data-target="#editJadwal<?= $row->id; ?>" href=""><i class="fas fa-fw fa-edit"></i></a>
								<a class="badge badge-danger" data-toggle="modal" data-target="#deleteJadwal<?= $row->id; ?>"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Data Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/tambahDataJadwal'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
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
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ($jadwal as $row) : ?>
	<div class="modal fade" id="editJadwal<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Edit Data Jadwal Tanggal <?= $row->tanggal; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/editDataJadwal'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">

							<label style="color:#FE804D;" class="form-label" for="id">Id</label>
							<input type="hidden" class="form-control mb-2" id="id" name="id" placeholder="Id" value="<?= $row->kode_wilayah; ?>" required>

							<label style="color:#FE804D;" class="form-label" for="kode_wilayah">Kode Wilayah</label>
							<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" placeholder="Kode Wilayah" value="<?= $row->kode_wilayah; ?>" required>

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

<?php foreach ($jadwal as $row) : ?>
	<div class="modal fade" id="deleteJadwal<?= $row->id; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Hapus Data Tanggal : <?= $row->tanggal; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<a class="btn btn-primary" href="<?= base_url('admin/deleteDataJadwal'); ?>/<?= $row->id; ?>">Delete</a>
				</div>

			</div>
		</div>
	</div>
<?php endforeach; ?>
