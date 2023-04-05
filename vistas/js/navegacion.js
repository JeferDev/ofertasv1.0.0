$(document).ready(function() {
			// Avanza a la siguiente pestaña
			$('#nextTab1').click(function() {
				$('#pills-tab li:eq(1) a').tab('show');
			});

			// Retrocede a la pestaña anterior
			$('#prevTab2').click(function() {
				$('#pills-tab li:eq(0) a').tab('show');
			});
		});
	
