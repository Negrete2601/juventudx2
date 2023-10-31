<?php
	include('../../controller/funciones.php');
	include('../../model/reportes/fill.php');

	$filtros = fill_filtros();
	$options = fill_options($filtros)
;	user_login();
?>
<style type="text/css">
	#student_chosen{
		width: 80% !important;
	}

	#escuela_chosen{
		width: 80% !important;
	}
	#depe_chosen{
		width: 80% !important;
	}
	#tipo_chosen{
		width: 80% !important;
	}
	#espe_chosen{
		width: 80% !important;
	}
</style>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Reporte general</a>
		</li>

		<!-- <li class="active">Registro de Usuarios</li> -->
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>Reporte general
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Filtros
			</small>
		</h1>
	</div><!-- /.page-header -->

	<div class="col-md-2"></div>

	<div class="col-md-8">
		<div class="row">
			<h2>Filtros para reporte:</h2>

			<div class="col-xs-12 col-md-4 col-sm-4">
				<h4>Nombre del estudiante:</h4>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="ace-icon fa fa-users"></i>
					</span>
					<select class="chosen-select input-xlarge" name="student" id="student">
						<option value="0" >Todos</option>
						<?=$options[0];?>						
					</select>
				</div>
			</div>

			<div class="col-xs-12 col-md-4 col-sm-4" >
				<h4>Escuela</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-university"></i>
						</span>
						<select class="chosen-select input-xlarge" name="escuela" id="escuela">
							<option value="0" >Todos</option>
							<?=$options[1];?>						
						</select>						
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-4 col-sm-4" >
				<h4>Áreas receptoras</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-building"></i>
						</span>
						<select class="chosen-select input-xlarge" name="depe" id="depe">
							<option value="0" >Todos</option>
							<?=$options[2];?>						
						</select>						
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-sm-6" >
				<h4>Especialidad</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-university"></i>
						</span>						
						<select class="chosen-select input-xlarge" name="espe" id="espe">
							<option value="0" >Todos</option>
							<?=$options[3];?>						
						</select>						
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-sm-6" >
				<h4>Tipo de tramite</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-folder-open"></i>
						</span>						
						<select class="chosen-select input-xlarge" name="tipo" id="tipo">
							<option value="" >Todos</option>
							<option value="0">Servicio social</option>
							<option value="1">Prácticas profesionales</option>
						</select>						
					</div>
				</div>
			</div>			

			<div class="col-xs-12"><hr></div>
			<h4 class="center">Por rango de fechas:</h4><br>

			<div class="col-xs-12 col-md-6 col-sm-6">
				<h4>Fecha Inicial:</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-calendar"></i>
						</span>
						<input class="input-xlarge date-picker" name ="fecha_ini" id="fecha_ini" type="text" data-date-format="yyyy-mm-dd" placeholder="Selecciona la fecha inicial" readonly="" />
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-sm-6">
				<h4>Fecha Final:</h4>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="ace-icon fa fa-calendar"></i>
						</span>
						<input class="input-xlarge date-picker" name ="fecha_fin" id="fecha_fin" type="text" data-date-format="yyyy-mm-dd" placeholder="Selecciona la fecha final" readonly="" />
					</div>
				</div>
			</div>

			<div class="col-xs-12"><hr><br></div>
		</div>
	</div>
	<div class="col-md-2"></div>

	<div class="col-xs-12" style="width: 100%; margin-right: 10px; margin-left: 10px">
		<div style="text-align: center;">
			<button style="margin-bottom: 5px;" type="button" class="btn btn-primary" onclick="generar_reporte(document.getElementById('student').value, document.getElementById('escuela').value, document.getElementById('depe').value, document.getElementById('tipo').value, document.getElementById('fecha_ini').value, document.getElementById('fecha_fin').value, document.getElementById('espe').value);return false;">
				<span class="ace-icon fa fa-bar-chart icon-on-right bigger-110"></span>
				Generar Reporte
			</button>

			&nbsp; &nbsp; &nbsp;
			<button style="margin-bottom: 5px;" class="btn btn-danger" type="reset" onclick="cambiarcont('/view/reportes/reporte.php');">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reiniciar Filtros
			</button>
		</div>
	</div>

	<div class="col-xs-12"><hr><br></div>

	<div class="row">
		<div class="col-xs-12">
			<div id="carga_info"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function tablita()
	{
		//initiate dataTables plugin
		var myTable =
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
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
				style: 'multi'
			}
	    } );



		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
			  {
				"extend": "colvis",
				"text": "<i class='fa fa-search bigger-110 blue'></i> <span style='font-size:9px'>Mostrar/ocultar columnas</span>",
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
				"text": "<i class='fa fa-table bigger-110 orange'></i> <span>Exportar</span>",
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
		} );
		myTable.buttons().container().appendTo( $('.tableTools-container') );

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

		////

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
		} );
		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		} );




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
	}

	$('.clockpicker').clockpicker({
	    placement: 'top',
	    align: 'left',
	    donetext: 'Seleccionar'
	});

	;(function($){
		$.fn.datepicker.dates['es'] = {
			days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
			daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
			daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
			months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
			monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
			today: "Hoy",
			monthsTitle: "Meses",
			clear: "Borrar",
			weekStart: 0,
			format: "dd/mm/yyyy"
		};
	}(jQuery));

	$('.date-picker').datepicker({
		language: 'es',
		autoclose: true,
		todayHighlight: true
	})

	if(!ace.vars['touch'])
	{
		$('.chosen-select').chosen({allow_single_deselect:true});
		//resize the chosen on window resize

		/*$(window)
		.off('resize.chosen')
		.on('resize.chosen', function() {
			$('.chosen-select').each(function() {
				 var $this = $(this);

				 $this.next().css({'width': $this.parent().width()});
			})
		}).trigger('resize.chosen');
		//resize chosen on sidebar collapse/expand
		$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
			if(event_name != 'sidebar_collapsed') return;
			$('.chosen-select').each(function() {
				 var $this = $(this);
				 $this.next().css({'width': $this.parent().width()});
			})
		});*/


		$('#chosen-multiple-style .btn').on('click', function(e){
			var target = $(this).find('input[type=radio]');
			var which = parseInt(target.val());
			if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
			 else $('#form-field-select-4').removeClass('tag-input-style');
		});
	}

	function generar_reporte(student,escuela,depe,tipo,fecha_ini,fecha_fin,espe)
	{
		var xmlhttp;
		var datos = 'stu='+student+'&esc='+escuela+'&fi='+fecha_ini+'&ff='+fecha_fin+'&depe='+depe+'&tipo='+tipo+'&espe='+espe;

		if (fecha_ini>fecha_fin) { swal("Tip", "La Fecha final debe ser igual o mayor a la Fecha inicial.", "info"); return;}
		if ((fecha_ini==="")&&(fecha_fin!="")) { swal("Tip", "Favor de ingresar la Fecha inicial.", "info"); return;}

		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				waitingDialog.hide();
				document.getElementById("carga_info").innerHTML=xmlhttp.responseText;
				tablita();
			}
		}

		waitingDialog.show('Generando reporte...', {dialogSize: 'sm', progressType: 'purple'});
		xmlhttp.open("POST","./model/reportes/fill_reporte.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(datos);
	}
	
	function chosen_select()
	{
		if(!ace.vars['touch']) {
			$('.chosen-select').chosen({allow_single_deselect:true});
			//resize the chosen on window resize

			/*$(window)
			.off('resize.chosen')
			.on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);

					 $this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			});*/


			$('#chosen-multiple-style .btn').on('click', function(e){
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
				 else $('#form-field-select-4').removeClass('tag-input-style');
			});
		}
	}
</script>

