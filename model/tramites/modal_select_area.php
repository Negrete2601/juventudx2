<?php
	$id = $_POST['id'];
	$area = $_POST['area'];
?>

<style type="text/css">
    #giro_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
</style>


<div id="modal_area" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="blue">Área a asignar</h2>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="alert alert-block alert-warning">
						<i class="ace-icon fa fa-info-circle bigger-130 yellow"></i>
						Seleccionar el área a la que sera asignado el estudiante; por default estarán insertartadas las áreas que el estudiante eligió, favor de sólo seleccionar una.
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-8">
						<form id="form_gen_re" name="form_gen_re">
                            <div class="form-group">
                                <label class="col-md-12 control-label">Seleccione el área a asignar </label>  
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group col-sm-12">
                                        <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                        <input name="area" id="area" placeholder="Seleccione el área a asignar" class="col-xs-10 col-sm-10" type="text" value="<?=$area?>" required />
                                    </div>
                                </div>
                            </div>
                       		<br><br><br><br>

						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn pull-left" data-dismiss="modal" onclick="show_hide_modals()"><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="actualiza_status(<?=$id;?>,document.getElementById('area').value,1,0)"><i class="fa fa-floppy-o">&nbsp;</i>Guardar</button>
			</div>

		</div>	
	</div>
</div>


