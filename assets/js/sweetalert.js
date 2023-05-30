$(document).ready(function () {
	$(".btn-delete").on("click", function (e) {
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
