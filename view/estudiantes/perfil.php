
<?php
	include('../../controller/funciones.php');
	include('../../model/usuarios/fill.php');
	$curp = $_SESSION['usuario'];
	$estudiantes = get_id_estudiantes($curp);
?>
<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li class="active">Perfil de usuario</li>
	</ul><!-- /.breadcrumb -->	
</div>
<div class="page-content"> 
	<div class="page-header">		
		<h1>
			Perfil de usuario
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				 Información Personal
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
    <div class="user-profile row">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-16">
                <li class="active modalu">
                    <a data-toggle="tab" href="#edit-basic" aria-expanded="true">
                    <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                     Editar Información Básica
                    </a>
                </li>
                <li class="modalu">
                    <a data-toggle="tab" href="#edit-password" aria-expanded="false">
                    <i class="blue ace-icon fa fa-key bigger-125"></i>
                     Editar Contraseña
                    </a>
                </li>
            </ul>

            <div class="tab-content profile-edit-tab-content">
                <div id="edit-basic" class="tab-pane active">
                <div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<div class="space-6"></div>
											<form name="form_register" id="form_register" method="POST" action="">
											<h4 class="header blue bolder smaller">Información Básica</h4>
												<fieldset>
												<input type="hidden" name="idestudiante" id="idestudiante" value="">
                                                <div class="form-group">
                                                    <label class="no-padding-right">Apellido Paterno <FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-user"></i></span>
                                                         <input name="apaterno" id="apaterno" placeholder="Apellido Paterno" class="col-xs-12 col-sm-10" type="text" value="" required minlength="5" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="no-padding-right">Apellido Materno <FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-user-o" aria-hidden="true"></i></span>
                                                         <input name="amaterno" id="amaterno" placeholder="Apellido Materno" class="col-xs-12 col-sm-10" type="text" value="" required minlength="5" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="no-padding-right">Nombre<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                                                         <input name="name" id="name" placeholder="Nombre" class="col-xs-12 col-sm-10" type="text" value="" required minlength="2" />
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="no-padding-right">Edad<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
                                                         <input type="number" name="edad" id="edad" class="form-control valid" placeholder="Edad" required="" aria-required="true" aria-describedby="edad-error" aria-invalid="false">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="no-padding-right">Fecha de nacimiento<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-user"></i></span>
														 <input type="date" id="fecha_nac" name="fecha_nac" min="1980-01-01" max="2024-12-31" required="" aria-required="true">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="no-padding-right">Lugar de Nacimiento<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
														 <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar de Nacimiento" required="" aria-required="true">
                                                    </div>
                                                </div>
												<div class="form-group">
        											<label class="no-padding-right">Dirección<FONT COLOR="red">*</FONT></label>
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i></span>
																<input id="calle" type="text" name="calle" value="" class="form-control" placeholder="Calle" required minlength="1">
															<span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
																<input id="no_ext" type="number" name="no_ext" value="" class="form-control" placeholder="Número Exterior" required minlength="1">
															<span class="input-group-addon"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
																<input id="no_int" type="number" name="no_int" value="" class="form-control" placeholder="Número Interior">
															<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
																<input id="colonia" type="text" name="colonia" value="" class="form-control" placeholder="Colonia/Comunidad" required minlength="1">
															<span class="input-group-addon"><i class="fa fa-light fa-calendar" aria-hidden="true"></i></span>
																<input id="c_p" type="number" name="c_p" value="" class="form-control" placeholder="Código Postal" required minlength="1">
															
														</div>
												</div>
                                                <div class="form-group">
                                                    <label class="no-padding-right">Telefono<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-mobile"></i></span>
                                                         <input name="tel" id="tel" placeholder="Número de celular" class="col-xs-12 col-sm-10" type="number" value="" required minlength="2" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="no-padding-right">Correo Electrónico<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-envelope"></i></span>
                                                         <input name="email" id="email" placeholder="Correo Electrónico" class="col-xs-12 col-sm-10" type="email" value="" required minlength="2" />
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="no-padding-right">Link de facebook<FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="ace-icon fa fa-facebook"></i></span>
                                                         <input type="text" name="face" id="face" class="form-control" placeholder="Link de Facebook" required="" aria-required="true">
                                                    </div>
                                                </div>
													<div class="clearfix">
													<button type="submit" class="btn btn-primary"> <i class="ace-icon fa fa-floppy-o"></i> &nbsp;Actualizar</button>
				</button>
													</div>
												</fieldset>
											</form>
										</div>
									</div><!-- /.widget-body -->
								</div>
                </div>
                <div id="edit-password" class="tab-pane">
				<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<div class="space-6"></div>
											<form method="post" id="form_password">
											<h4 class="header blue bolder smaller">Editar Contraseña</h4>
												<fieldset>
												<input type="hidden" name="id" id="id" value="<?= $_SESSION['id_usuario']; ?>">
                                                <div class="form-group">
                                                    <label class="no-padding-right">Nueva Contraseña <FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-lock"></i></span>
                                                         <input name="password" id="password" placeholder="Nueva contraseña" class="col-xs-12 col-sm-10" type="password" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
												<label class="no-padding-right">Confirmar Contraseña <FONT COLOR="red">*</FONT></label>
                                                    <div class="input-group">
                                                         <span class="input-group-addon">	<i class="fa fa-lock"></i></span>
                                                         <input name="repassword" id="repassword" placeholder="Confirmar Contraseña" class="col-xs-12 col-sm-10" type="password" required/>
                                                    </div>
                                                </div>
                                                
													<div class="clearfix">
													<button type="submit" class="btn btn-primary"> <i class="ace-icon fa fa-floppy-o"></i> &nbsp;Actualizar</button>
													</div>
												</fieldset>
											</form>
										</div>
									</div><!-- /.widget-body -->
								</div>

                </div>
            </div>
        </div>
    </div>
    </div>
		
	</div>
	
	<div id="load_modal_info"></div>
	<div id="load_modal_up"></div>
	<div id="load_modal_new"></div>
	<div id="load_modal_down"></div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¡Alerta!</h4>
      </div>
      <div class="modal-body">
        <p>Estas a punto de modificar información importante</p>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-info" data-dismiss="modal">Continuar</button>
      <a type="button" class="btn btn-danger" href="?c=Usuario&a=Crud">Cancelar</a>
        
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
  $(".modalu").click(function(){
    $("#myModal").modal({backdrop: "static"});
  });
});
</script>				
<script>
		$('#form_register').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			apaterno: {
				required: true,
				minlength: 4
			},
			amaterno: {
				required: true,
				minlength: 4
			},
			name: {
				required: true,
				minlength: 4
			},
			edad: {
				required: true,
				minlength: 1
			},
			fecha_nac: {
				required: true,
				minlength: 1
			},
			lugar: {
				required: true,
				minlength: 1
			},
			calle: {
				required: true,
				minlength: 1
			},
			no_ext: {
				required: true,
				minlength: 1
			},
			colonia: {
				required: true,
				minlength: 1
			},
			c_p: {
				required: true,
				minlength: 1
			},
			tel: {
				required: true,
				minlength: 10
			},
			email: {
				required: true,
				minlength: 4
			},
			face: {
				required: true,
				minlength: 1
			}


		},

		messages: {
			apaterno: {
				required: "Favor de ingresar su apellido paterno.",
				minlength: "El apellido paterno es demasiado corto."
			},
			
			amaterno: {
				required: "Favor de ingresar su apellido materno.",
				minlength: "El apellido materno es demasiado corto."
			},
			name: {
				required: "Favor de ingresar su nombre.",
				minlength: "El nombre es demasiado corto."
			},
			edad: {
				required: "Favor de ingresar su edad.",
				minlength: "Es demasiado corto."
			},
			fecha_nac: {
				required: "Favor de seleccionar su fecha de nacimiento.",
				minlength: "Es demasiado corto."
			},
			lugar: {
				required: "Favor de igresar tu lugar de nacimiento.",
				minlength: "No es una ciudad valida."
			},
			calle: {
				required: "Favor de ingresar el nombre de la calle.",
				minlength: "Es demasiado corto."
			},
			no_ext: {
				required: "Favor de ingresar el número exterior.",
				minlength: "Es demasiado corto."
			},
			colonia: {
				required: "Favor de ingresar el nombre de su Colonia/Fraccionamiento/Comunidad.",
				minlength: "Es demasiado corto."
			},
			c_p: {
				required: "Favor de ingresar su número postal.",
				minlength: "Es demasiado corto."
			},
			tel: {
				required: "Favor de ingresar su número de telefono.",
				minlength: "Favor de ingresar 10 dígitos"
			},
			email: {
				required: "Favor de ingresar su correo electrónico.",
				minlength: "La dirección de correo electrónico es demasiado corta"
			},
			face: {
				required: "Favor de ingresar el Link a su cuenta de Facebook.",
				minlength: "Es demasiado corto."
			}
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
				"id" : $('#idestudiante').val(),		               
				"apaterno" : $('#apaterno').val(),
				"amaterno" : $('#amaterno').val(),
				"name" : $('#name').val(),
				"edad" : $('#edad').val(),
				"fecha_nac" : $('#fecha_nac').val(),
				"lugar" : $('#lugar').val(),
				"calle" : $('#calle').val(),
				"no_ext" : $('#no_ext').val(),
				"no_int" : $('#no_int').val(),
				"colonia" : $('#colonia').val(),
				"c_p" : $('#c_p').val(),
				"tel" : $('#tel').val(),
				"email" : $('#email').val(),
				"face" : $('#face').val(),
			};
			
			$.ajax({
					data:  parametros,
					url:   './model/estudiantes/update_estudiante.php',
					type:  'post',
					
					success:  function (data) {
															
							if (data==='correcto'){
								swal.fire({
										title:'Datos Modificados con éxito',
										icon: "success",
										confirmButtonText:'Aceptar',
										footer:'Aceptar para seguir navegando',
										width:'30%',
										position:'center',
										allowOutsideClick: false,
										allowEscapekey: false,
										allowEnterkey: false,
										confirmButtonColor:'#269abc',
										confirmButtonAriaLabel:'confirmar',
										showCancelButton: false,
										cancelButtonText:'Cancelar',
										cancelButtonAriaLabel:'Cancelar',
										buttonsStyling: true, 
										showCloseButton: true,
										closeButtonAriaLabel:'cerrar alerta',
										imageWidth:'100',
										});

								cambiarcont('view/tramites/listado.php');
							}
							
							if (data==='error2'){
								swal({
								  title: "¡Error Grave!",
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
	$('#form_password').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			password: {
				required: true,
				minlength: 6
			},
			repassword: {
				required: true,
				equalTo: "#password"
			}
		},

		messages: {
			password: {
				required: "Ingresar una contraseña.",
				minlength: "La contraseña es muy corta."
			},
			
			repassword: {
				required: "Ingresar nuevamente la contraseña.",
				equalTo: "Las contraseñas no coinciden."
			}
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
				"password" : $('#password').val(),
				"id" : $('#id').val(),
			};
			
			$.ajax({
					data:  parametros,
					url:   './model/usuarios/update_password.php',
					type:  'post',
					
					success:  function (data) {
															
							if (data==='correcto'){
								swal.fire({
										title:'Contraseña modificada con éxito',
										icon: "success",
										confirmButtonText:'Aceptar',
										footer:'Aceptar para seguir navegando',
										width:'30%',
										position:'center',
										allowOutsideClick: false,
										allowEscapekey: false,
										allowEnterkey: false,
										confirmButtonColor:'#269abc',
										confirmButtonAriaLabel:'confirmar',
										showCancelButton: false,
										cancelButtonText:'Cancelar',
										cancelButtonAriaLabel:'Cancelar',
										buttonsStyling: true, 
										showCloseButton: true,
										closeButtonAriaLabel:'cerrar alerta',
										imageWidth:'100',
										});

								cambiarcont('view/tramites/listado.php');
							}
							
							if (data==='error2'){
								swal({
								  title: "¡Error Grave!",
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
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $(".actualizar").click(function(){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: '¿Estas seguro?',
  text: "Se eliminara permanentemente",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si, Eliminar!',
  cancelButtonText: 'No, cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Eliminado',
      'El registro ha sido eliminado.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Tu registro ha sido salvado :)',
      'error'
    )
  }
})
    });
});
</script>
