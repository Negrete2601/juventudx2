<?php
include('./controller/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"  />
		<meta charset="utf-8" />
		<title>Servicio social y prácticas profesionales -- Municipio de Jesús María</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />		
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="">
								<img src="img/logo_jm.png" width="370">
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h3 class="header blue lighter bigger" ALIGN=center>
												<i class="ace-icon fa fa-lock"></i>
												Acceso
											</h3>

											<div class="space-6"></div>

											<form name="login_user" id="form_login" method="POST" action="">
												<?php												 
													if(isset($_GET['modo']) == 'desconectar')
													{
														session_destroy();
														echo '<meta http-equiv="Refresh" content="2;url=../"> ';
														exit ('<div class="center" id="loading">Cerrando sesión...<br><img class="center" src="img/exit.gif" /></div>');
													}												
													if(isset($_SESSION['id_usuario']))
													{
														
														echo '<script type="text/javascript">window.location.href="inicio.php";</script>';
														//header("Location: http://mc.adminjm.org/inicio.php");
														exit; 
														
													}
													else
													{
												?>
												<fieldset>
													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" class="form-control" placeholder="CURP" name="nick" id="nick" title="Ingrese su CURP" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>


													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" title="Ingrese su Contraseña" required="required" />
																<i class="ace-icon fa fa-key"></i>
															</span>
														</label>
													</div>

													<div class="space"></div>
													
													
													<div class="clearfix">
														<button class="width-50 center-block btn btn-sm btn-primary" type="submit" name="login" value="Entrar">
															<i class="ace-icon fa fa-sign-in"></i>
															<span class="bigger-110">Iniciar Sesión</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
											<?php
												}
											?>
											<div class="space-6"></div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#modal_info" class="forgot-password-link" role="button" data-toggle="modal" style="color: black;">
													<i class="ace-icon fa fa-list"></i>
													Verifica tu universidad
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box">
													Deseo registrarme
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->


								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Registro de estudiante
											</h4>

											<div class="space-6"></div>
											<p> Ingresa tus datos: </p>

											<form name="form_register" id="form_register" method="POST" action="">
												<fieldset>
													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="apaterno" id="apaterno" class="form-control" placeholder="Apellido Paterno" required />
																<input type="text" name="amaterno" id="amaterno" class="form-control" placeholder="Apellido Materno" required />
																<input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="form-group">	
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
																<input type="password" name="repassword" id="repassword" class="form-control" placeholder="Confirmar Contraseña" required />
																<i class="ace-icon fa fa-key"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" required />
																<input type="number" name="no_ext" id="no_ext" class="form-control" placeholder="Número Exterior" required />
																<input type="number" name="no_int" id="no_int" class="form-control" placeholder="Número Interior" />
																<input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia/Comunidad" required />
																<input type="number" name="c_p" id="c_p" class="form-control" placeholder="Código Postal" required />
																<i class="ace-icon fa fa-map-marker"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input name="curp" id="curp" type="text" class="form-control mask_curp" onchange="mayus(this);" placeholder="CURP" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="number" name="edad" id="edad" class="form-control" placeholder="Edad" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="fecha_nac" id="fecha_nac" data-date-format="yyyy-mm-dd" class="form-control date-picker" placeholder="Fecha de Nacimiento" required readonly />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="lugar" id="lugar" class="form-control" placeholder="Lugar de Nacimiento" required />
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="tel" id="tel" class="form-control mask_cel" placeholder="Número de celular" required />
																<i class="ace-icon fa fa-phone"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required />
																<i class="ace-icon fa fa-envelope"></i>
															</span>
														</label>
													</div>

													<div class="form-group">
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="face" id="face" class="form-control" placeholder="Link de Facebook" required />
																<i class="ace-icon fa fa-facebook"></i>
															</span>
														</label>
													</div>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reiniciar Campos</span>
														</button>

														<button type="submit" name="register" class="pull-right btn btn-sm btn-success">
															<span class="bigger-110">Registrar</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Regresar a iniciar sesión
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div>


								<div id="modal_info" class="modal" tabindex="-1" style="overflow-y:auto;">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h2 class="blue">Universidades con convenio con el Municipio de Jesús María</h2>
											</div>

											<div class="modal-body">
												<div class="row">								
													<div class="col-xs-12 contenedor-tabla">
														<table class="table table-bordered table-hover" id="tabla_areas">
															<thead>
																<tr>													
																	<th>Nombre de la Universidad</th>												
																</tr>
															</thead>

															<tbody>
																<tr>
																	<td>SERVICIOS PÚBLICOS</td>
																</tr>

																<tr>
																	<td>CONTRALORIA</td>
																</tr>

																<tr>
																	<td>DIF</td>
																</tr>

																<tr>
																	<td>DESARROLLO ECONÓMICO</td>
																</tr>

																<tr>
																	<td>INSTANCIA DE LA SALUD</td>
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
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
			<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert@2.1.0/dist/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$('#tabla_areas').DataTable();
			$('#tabla_areas').removeAttr("style");
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {

				$('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });

			 
			});
		</script>
		<script>
			$('.mask_curp').mask('aaaa999999aaaaaa99', {reverse: true});
			$('.mask_cel').mask('9999999999', {reverse: true});
			
			document.getElementById("curp").addEventListener("click", onFocusValue);
			document.getElementById("tel").addEventListener("click", onFocusValue);
			
			function  onFocusValue () {
				this.setSelectionRange(0, 0);
   			}

			function mayus(e) {e.value = e.value.toUpperCase();}

			$('.date-picker').datepicker({
				language: 'es',
				autoclose: true,
				todayHighlight: true
			});

			$('#form_login').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					nick: {
						required: true
					},

					pass: {
						required: true
					}
				},
		
				messages: {
					nick: {
						required: "Favor de ingresar la CURP."
					},

					pass: {
						required: "Favor de ingresar la contraseña."
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
						"nick" : $('#nick').val(),
						"pass" : $('#pass').val()
					};
					
					
					$.ajax({
							data:  parametros,
							url:   './controller/funciones_logeo.php',
							type:  'post',
							
							success:  function (data) {
								if (data==='correcto'){
										
										location.reload();
									}
									
								if (data==='error'){
									swal({
									  title: "¡Error!",
									  text: "¡Contraseña incorrecta!",
									  icon: "warning",
									  button: "Aceptar"
									});
								}

								if (data==='error1'){
									swal({
									  title: "¡Error!",
									  text: "El usuario no existe, favor de registrarse",
									  icon: "warning",
									  button: "Aceptar"
									});
								}


								if (data==='error2'){
									swal({
									  title: "¡Error!",
									  text: "¡Favor de llenar todos los datos!",
									  icon: "error",
									  button: "Aceptar"
									});
								}
							}
					});
				}
			
			});


			$('#form_register').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					apaterno: {
						required: true
					},

					amaterno: {
						required: true
					},

					name: {
						required: true
					},

					password: {
						required: true
					},

					repassword: {
						required: true,
						equalTo: "#password"
					},

					calle: {
						required: true
					},

					no_ext: {
						required: true
					},

					colonia: {
						required: true
					},

					c_p: {
						required: true
					},

					curp: {
						required: true
					},

					edad: {
						required: true
					},

					fecha_nac: {
						required: true
					},

					lugar: {
						required: true
					},

					tel: {
						required: true
					},

					email: {
						required: true,
						email: true
					},

					face: {
						required: true
					}
				},
		
				messages: {
					apaterno: {
						required: "Ingresar su apellido paterno"
					},

					amaterno: {
						required: "Ingresar su apellido materno"
					},

					name: {
						required: "Ingresar su nombre"
					},

					password: {
						required: "Ingresar la contraseña para Ingresar al sistema"
					},

					repassword: {
						required: "Repetir la contraseña para Ingresar al sistema",
						equalTo: "Las contraseñas no coinciden."
					},

					calle: {
						required: "Ingresar la calle de su domicilio"
					},

					no_ext: {
						required: "Ingresar el número exterior de su domicilio"
					},

					colonia: {
						required: "Ingresar la colonia de su domicilio"
					},

					c_p: {
						required: "Ingresar el código postal de su domicilio"
					},

					curp: {
						required: "Ingresar su CURP"
					},

					edad: {
						required: "Ingresar su edad"
					},

					fecha_nac: {
						required: "Ingresar su fecha de nacimiento"
					},

					lugar: {
						required: "Ingresar su lugar de nacimiento"
					},

					tel: {
						required: "Ingresar su número de celular"
					},

					email: {
						required: "Ingresar su correo electrónico",
						email: "Ingresar una dirección de correo válida."
					},


					face: {
						required: "Ingresar el link a su página de Facebook"
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
						"apaterno" : $('#apaterno').val(),
						"amaterno" : $('#amaterno').val(),
						"name" : $('#name').val(),
						"password" : $('#password').val(),
						"repassword" : $('#repassword').val(),
						"calle" : $('#calle').val(),
						"no_ext" : $('#no_ext').val(),
						"no_int" : $('#no_int').val(),
						"colonia" : $('#colonia').val(),
						"c_p" : $('#c_p').val(),
						"curp" : $('#curp').val(),
						"edad" : $('#edad').val(),
						"fecha_nac" : $('#fecha_nac').val(),
						"lugar" : $('#lugar').val(),
						"tel" : $('#tel').val(),
						"email" : $('#email').val(),
						"face" : $('#face').val()
					};					
					
					$.ajax({
						data:  parametros,
						url:   './model/estudiantes/create_student.php',
						type:  'post',
						
						success:  function (data) {
							if (data==='correcto'){	
								swal({
								  	title: "¡Datos guardados correctamente!",
								  	text: "El personal de Instancia de la Juventud se podrá en contacto contigo a la brevedad para continuar el proceso de registro.",
								  	icon: "success",
								}).then( (value) => {
									location.reload();
								});								
								
							}
								
							if (data==='error'){
								swal({
								  	title: "¡Error!",
								  	text: "¡Ocurrio algo al guardar! Favor de intentarlo mas tarde.",
								  	icon: "warning",
								  	button: "Aceptar"
								});
							}

							if (data==='error2'){
								swal({
								  	title: "¡Error!",
								  	text: "¡Este usuario ya esta registrado",
								  	icon: "info",
								  	button: "Aceptar"
								});
							}
						}
					});
				}			
			});	
		</script>
	</body>
</html>
