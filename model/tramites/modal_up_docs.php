<div id="modal_up" class="modal" tabindex="-1" style="overflow-y:auto;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="blue">Cargar documentos
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Servicio social de <?=$_POST['nombre'];?>
					</small>
				</h3>
			</div>

			<div class="modal-body">
				<div class="row">

					<div class="col-xs-12">
						<div class="form-group">
							<div class="col-xs-12">
								<form id="form_docs" method="POST">
									<input type="hidden" name="id_tramite" id="id_tramite" value="<?= $_POST['id'] ?>">
									<input type="hidden" name="id_estudiante" id="id_estudiante" value="<?= $_POST['id_estudiante'] ?>">
									<input type="hidden" name="etapa" id="etapa" value="<?= $_POST['etapa'] ?>">
									<input multiple type="file" id="docs" name="docs" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times">&nbsp;</i>Cerrar</button>
				<button type="button" class="btn btn-success" data-dismiss="modal" onclick="upload_docs()"><i class="fa fa-upload">&nbsp;</i>Cargar</button>
			</div>
		</div>	
	</div>
</div>
