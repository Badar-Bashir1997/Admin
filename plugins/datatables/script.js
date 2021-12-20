$(document).ready(function() {
	
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": true, "targets": 3 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        		'csvHtml5',
				'excelHtml5',
        		'pdfHtml5',
				'print'
			]
		}
	);
});

$(document).ready(function() {
	
	$('#example1').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": true, "targets": 3 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        		'csvHtml5',
				'excelHtml5',
        		'pdfHtml5',
				'print'
			]
		}
	);
});

$(document).ready(function() {
	
	$('#example2').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": true, "targets": 3 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        		'csvHtml5',
				'excelHtml5',
        		'pdfHtml5',
				'print'
			]
		}
	);
});

$(document).ready(function() {
	
	$('#example3').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"columnDefs": [
				{ "orderable": true, "targets": 3 }
			],
			"buttons": [
				'colvis',
				'copyHtml5',
        		'csvHtml5',
				'excelHtml5',
        		'pdfHtml5',
				'print'
			]
		}
	);
});