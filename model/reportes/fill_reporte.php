<?php
	include('../../model/reportes/fill.php');
	$reportes = fill_reporte($_POST);
	$tr_reporte = fill_tr_reporte($reportes);
	//var_dump($_POST);	
?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<i class="fa fa-info-circle" aria-hidden="true"></i>

		<strong>Resultados del filtro:</strong>
	</div>

	<div class="row">
		<?=$tr_reporte[0];?>
	</div>

	<div class="col-xs-12"><hr><br></div>

	<div class="row">
		<div class="col-xs-12">
			<div id="carga_info">
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
									Nombre del alumno
								</th>

								<th class="hid_xs">
									<i class="ace-icon fa fa-building bigger-110 ico_hid"></i>
									Escuela
								</th>


								<th class="hid_xs">
									<i class="ace-icon fa fa-briefcase bigger-110 ico_hid"></i>
									Trámite
								</th>

								<th>
									<i class="ace-icon fa fa-briefcase bigger-110 ico_hid"></i>
									Área asignada
								</th>

								<th>
									<i class="ace-icon fa fa-clock-o bigger-110 ico_hid"></i>
									Horas a Realizadas
								</th>

								<th class="hidden"></th>
								<th class="hidden"></th>
							</tr>
						</thead>
						<tbody>
							<?=$tr_reporte[1];?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>