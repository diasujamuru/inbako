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
					<form action="<?= base_url('mahasiswa'); ?>" method="post">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari data.. " name="keyword" autocomplete="off" autofocus>
							<div class="input-group-append">
								<input class="btn btn-primary" type="submit" name="submit">
							</div>
						</div>
					</form>
				</div>
			</div>

			<a class="btn mb-3" style="background-color:#FE804D; color: white;" align="center" data-toggle="modal" data-target="#newMahasiswa">Tambah Data Petugas</a>


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

					<?php
					foreach ($petugas as $row) :
					?>

						<tr>
							<td><?= $row->nik; ?></td>
							<td><?= $row->nama; ?></td>
							<td><?= $row->kota; ?></td>
							<td><?= $row->email; ?></td>
							<td><?= $row->kecamatan; ?></td>
							<td><?= $row->kelurahan; ?></td>
							<td><?= $row->kode_wilayah; ?></td>
							<td><?= $row->status; ?></td>
						</tr>

					<?php endforeach; ?>
				</tbody>
			</table>

			<hr class="container-divider">

		</div>
	</div>
</div>
</div>
</div>
