// Call the dataTables jQuery plugin
$(document).ready(function () {
	$('#dataTable').DataTable({
		order: [
			[2, 'desc']
		],
	});
	$('#dataPesanan').DataTable({
		order: false
	});
	$('#dataPelanggan').DataTable({
		order: [
			[0, 'asc']
		],
	});
});
