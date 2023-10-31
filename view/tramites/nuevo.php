<?php 
	include('../../controller/funciones.php');
	user_login();
?>
 
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Estudiantes</a>
		</li>

		<li class="active">Registro de Trámites</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	

	<div class="page-header">
		<h1>Estudiantes
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Registro de Trámites
			</small>
		</h1>
		
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->


			<div class="container">
				<form class="well form-horizontal" method="post" id="form_tramite">
					<fieldset>

						<!-- Form Name -->
						<legend>Registro de Trámites</legend>

						<!-- Text input-->
						<div class="form-group">
						  	<label class="col-md-4 control-label">Nombre de la escuela<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-building"></i></span>
									<input  name="escuela" id="escuela" placeholder="Nombre de la escuela" class="form-control" type="text" required/>
									<input  name="curp" id="curp" type="hidden" value="<?=$_SESSION['usuario']?>"/>
								</div>
						  	</div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  	<label class="col-md-4 control-label">Especialidad<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
									<input  name="especialidad" id="especialidad" placeholder="Especialidad" class="form-control" type="text" required/>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Modalidad<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
									<select name="modalidad" id="modalidad" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<option value="0">Semestral</option>
										<option value="2">Cuatrimestral</option>
									</select>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Horario<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
									<input name="horario" id="horario" placeholder="Horario de servicio o prácticas" class="form-control" type="text" required/>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Tipo de trámite<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-book"></i></span>
									<select name="tipo" id="tipo" class="form-control selectpicker" required>
										<option value="">Seleccione una opción</option>
										<option value="0">Servicio social</option>
										<option value="1">Prácticas profesionales</option>
									</select>
								</div>
						  	</div>
						</div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Horas a realizar<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
									<input name="horas" id="horas" placeholder="Horas a realizar" class="form-control" type="number" required/>
								</div>
						  	</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">¿Tienes alguna enfermedad crónica o alergia?<FONT COLOR="red">*</FONT></label>
							<div class="col-md-4">
								<div class="radio">
									<label>
										<input checked="checked" class="cro" type="radio" name="enfermedad" id="enfermedad" value="0" required/> No
									</label>
								</div>
								<div class="radio">
									<label>
										<input  type="radio" class="cro" name="enfermedad" id="enfermedad" value="1" required/> Si
									</label>
								</div>
							</div>
						</div>

						<div class="form-group" id="div_enfe" style="display:none;">
						  	<label class="col-md-4 control-label">Discribe cual<FONT COLOR="red">*</FONT></label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<input name="cual" id="cual" placeholder="Discribe cual enfermedad" class="form-control" type="text"/>
								</div>
						  	</div>
						</div>

						<div class="form-group">
                            <label class="col-md-4 control-label">Selecciona 3 áreas en las que te gustaría hacer tus prácticas o servicio <FONT COLOR="red">*</FONT></label>  
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon"><i class="fa fa-check-circle-o"></i></span>
                                    <input  name="servicios" id="servicios" placeholder="Servicios existentes" class="form-control" type="text" required/> -->
                                    <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Clic aquí para mas información de las áreas, horarios, etc." title="Información"><a href="#modal_info" role="button" data-toggle="modal">?</a></span>
                                    <span class="input-group-addon"><i class="fa fa-check-circle-o"></i></span>
                                    <select multiple="" class="chosen-select form-control tag-input-style" name="secre" id="secre" data-placeholder="Seleccionar las áreas...">
                                        <option value="SERVICIOS PÚBLICOS">SERVICIOS PÚBLICOS</option>
										<option value="CONTRALORIA">CONTRALORIA</option>
										<option value="DIF">DIF</option>
										<option value="DESARROLLO ECONÓMICO">DESARROLLO ECONÓMICO</option>
										<option value="INSTANCIA DE LA SALUD">INSTANCIA DE LA SALUD</option>
										<option value="INSTANCIA DE LA MUJER">INSTANCIA DE LA MUJER</option>
										<option value="INSTANCIA DE LA JUVENTUD">INSTANCIA DE LA JUVENTUD</option>
										<option value="SEDATUM">SEDATUM</option>
										<option value="CASA DE MÚSICA">CASA DE MÚSICA</option>
										<option value="MEDIO AMBIENTE">MEDIO AMBIENTE</option>
										<option value="INSTANCIA DEL DEPOR">INSTANCIA DEL DEPORTE</option>
										<option value="SEGURIDAD PÚBLICA">SEGURIDAD PÚBLICA</option>
										<option value="PROTECCIÓN CIVI">PROTECCIÓN CIVIL</option>
										<option value="FINANZAS">FINANZAS</option>
										<option value="ADMINISTRACIÓN">ADMINISTRACIÓN</option>
										<option value="ACCIÓN CÍVICA">ACCIÓN CÍVICA</option>
										<option value="REGIDORES">REGIDORES</option>
										<option value="SECRETARIA PARTICULAR">SECRETARIA PARTICULAR</option>
										<option value="H. AYUNTAMIENTO">H. AYUNTAMIENTO</option>
										<option value="INNOVACIÓN TECNOLÓGICA">INNOVACIÓN TECNOLÓGICA</option>
										<option value="OBRAS PÚBLICAS">OBRAS PÚBLICAS</option>
										<option value="INSTANCIA DE LA FERIA">INSTANCIA DE LA FERIA</option>
                                    </select>
                                </div>

                            </div>
                        </div>

						<div class="form-group">
						  	<label class="col-md-4 control-label">Observaciones</label>  
						  	<div class="col-md-4 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<textarea name="obs" id="obs" placeholder="Observaciones" class="form-control"></textarea>
								</div>
						  	</div>
						</div>

						<!-- Button -->
						<div class="form-group">
						  	<label class="col-md-4 control-label"></label>
						  	<div class="col-md-4">
								<button type="submit" class="btn btn-success"> <i class="ace-icon fa fa-floppy-o"></i> &nbsp;Guardar</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!-- MODAL -->
			<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h2 class="blue">Información de áreas</h2>
						</div>

						<div class="modal-body">
							<div class="row">								
								<div class="col-xs-12 contenedor-tabla">
									<table class="table table-bordered table-hover" id="tabla_areas">
										<thead>
											<tr>													
												<th>Área</th>
												<th>Especialidades</th>
												<th>Horario</th>
												<th>Días</th>
												<th class="hidden"></th>
												<th class="hidden"></th>
												<th class="hidden"></th>												
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>SERVICIOS PÚBLICOS</td>
												<td>NIVEL BACHILLERATO, LIC. DERECHO, ING. ELECTRICO, MÉDICO VETERINARIO, BIÓLOGOS, ING. MECÁNICO, ING. INDUSTRIAL</td>
												<td>8:00 AM- 8:00 PM</td>
												<td>LUNES - VIERNES</td>
												<td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>CONTRALORIA</td>
												<td>NIVEL BACHILLERATO, LIC. CONTABILIDAD, DERECHO</td>
												<td>8:30 AM- 4:00PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>DIF</td>
												<td>NIVEL BACHILLERATO, LIC. DERECHO, PSICOLOGÍA, PEDAGOGÍA, ENFERMERÍA, NUTRICIÓN, TERAPIA FISICA, MEDICO CIRUJANO, TRABAJO SOCIAL, DISEÑO GRÁFICO</td>
												<td>FIJO 8:30 AM- 4:00PM , PUEDE VARIAR SEGÚN LAS NECESIDADES</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>DESARROLLO ECONÓMICO</td>
												<td>LIC. ADMINISTRACIÓN DE EMPRESAS, GESTIÓN EMPRESARIAL</td>
												<td>8:30 AM- 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INSTANCIA DE LA SALUD</td>
												<td>NIVEL BACHILLERATO, LIC. KINESIOLOGIA, PARAMÉDICO</td>
												<td>8:30 AM - 7:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INSTANCIA DE LA MUJER</td>
												<td>NIVEL BACHILLERATO, PSICOLOGIA</td>
												<td>8:30 AM - 7:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INSTANCIA DE LA JUVENTUD</td>
												<td>NIVEL BACHILLERATO, LIC. DERECHO, PSICOLOGIA, NUTRICIÓN, COMUNICACIÓN, CULTURA FISICA Y DEPORTE, ARTES ASCÉNICAS, TEATRO, INFORMÁTICA.</td>
												<td>8:30 AM - 8:00 PM, VARIA FINES DE SEMANA</td>
												<td>LUNES - DOMINGO</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>SEDATUM</td>
												<td>NIVEL BACHILLERATO, ARQUITECTURA, DERECHO, URBANISMO, AGRONOMIA</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>CASA DE MÚSICA</td>
												<td>NIVEL BACHILLERATO</td>
												<td>8:30 AM - 7:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>MEDIO AMBIENTE</td>
												<td>NIVEL BACHILLERATO</td>
												<td>8:30 AM - 7:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INSTANCIA DEL DEPORTE</td>
												<td>CULTURA FISICA Y DEPORTES</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>SEGURIDAD PÚBLICA</td>
												<td>NIVEL BACHILLERATO, DERECHO, DISEÑO GRÁFICO, CRIMINOLOGÍA</td>
												<td>8:30 AM - 7:00 PM CON POSIBLE VARIACIÓN</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>PROTECCIÓN CIVIL</td>
												<td>PARÁMEDICOS, CRIMINALÍSTICA</td>
												<td>8:30 AM - 4:00 PM CON POSIBLE VARIACIÓN</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>FINANZAS</td>
												<td>NIVEL BACHILLERATO, CONTABILIDAD</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>ADMINISTRACIÓN</td>
												<td>NIVEL BACHILLERATO, RECURSOS HUMANOS, ADMINISTRACIÓN</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>ACCIÓN CÍVICA</td>
												<td>NIVEL BACHILLERATO</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>REGIDORES</td>
												<td>NIVEL BACHILLERATO, ADMINISTRACIÓN</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>SECRETARIA PARTICULAR</td>
												<td>NIVEL BACHILLERATO, ADMINISTRACIÓN</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>H. AYUNTAMIENTO</td>
												<td>NIVEL BACHILLERATO, ADMINISTRACIÓN</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INNOVACIÓN TECNOLÓGICA</td>
												<td>INFÓRMATICA</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>OBRAS PÚBLICAS</td>
												<td>NIVEL BACHILLERATO, ARQUITECTURA, ING. CIVIL</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>

											<tr>
												<td>INSTANCIA DE LA FERIA</td>
												<td>NIVEL BACHILLERATO, TURISMO, DISEÑO GRÁFICO</td>
												<td>8:30 AM - 4:00 PM</td>
												<td>LUNES - VIERNES</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>	

						<div class="modal-footer">
							<button type="button" class="btn pull-left" data-dismiss="modal" ><i class="fa fa-times">&nbsp;</i>Cancelar</button>
						</div>

					</div>	
				</div>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->
				
