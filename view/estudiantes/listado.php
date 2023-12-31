<?php	
	include('../../controller/funciones.php');
	include('../../model/estudiantes/fill.php');	
	user_login();
	$pendientes = fill_estudiantes_pendientes();
	$tr_pendientes = fill_tr_estudiantes_pendientes($pendientes);
?>


<style type="text/css">
	
	 
	
</style>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Estudiantes</a>
		</li>
		<li class="active">Listado de Solicitudes</li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content"> 
	<div class="page-header">		
		<h1>
			Estudiantes
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de Solicitudes
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">
				<div class="message-container">
					<div id="id-message-list-navbar" class="message-navbar clearfix">
						<div class="">							
							<div class="message-infobar clearfix" id="id-message-infobar">
								<span style="display: block;" class="blue bigger-170"></span>
								<span style="display: inline-block;" class="grey bigger-140">Solicitudes registradas</span> 
								<hr style="border-width: 1px; border-color: #b3bbc9;">									
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<div class="message-container">
											<div id="id-message-list-navbar" class="message-navbar clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>

											<div class="message-list-container">
												<div class="message-list" id="message-list">
													<div>
														<table id="dynamic-table" class="table table-striped table-bordered table-hover">
															<thead>
																<tr>
																	<th>
																		<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
																		Nombre del estudiante
																	</th>

																	<th class="hid_xs">
																		<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
																		CURP
																	</th>


																	<th class="hid_xs">
																		<i class="ace-icon fa fa-map-marker bigger-110 ico_hid"></i>
																		Domicilio
																	</th>

																	<th>
																		<i class="ace-icon fa fa-phone bigger-110 ico_hid"></i>
																		Celular
																	</th>

																	<th >
																		<i class="ace-icon fa fa-envelope bigger-110 ico_hid"></i>
																		Correo Electrónico
																	</th>

																	<th>
																		<i class="ace-icon fa fa-facebook bigger-110 ico_hid"></i>
																		Link a Facebook
																	</th>
																	
																	<th>
																		<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
																		Acciones
																	</th>
																</tr>
															</thead>

															<tbody>
																<?=$tr_pendientes;?>
															</tbody>
														</table>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>	
	</div>
</div>

<script>
	jQuery(function($){
		//initiate dataTables plugin
		var myTable =
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable({
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null,null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
	        //"bServerSide": true,
	        //"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			//"sScrollY": "200px",
			//"bPaginate": false,

			//"sScrollX": "100%",
			//"sScrollXInner": "120%",
			//"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				// style: 'multi'
			}
	    });

		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
			  {
				"extend": "colvis",
				"text": "<i class='fa fa-search bigger-110 blue'></i> <span>Columnas</span>",
				"className": "btn btn-white btn-primary btn-bold",
				columns: ':not(:first):not(:last)'
			  },
			  {
				"extend": "copy",
				"text": "<i class='fa fa-copy bigger-110 pink'></i> <span>Copiar</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "csv",
				"text": "<i class='fa fa-table bigger-110 orange'></i> <span>Tablas</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "excel",
				"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "pdf",
				"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "print",
				"text": "<i class='fa fa-print bigger-110 grey'></i> <span>Imprimir</span>",
				"className": "btn btn-white btn-primary btn-bold",
				autoPrint: false,
				message: 'This print was produced using the Print button for DataTables'
			  }
			]
		});
		myTable.buttons().container().appendTo( $('.tableTools-container'));

		//style the message box
		var defaultCopyAction = myTable.button(1).action();
		myTable.button(1).action(function (e, dt, button, config) {
			defaultCopyAction(e, dt, button, config);
			$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		});

		var defaultColvisAction = myTable.button(0).action();
		myTable.button(0).action(function (e, dt, button, config) {

			defaultColvisAction(e, dt, button, config);


			if($('.dt-button-collection > .dropdown-menu').length == 0) {
				$('.dt-button-collection')
				.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				.find('a').attr('href', '#').wrap("<li />")
			}
			$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
		});

		setTimeout(function() {
			$($('.tableTools-container')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);

		myTable.on( 'select', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
			}
		});
		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		});

		/////////////////////////////////
		//table checkboxes
		$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

		//select/deselect all rows according to table header checkbox
		$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header

			$('#dynamic-table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) myTable.row(row).select();
				else  myTable.row(row).deselect();
			});
		});

		//select/deselect a row when the checkbox is checked/unchecked
		$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
			var row = $(this).closest('tr').get(0);
			if(this.checked) myTable.row(row).deselect();
			else myTable.row(row).select();
		});

		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});

		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}
	});

	function recha_acep(id_estudiante, tipo)
	{
		if(tipo==2)
		{
			titulo="Rechazar?";
			texto="¿Seguro que desea rechazar la solicutud?";
		} else{
			titulo="Aceptar?";
			texto="¿Desea aceptar la solicutud?";
		}

		swal({
		  	title: titulo,
		  	text: texto,
		  	icon: "info",
		 	buttons: ["Cancelar", "Ok"],
		  	dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				var data = {
					'id_estudiante' : id_estudiante,
					'tipo' : tipo,
				}

				$.ajax({
					data:  data,
					url:   './model/estudiantes/aceptar_rechazar.php',
					type:  'post',

					success:  function (data) {
						if (data==='correcto'){
							swal({
							  title: "¡Datos guardados correctamente!",
							  icon: "success",
							}).then( (value) => {
								cambiarcont('view/estudiantes/listado.php');
							});
						}

						if (data==='error'){
							swal({
							  title: "¡Error!",
							  text: "¡Ocurrio algo al hace el cambio!",
							  icon: "error",
							});
						}
					}
				});
			}
		});
	}
</script>