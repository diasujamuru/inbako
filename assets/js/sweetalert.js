$(document).ready(function () {
	$(".btn-delete-warga").on("click", function (e) {
		e.preventDefault();

		var deleteUrl = $(this).data("url");

		Swal.fire({
			title: "Apakah anda yakin?",
			text: "Kamu akan menghapus data warga!",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",

			confirmButtonText: "Hapus Data",
			customClass: {
				confirmButton: "btn btn-danger",
				cancelButton: "btn btn-primary ms-2",
			},
		}).then(function (result) {
			if (result.isConfirmed) {
				// Redirect ke URL deleteUrl
				window.location.href = deleteUrl;
			}
		});
	});
});
$(document).ready(function () {
	$(".btn-delete-petugas").on("click", function (e) {
		e.preventDefault();

		var deleteUrl = $(this).data("url");

		Swal.fire({
			title: "Apakah anda yakin?",
			text: "Kamu akan menghapus data petugas!",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",

			confirmButtonText: "Hapus Data",
			customClass: {
				confirmButton: "btn btn-danger",
				cancelButton: "btn btn-primary ms-2",
			},
		}).then(function (result) {
			if (result.isConfirmed) {
				// Redirect ke URL deleteUrl
				window.location.href = deleteUrl;
			}
		});
	});
});

$(document).ready(function () {
	$("#formTambahData").on("submit", function (e) {
		e.preventDefault();

		var form = $(this);
		var url = form.attr("action");

		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(),
			dataType: "json",
			success: function (response) {
				if (response.status == "error") {
					// Tampilkan pesan error dengan SweetAlert
					Swal.fire({
						title: "Opps",
						html: response.message,
						icon: "warning",
						customClass: {
							htmlContainer: "no-margin",
							confirmButton: "btn btn-danger",
							cancelButton: "btn btn-primary ms-2",
						},
					});
				} else {
					Swal.fire({
						title: "Success",
						text: "Data berhasil ditambahkan",
						icon: "success",
					}).then(function () {
						// Redirect ke halaman dataPetugas setelah pengguna menutup SweetAlert
						window.location.href = "dataPetugas";
					});
				}
			},
		});
	});
});
