/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

const flashData = $(".flash-data").data("flashdata");
const flashDanger = $(".flash-danger").data("flashdata");

if (flashData) {
	Swal.fire({
		title: "Success",
		text: flashData,
		type: "success",
	});
}
if (flashDanger) {
	Swal.fire({
		title: "Warning",
		text: flashDanger,
		type: "warning",
	});
}

