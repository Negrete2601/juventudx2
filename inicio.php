<?php
	include('controller/funciones.php');
	include('model/inicio/fill.php');
	$tipo_usuario = $_SESSION['id_tipo_usuario'];
	$menu = fill_menu($tipo_usuario);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"  />
		<meta charset="utf-8" />
		<title>Servicio social y prácticas profesionales -- Municipio de Jesús María</title>

		<meta name="description" content="Oficialia de Partes - Municipio de Jesús María" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<script src="https://kit.fontawesome.com/477a7a7e11.js" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="assets/css/own/bienvenida.css" />
		<!--DROPZONE-->
		<link rel="stylesheet" href="assets/css/dropzone.min.css" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-treeview.css" />
		<link rel="stylesheet" href="assets/css/clockpicker.css" />
		<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css?dp-version=1549984893" />


		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>


		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">
			body{
				padding: 0 !important;
			}
		</style>

	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="inicio.php" class="navbar-brand">
						<small>
							<!-- <img src="img/2.png" width="30"> -->
							Control de servicio social y prácticas profesionales
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">						
						<?php
							if ($tipo_usuario!=5){
								echo '<li class="dropdown-modal" id="push">
		                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
		                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
		                        <span class="badge"><input type="hidden" id="noti" name="noti" value="0"/>0</span>
		                    </a>

		                    <ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
		                        <li class="dropdown-header">
		                            <i class="ace-icon fa fa-check"></i>
		                            Todo en orden
		                        </li>

		                        <li class="dropdown-content">
		                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
		                                
		                            </ul>
		                        </li>
		                    </ul>
		               				  </li>';
		               		}
		                ?>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">

								<span class="user-info">
									<small>Bienvenido,</small>
									<?= $_SESSION['nombre_completo']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">								
							<?php
							if ($tipo_usuario!=2){
								echo '<li>
									<a href="javascript:cambiarcont(\'view/estudiantes/perfil.php\');">
										<i class="ace-icon fa fa-pencil"></i>
										Editar perfil
									</a>
							</li>
							<li class="divider"></li>';
		               		}
		                ?>
							
							  <li>
									<a href="index.php?modo=desconectar">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar Sesión
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="active">
						<a href="inicio.php">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?=$menu;?>					
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">

				<div class="main-content-inner" id="body_content" name="body_content"></div>
			</div>
		</div>

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						Municipio de Jesús María 2021 - 2024
					</span>


					&nbsp; &nbsp;
					<span class="action-buttons">
					</span>
				</div>	
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/dropzone.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/spin.js"></script>
		<script src="assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/jquery.colorbox.min.js"></script>
		<script src="assets/js/wizard.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootstrap-load.js"></script>
		<script src="assets/js/bootstrap-treeview.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
		<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
		<script src="assets/js/bootstrap-editable.min.js"></script>
		<script src="assets/js/ace-editable.min.js"></script>
		<script src="assets/js/clockpicker.js"></script>
		<script src="assets/js/markdown.min.js"></script>
		<script src="assets/js/bootstrap-markdown.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/tree.min.js"></script>

		<!--Alert-->
		<script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>
		<script>			
		$(document).on("click","#veracep",function(){
			window.open("TCPDF-main/examples/example_001.php");
		});
		$(document).on("click","#verpre",function(){
			window.open("TCPDF-main/examples/examplee_001.php");
		});
			var files="";
			var tipo_usuario = <?= $tipo_usuario; ?>;

			function cambiarcont(pagina)
			{
			    $("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
			    $("#body_content").load(pagina);
				$("#body_content").fadeIn(10000);
			}

			$(document).ready(function() {
				switch (tipo_usuario) {
				  	case 1:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/bienvenida.php');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 2:
				    	$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/tramites/listado_admin.php');
						$("#body_content").fadeIn(10000);
				    	break;
				  	case 5:
				  		$("#body_content").html("<img src='img/exit.gif' class='img-responsive center-block' alt='Cargando...' />");
					    $('#body_content').load('view/tramites/listado.php');
						$("#body_content").fadeIn(10000);
				    	break;
				}				
			});

			$("#sidebar ul.nav li").click(function(){
				$("#sidebar ul.nav li.active").removeClass("active");
				$(this).addClass("active");
			});

			function dynamic()
			{
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
			}

			function fill_tabs(li)
		    {

		    	var pantalla = $("#pantalla").val();

		    	var id = '';
		    	if (!li) {
		    		id = 'pendientes';
		    	}else{
			    	id = li.childNodes[1].getAttribute('href').split('#')[1];
		    	}

		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){

		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("tabs").innerHTML=xmlhttp.responseText;
		                waitingDialog.hide();
		                dynamic();
		            }
		        }

		        var datos_modal = "id=" + id + "&pantalla=" + pantalla;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./view/tramites/tabs.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_info(id)
		    {
		    	var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }
		        
		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){
		            
		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                document.getElementById("load_modal_info").innerHTML=xmlhttp.responseText;
		                waitingDialog.hide();
		                $('#modal_info').modal('show');	             
		            }
		        }
	        	var datos_modal = "id=" + id; 
		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_info.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_update_docs(id, id_estudiante, nombre, etapa)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){

		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_up").innerHTML=xmlhttp.responseText;
		                dropzone();
		                check_inputs();
		                $('#modal_up').modal('show');
		                waitingDialog.hide();
		            }
		        }

		        var datos_modal = 'id=' + id +'&nombre='+ nombre + '&id_estudiante=' + id_estudiante + '&etapa=' + etapa;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_up_docs.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_down_docs(id)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){

		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_down").innerHTML=xmlhttp.responseText;
		                $('#modal_down').modal('show');
		                waitingDialog.hide();
		            }
		        }

		        var datos_modal = 'id=' + id;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_down_docs.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_se_area(id,area)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){

		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_se_area").innerHTML=xmlhttp.responseText;
		                $('#modal_area').modal('show');
		                waitingDialog.hide();
		            }
		        }

		        var datos_modal = 'id=' + id+'&area='+area;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_select_area.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }

		    function fill_modal_fill_hr(id,id_estudiante,nombre)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){
		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_fill_hrs").innerHTML=xmlhttp.responseText;
		                $('#modal_hrs').modal('show');
		                waitingDialog.hide();
		            }
		        }

		        var datos_modal = 'id=' + id + '&id_estudiante=' + id_estudiante + '&nombre=' + nombre;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_fill_hrs.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		        xmlhttp.send(datos_modal);
		    }
			function fill_modal_fill_datos(id)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){
		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_fill_datos").innerHTML=xmlhttp.responseText;
		                $('#modal_datos').modal('show');
						waitingDialog.hide();

		                update_datos();
		            }
		        }
		        var datos_modal = 'id=' + id;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_fill_datos.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send(datos_modal);
		    }
			function update_datos(){
				$('#form_datos').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			matricula: {
				required: true,
				minlength: 3
			},
			destinatario: {
				required: true,
				minlength: 3
			},
			cargo: {
				required: true,
				minlength: 3
			},
			inicio: {
				required: true,
				minlength: 3
			},
			fin: {
				required: true,
				minlength: 3
			}
			

		},

		messages: {
			matricula: {
				required: "*Ingrese su matricula.",
				minlength: "Demaciado corto."
			},
			destinatario: {
				required:"*Ingrese el nombre del destinatario.",
				minlength: "Demaciado corto."
			},
			cargo: {
				required: "*Ingrese el cargo del destinatario.",
				minlength: "Demaciado corto."
			},
			inicio: {
				required: "*Seleccione la fecha de inicio por favor.",
				minlength: "Demaciado corto."
			},
			fin: {
				required: "*Seleccione la fecha de termino por favor.",
				minlength: "Demaciado corto."
			},
		},


		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		}
	});
}
function fill_modal_fill_datos2(id)
		    {
		        var xmlhttp;

		        if (window.XMLHttpRequest){
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp=new XMLHttpRequest();
		        }

		        else{// code for IE6, IE5
		            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		        }

		        xmlhttp.onreadystatechange=function(){
		            if (xmlhttp.readyState==4 && xmlhttp.status==200){
		                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
		                document.getElementById("load_modal_fill_datos2").innerHTML=xmlhttp.responseText;
		                $('#modal_datos').modal('show');
						waitingDialog.hide();

		                update_datos();
		            }
		        }
		        var datos_modal = 'id=' + id;

		        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
		        xmlhttp.open("POST","./model/tramites/modal_fill_datos2.php",true);
		        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send(datos_modal);
		    }

		    function upload_docs()
		    {
		    	var comp = $('#docs').next();
				comp = $(comp).hasClass("selected");
				
				if(comp == true){
			    	var myForm = document.getElementById('form_docs');
					var formData = new FormData(myForm);
					if (files!=""){
						$.each(files, function(key, value)
					    {
					        formData.append(key, value);
					    });
					}

					$.ajax({
						data:  formData,
						url:   './model/tramites/upload_docs.php',
						type:  'post',
						processData: false,
			            contentType: false,

						success:  function (data) {

							if (data==='correcto'){
								swal({
									title: "¡Correcto!",
									text: "¡Documentos cargados correctamente!",
									icon: "success"
								});
								cambiarcont('view/tramites/listado_admin.php');						
							}

							if (data==='error'){
								swal({
									title: "¡Error!",
									text: "¡Ocurrió algo al guardar!",
									icon: "error"
								});
							}
						}
					});
				}else{
					swal({
		                title: "¡Error!",
		                text: "No has seleccionado ningún archivo",
		                icon: "error",
		                button: "Aceptar"
		            });
				}	
		    }

		    function actualiza_status(id, comp, tipo, area)
		    {
		    	var titulo = "";
		    	var texto = "";
				
		    	if(tipo==0)
				{
					titulo="Rechazar?";
					texto="¿Seguro que desea rechazar la solicutud?";
				} else if((tipo==1)&&(comp!==0)){
					titulo="Se aprobara esta solicitud";
					texto="¿Desea continuar?";
				} else{
					titulo="¿Aprobar?";
					texto="¿Desea aprobar la solicutud?";
				}
				
				const input_recha = document.createElement('div');				
				input_recha.innerHTML = '<textarea class="col-md-12" name="mot_recha" id="mot_recha" placeholder="Descripción del rechazo" required minlength="0" ></textarea><br>';

				swal({
				  	title: titulo,
				  	text: texto,
				  	icon: "info",
				 	buttons: ["Cancelar", "Ok"],
				  	dangerMode: true,
				}).then((willDelete) => {
					if (willDelete) {

						if(tipo==0)
						{
							$('#modal_info').modal('hide');
							swal({
							  	title: "Descripción",
							  	text: "Describa el motivo del rechazo:",
							  	buttons: ["Cancelar", "Enviar"],
							  	icon: "info",
							  	content: input_recha,
						    }).then((value) => {
						    	if (value) {
						    		if ($("#mot_recha").val()=="") { swal("Tip", "Ingresa la descripción del rechazo.", "info"); return;}

						    		var data = {
										'id' : id,
										'tipo' : 2,
										'comp' : $("#mot_recha").val(),
									}

									$.ajax({
										data:  data,
										url:   './model/tramites/actualiza_status.php',
										type:  'post',

										success:  function (data) {

											if (data==='correcto'){
												swal({
												  title: "¡Datos guardados correctamente!",
												  icon: "success",
												}).then( (value) => {
													$('.modal-backdrop').remove();
													cambiarcont('view/tramites/listado_admin.php');
												});
											}

											if (data==='error'){
												swal({
												  title: "¡Error!",
												  text: "¡Ocurrio algo al actualizar el estatus!",
												  icon: "error",
												});
											}
										}
									});

						    	}else{
						    		swal("¡Cancelado!", "No se ha rechazado la solicutud", "error");
						    		$('#modal_info').modal('show');
						    	}
						    });								
						} else{
							
							if ((tipo==1)&&(comp===0))
							{
								fill_modal_se_area(id,area);
							} else if((tipo==1) && (comp.length===0)){
								swal({
								  	title: "¡Error!",
								  	text: "¡Favor de llenar todos los campos!",
								  	icon: "warning",
								});
							} else{

								var data = {
									'id' : id,
									'tipo' : tipo,
									'comp' : comp,
								}

								
								$.ajax({
									data:  data,
									url:   './model/tramites/actualiza_status.php',
									type:  'post', 


									success:  function (data) {
									
										if (data==='correcto'){
											swal({
											  title: "¡Datos guardados correctamente!",
											  icon: "success",
											}).then( (value) => {
												$('.modal-backdrop').remove();
												cambiarcont('view/tramites/listado_admin.php');												
											});
										}

										if (data==='error'){
											swal({
											  title: "¡Error!",
											  text: "¡Ocurrio algo al actualizar el estatus!",
											  icon: "error",
											});
										}
									}
								});
							}
						}

					}else{
						swal("¡Cancelado!", "No se han hecho cambios la solicitud", "error");
						$('#modal_info').modal('show');
					}
				});
		    }
			function seleccionar()
			{
				let cbx = document.getElementById('select');
				let opcion = cbx.value;
				if(opcion == "suma"){
					document.getElementById('xd').innerText = "cargar";
				}
				if(opcion == "resta"){
					document.getElementById('xd').innerText = "eliminar ";
				}
				

			}
			function val(hechas, limite, nuevas, id, select){
				if(select == "resta"){
					horas = parseInt(nuevas) * -1;
				}else{
					horas = parseInt(nuevas);
				}
				limit = parseInt(limite);
				suma = parseInt(hechas) + parseInt(nuevas);
				base = parseInt(hechas);
				if(limit >= suma && select!="resta")
				{
					guarda_horas(parseInt(id),horas)
				}
				if(select == "resta" && base<=nuevas)
				{
					swal({
					  	title: "¡Excede el limite de horas!",
					  	text: "¡intenta con un número menor!",
					  	icon: "error",
					});
				}
				if(select == "resta" && base>=nuevas)
				{
					guarda_horas(parseInt(id),horas)
				}
				if( limit < suma)
				{
					swal({
					  	title: "¡Error!",
					  	text: "¡Excede el limite de horas!",
					  	icon: "warning",
					});
				}
				
			}
		    function guarda_horas(id, horas)
		    {

		    	if(horas==""){
					swal({
					  	title: "¡Error!",
					  	text: "¡Favor de llenar todos los campos!",
					  	icon: "warning",
					});
				} else{

					var data = {
						'id' : id,
						'horas' : horas,
					}

					
					$.ajax({
						data:  data,
						url:   './model/tramites/save_horas.php',
						type:  'post',

						success:  function (data) {
						
							if (data==='correcto'){
								swal({
								  title: "¡Datos guardados correctamente!",
								  icon: "success",
								}).then( (value) => {
									$('.modal-backdrop').remove();
									cambiarcont('view/tramites/listado_admin.php');												
								});
							}

							if (data==='error'){
								swal({
								  title: "¡Error!",
								  text: "¡Ocurrio algo al guardar!",
								  icon: "error",
								});
							}
						}
					});
				}
		    }
		   
		    function check_inputs()
		    {
		    	$('input[type=file]').on('change', prepareUpload);
		    }

		    function prepareUpload(event)
			{
			  files = event.target.files;
			}

		    function dropzone()
		    {
		    	$('#docs').ace_file_input({
					style: 'well',
					btn_choose: 'Arrastra o da click para agregar archivos',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
		    }

		    function show_hide_modals()
		   	{
				$('#modal_area').on('shown.bs.modal', function (e) {
		  			$('#modal_info').modal('hide');
				});

				$('#modal_area').on('hide.bs.modal', function (e) {
		  			$('#modal_info').modal('show');
				});
			}

			function push()
			{
				if(typeof(EventSource)!=="undefined")
				{
					var noti = $("#noti").val();
				  	var source = new EventSource("./model/tramites/monitor.php");
				  	// console.log("entro");
				  	source.onmessage=function(event)
				    {
				    	// console.log(event.data);
						document.getElementById("push").innerHTML=event.data;/*Aqui se muestra el globo de notificación si hay cambios*/
						if (noti==0){
							// console.log("sin purpura");
							$("#push").removeClass("purple");
						} else{
							// console.log("purpura");
							$("#push").addClass("purple");
						}
						source.close();
				    };
				    source.onerror = function(e) {
					  	// console.log("Fallo EventSource.");
					};
				}
				else
				{
					document.getElementById("push").innerHTML="0";
		  		}
		  		setTimeout('push()',10000);
			}

			if (tipo_usuario!=5)
			{
				setTimeout('push()',10000);
			}
			
		</script>
	</body>
</html>
