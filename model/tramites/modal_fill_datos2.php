<style type="text/css">
    #giro_chosen, .chosen-container-multi .chosen-choices li.search-field, .chosen-container-multi .chosen-choices li.search-field input[type="text"]{
        width: 100% !important;
    }
</style>


<div id="modal_datos" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="blue">Carta de aceptación</h2>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="alert alert-block alert-warning">
						<i class="ace-icon fa fa-info-circle bigger-130 yellow"></i>
						Favor de ingresar la siguiente información para generar su carta de aceptación
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-8">
						<form id="form_datos" name="form_datos" method="post" action="TCPDF-main/examples/examplee_001.php" target="_blank">
						<fieldset>
                            <div class="form-group">
                                <label class="col-md-12 control-label">Matrícula o ID </label>  
                                    <div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-file-o"></i></span>
										<input name="matricula" id="matricula" placeholder="Matricula o ID del alumno" class="col-xs-12 col-sm-10" type="text" required/>
									</div>
                             </div>
                             <div class="form-group">
                                <label class="col-md-12 control-label">Nombre del destinatario</label>  
                                    <div class="input-group">
										<span class="input-group-addon">	<i class="fa fa-envelope"></i></span>
										<input name="destinatario" id="destinatario" placeholder="¿A quien sera dirigida la carta?" class="col-xs-12 col-sm-10" type="text" required onchange="javascript:this.value=this.value.toUpperCase();"/>
									</div>
                             </div>
							 <div class="form-group">
                                <label class="col-md-12 control-label">Cargo</label>  
                                    <div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user-tie"></i></span>
										<input name="cargo" id="cargo" placeholder="ej. Director, Tutor" class="col-xs-12 col-sm-10" type="text" required />
									</div>
                             </div>
							 <div class="form-group">
							 <label class="col-md-12 control-label">Perido comprendido</label>
									<div class="row">
										<div class="col-sm-6">
										<label class="col-md-12 control-label">Fecha de inicio:</label>	
										</div>
										<div class="col-sm-6">
										<label class="col-md-12 control-label">Fecha de Termino:</label>	
										</div>
									</div> 
									<div class="input-group">
       									<span class="input-group-addon"><i class="fa fa-light fa-calendar"></i></span>
										   <input type="date" id="inicio" name="inicio" min="2021-01-01" max="2024-12-31" required> 
										   <span class="input-group-addon"><i class="fa fa-light fa-calendar"></i></span>
										   <input type="date" id="fin" name="fin" min="2021-01-01" max="2024-12-31" required>       
    								</div>     
    								</div>
							</div>
						
                       		<br><br><br><br>
							   </fieldset>
							   
						</form>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" ><i class="fa fa-times">&nbsp;</i>Cancelar</button>
				<button type="submit" form="form_datos" class="btn btn-primary"> <i class="ace-icon fa fa-file-pdf-o"></i> &nbsp;Descargar</button>
			</div>

		</div>	
	</div>
</div>