<div class="container" style="color: #FE804D;">

	<br>

	<div class="text-center">
		<br>
		<h1 class="fw-bolder"><?= $title;?></h1>
	</div>

	<br>

	<table class="table table-hover text-dark table-responsive">
		<thead class="table-secondary">
			<tr>
				<th scope="col">No</th>
				<th scope="col">NIK</th>
				<th scope="col">Nama</th>
				<th scope="col">Kelurahan</th>
				<th scope="col">Kecamatan</th>
				<th scope="col">Kota</th>
				<th scope="col">RT</th>
				<th scope="col">RW</th>
				<th scope="col">TTL</th>
				<th scope="col">No. Telepon</th>
				<th scope="col">Kode Wilayah</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php
			foreach ($warga as $row) :
			?>

				<tr>
					<td><?= $i++ ?></td>
					<td><?= $row->nik; ?></td>
					<td><?= $row->nama; ?></td>
					<td><?= $row->kelurahan; ?></td>
					<td><?= $row->kecamatan; ?></td>
					<td><?= $row->kota; ?></td>
					<td><?= $row->rt; ?></td>
					<td><?= $row->rw; ?></td>
					<td><?= $row->ttl; ?></td>
					<td><?= $row->no_telpon; ?></td>
					<td><?= $row->kode_wilayah; ?></td>

				</tr>
			<?php endforeach; ?>
	</table>

</div>