<script>
	$('[data-rel=popover]').popover({container:'body'});
	
	$('#form_tramite').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			escuela: {
				required: true,
				minlength: 4
			},
			especialidad: {
				required: true,
				minlength: 4
			},
			modalidad: {
				required: true
			},
			horario: {
				required: true
			},
			tipo: {
				required: true
			},
			horas: {
				required: true
			},
			enfermedad: {
				required: true
			},
			secre: {
				required: true
			}
		},

		messages: {
			escuela: {
				required: "Ingresar el nombre de la escuela.",
				minlength: "Nombre demasiado corto."
			},
			especialidad: {
				required: "Ingresar su especialidad.",
				minlength: "Muy corto."
			},
			
			modalidad: {
				required: "Seleccione la modalidad una contraseña."
			},
			
			horario: {
				required: "Ingresar el horario dispónible para servicio o prácticas."
			},
			tipo: "Seleccionar el tipo de trámite.",
			horas: "Ingresar las horas a realizar.",
			enfermedad: "Seleccionar una opción.",
			secre: "Seleccionar una opción."
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
		},

		submitHandler: function (form) {
			var parametros = {
				"curp" : $('#curp').val(),              
				"escuela" : $('#escuela').val(),
				"especialidad" : $('#especialidad').val(),
				"modalidad" : $('#modalidad').val(),
				"horario" : $('#horario').val(),
				"tipo" : $('#tipo').val(),
				"horas" : $('#horas').val(),
				"discapacidad" : $('#enfermedad:checked').val(),
				"cual" : $('#cual').val(),
				"observaciones" : $('#obs').val(),
				"secre" : $('#secre').val(),
			};
			
			$.ajax({
				data:  parametros,
				url:   './model/tramites/creta_tramite.php',
				type:  'post',
				
				success:  function (data) {															
					if (data==='correcto'){
						swal({
						  title: "¡Datos guardados correctamente!",
						  icon: "success"								  
						});

						cambiarcont('view/tramites/listado.php');
					}
					
					if (data==='error'){
						swal({
						  title: "¡Error!",
						  text: "¡Ocurrio algo al guardar!",
						  icon: "error"								  
						});
					}

					if (data==='error1'){
						swal({
						  title: "¡Error!",
						  text: "¡Este usuario ya registró con anterioridad!",
						  icon: "warning"								  
						});
					}
				}
			});
		}
	
	});

	$(document).ready(function(){
		$('#tabla_areas').DataTable();
		$('#tabla_areas').removeAttr("style");
		if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true}); 
            //resize the chosen on window resize
    
            $(window)
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
            });
    
    
            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                 else $('#form-field-select-4').removeClass('tag-input-style');
            });            
        }

        $(".cro").click(function(evento){
        	console.log("entro al radio")        ;
            var valor = $(this).val();          
            if(valor == 0){
                $("#div_enfe").css("display", "none");
            }else{
                $("#div_enfe").css("display", "block");
            }
	    });
	});

	$("#secre").change(function () {
      	if($("#secre option:selected").length == 3) {
          	$("#secre_chosen").css('pointer-events', 'none');
          	console.log("jalaaaaaaaaaaaaaaaaaaa")
      	}
  });
</script>