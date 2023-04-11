<div class="container" style="color: #FE804D;">

	<br>

	<div class="text-center">
		<br>
		<h1 class="fw-bolder">Jadwal Pengambilan</h1>
	</div>

	<div class="text-center">
		<a type="button" data-target="#newJadwal" data-toggle="modal" style="background-color: #FE804D;" class="btn text-white">Buat Jadwal Pengambilan</a>
	</div>

	<div class="modal fade" id="newJadwal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Buat Jadwal Pengambilan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('mahasiswa/tambahmhs'); ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label class="form-label">Kode Wilayah : </label>
							<input type="number" class="form-control mb-2" id="kode_wilayah" name="kode_wilayah" required>
							<label class="form-label">Tanggal : </label>
							<input type="date" class="form-control mb-2" id="tgl" name="tgl"  required>
							<label class="form-label" for="jamAwal">Dari Jam : </label>
							<input type="time" class="form-control mb-2" id="jam_awal" name="jam_awal" placeholder="Jam Awal" required>
							<label class="form-label">Sampai Jam : </label>
							<input type="time" class="form-control mb-2" id="jam_tenggat" name="jam_tenggat" placeholder="Jam Tenggat" required>
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

</div>
