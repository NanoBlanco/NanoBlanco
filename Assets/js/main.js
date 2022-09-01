
$(document).ready(function() {
	
	// Functions to operate sidebar menu
	(function () {
		"use strict";

		var treeviewMenu = $('.app-menu');

		// Toggle Sidebar
		$('[data-toggle="sidebar"]').click(function(event) {
			event.preventDefault();
			$('.app').toggleClass('sidenav-toggled');
		});

		// Activate sidebar treeview toggle
		$("[data-toggle='treeview']").click(function(event) {
			event.preventDefault();
			if(!$(this).parent().hasClass('is-expanded')) {
				treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
			}
			$(this).parent().toggleClass('is-expanded');
		});

		// Set initial active toggle
		$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

		//Activate bootstrip tooltips
		$("[data-toggle='tooltip']").tooltip();

	})();
	
	// DataTables Config
	$('#example2').DataTable({
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': false,
		language: {
			"decimal": "",
			"emptyTable": "No hay datos",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
			"infoEmpty": "Mostrando 0 a 0 de 0 registros",
			"infoFiltered": "(Filtro de _MAX_ total registros)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ registros",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "No se encontraron coincidencias",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Próximo",
				"previous": "Anterior"
			},
			"aria": {
				"sortAscending": ": Activar orden de columna ascendente",
				"sortDescending": ": Activar orden de columna desendente"
			}
		}
	});
});


