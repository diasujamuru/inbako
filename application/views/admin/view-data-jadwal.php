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

			<a class="btn mb-3" style="background-color:#FE804D; color: white;" align="center" data-toggle="modal" data-target="#newMahasiswa">Tambah Data Jadwal</a>


			<table class="table table-hover text-dark">
				<thead class="table-secondary">
					<tr>
						<th scope="col">Kode Wilayah</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Mulai</th>
						<th scope="col">Selesai</th>
						<th scope="col">Kode Perwilayah</th>
					</tr>
				</thead>
				<tbody>

				<?php
					foreach ($jadwal as $row) :
				?>

					<tr>
						<td><?= $row->kode_wilayah; ?></td>
						<td><?= $row->tanggal; ?></td>
						<td><?= $row->mulai; ?></td>
						<td><?= $row->selesai; ?></td>
						<td><?= $row->kode_perwilayah; ?></td>
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
