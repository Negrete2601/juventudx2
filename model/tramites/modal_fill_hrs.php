<?php
	$id = $_POST['id'];
	$id_estudiante = $_POST['id_estudiante'];
	$nombre = $_POST['nombre'];
	include('../../controller/tramites/funciones_tramites.php');
	$tot = get_total($id);
	$hech = get_hechas($id)
?>
<style type="text/css">
    #giro_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
</style>
<div id="modal_hrs" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="blue">Modificación de horas a <?=$nombre?></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="alert alert-block alert-warning">
						<i class="ace-icon fa fa-info-circle bigger-130 yellow"></i>
						Ingresar la suma de horas del estudiante. Favor de ingresar sólo números
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-8">
						<form id="form_hrs" name="form_hrs">
						<div class="form-group">
							<label class="col-md-12 control-label">Seleccionar:</label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
									<select name="select" id="select" onchange="seleccionar();">
  										<option value="suma">Cargar horas</option>
  										<option value="resta">Eliminar horas</option>
										</select>
                                    </div>
                                </div>
								<br>
								<br>
								<br>
                            <div class="form-group">
								<br>
                                <label class="col-md-12 control-label">Favor ingrese el total de horas a <span id="xd" style="color:red">cargar</span>:</label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input name="hrs" id="hrs" placeholder="Ingresar horas" class="col-xs-10 col-sm-10" type="number" required />
                                    </div>
									<br>
									<br>
									<br>
                                </div>
                            </div>
                       		<br>
							<br>
							<br>
							<br>
						</form>
					</div>
				</div>
			</div>	
			<div class="modal-footer">
				<button type="button" class="btn pull-left" data-dismiss="modal" ><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="val(<?=$hech['realizado']; ?>,<?=$tot['horas']; ?>,document.getElementById('hrs').value,<?=$id;?>, document.getElementById('select').value)"><i class="fa fa-floppy-o">&nbsp;</i>Guardar</button>
			</div>
		</div>	
	</div>
</div>