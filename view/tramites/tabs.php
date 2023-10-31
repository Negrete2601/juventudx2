<?php	
	include('../../model/tramites/fill.php');
	$id = $_POST['id'];//ES EL NOMBRE DEL TAB EN LA QUE SE ENCUENTRA
	switch ($id) {
			case 'pendientes':
				$tramites = fill_tramites_pendientes();		
				break;
			case 'proceso':
				$tramites = fill_tramites_proceso();		
				break;
			case 'atendidas':
				$tramites = fill_tramites_atendidos();		
				break;			
		}
	$tr_tramites = fill_tr_tramites_admin($tramites);	
?>

<div id="<?=$id;?>" class="tab-pane in active">
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
								<i class="fa-regular fa-clock bigger-110 ico_hid"></i>
									Horas
								</th>

								<th >
									<i class="ace-icon fa fa-sliders bigger-110 ico_hid"></i>
									Etapa
								</th>

								<th>
									<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
									Acciones
								</th>
							</tr>
						</thead>

						<tbody>
							<?=$tr_tramites;?>			
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

