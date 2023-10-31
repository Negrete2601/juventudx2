<?php	
	include('../../controller/funciones.php');	
	user_login();
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
		<li class="active">Listado de Trámites</li>
	</ul><!-- /.breadcrumb -->	
</div>

<div class="page-content"> 
	<div class="page-header">		
		<h1>
			Estudiantes
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de Trámites
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
								<span style="display: inline-block;" class="grey bigger-140">Trámites registrados</span>
								<hr style="border-width: 1px; border-color: #b3bbc9;">									
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
											<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">

												<li class="active" onclick="fill_tabs(this)">
													<a data-toggle="tab" href="#pendientes" data-target="pendientes">
														<i class="orange ace-icon fa fa-clock-o bigger-130"></i>
														<span class="bigger-110">Pendientes</span>
													</a>
												</li>

												<li class="" onclick="fill_tabs(this)">
													<a data-toggle="tab" href="#proceso" data-target="proceso">
														<i class="blue ace-icon fa fa-hourglass-half bigger-130"></i>
														<span class="bigger-110">En Proceso</span>
													</a>
												</li>

												<li class="" onclick="fill_tabs(this)">
													<a data-toggle="tab" href="#atendidas" data-target="atendidas">
														<i class="green ace-icon fa fa-check bigger-130"></i>
														<span class="bigger-110">Finalizadas</span>
													</a>
												</li>

											</ul>

											<div class="tab-content no-border no-padding" id="tabs">
												<!--AQUI SE IMPRIMEN LAS TABS-->
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
	
	<div id="load_modal_info"></div>
	<div id="load_modal_up"></div>
	<div id="load_modal_se_area"></div>
	<div id="load_modal_fill_hrs"></div>
</div>

<script>
	$(document).ready(
		fill_tabs()
	);
	
</script>