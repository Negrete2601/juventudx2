<?php
include('../../controller/exe.php');

////////////////////////////////Funciones Auxiliar//////////////////////////////////////////////////////////////

function get_horas()
{
	$sql = "SELECT id, id_tramite, horas
				FROM auxiliar
			WHERE 1";
	$result = querys($sql);
	return $result;
}

function get_total($id)
{
	$sql = "SELECT id, horas
				FROM tramite
			WHERE id = $id";
	$result = query_row_id($sql);
	return $result;
}
function get_hechas($id)
{
	$sql = "SELECT SUM(horas) AS realizado
				FROM auxiliar
				WHERE id_tramite = $id";
	$result = query_row_id($sql);
	return $result;
}

function get_horas_tramite($id_tramite)
{
	$sql = "SELECT id, id_tramite, horas
				FROM auxiliar
			WHERE id_tramite = $id_tramite";
	$result = querys($sql);
	return $result;	
}

function create_horas($id_tramite, $horas)
{
	$sql = "INSERT INTO auxiliar(id_tramite, horas)
				   VALUES(".$id_tramite.", ".$horas.")";
	$result = querys($sql);
	return $result;
}

function update_horas($id, $horas)
{
	$sql = "UPDATE auxiliar SET horas = $horas
				WHERE id = $id";
	$result = querys($sql);
	return $result;
}

function delet_horas($id)
{
	$sql = "UPDATE auxiliar SET status = 0
				WHERE id = $id";
	$result = querys($sql);
	return $result;
}

////////////////////////////////Funciones Estudiantes//////////////////////////////////////////////////////////////

function compare_estudiante($curp)
{
	$sql = "SELECT id
				FROM estudiantes
			WHERE curp = '".$curp."'";
	$result = query_num_rows($sql);
	return $result;
}

function get_estudiantes()
{
	$sql = "SELECT id, nombre, paterno, materno, edad, fecha_nacimiento, lugar_nacimiento, curp, calle, interior, exterior, colonia, cp, telefono, email, facebook
				FROM estudiantes
			WHERE status = 1";
	$result = querys($sql);
	return $result;
}

function get_estudiante_id($id)
{
	$sql = "SELECT id, nombre, paterno, materno, edad, fecha_nacimiento, lugar_nacimiento, curp, calle, interior, exterior, colonia, cp, telefono, email, facebook
				FROM estudiantes
			WHERE id = $id";
	$result = query_row_id($sql);
	return $result;
}

function get_id_estudiante($curp)
{
	$sql = "SELECT id
				FROM estudiantes
			WHERE curp = '".$curp."'";
	$result = query_row_id($sql);
	return $result;
}

function get_estudiante_curp($curp)
{
	$sql = "SELECT id, nombre, paterno, materno, edad, fecha_nacimiento, lugar_nacimiento, curp, calle, interior, exterior, colonia, cp, telefono, email, facebook
				FROM estudiantes
			WHERE curp = '".$curp."' AND status = 1";
	$result = querys($sql);
	return $result;
}

function create_estudiante($nombre, $paterno, $materno, $edad, $fecha_nacimiento, $lugar_nacimiento, $curp, $calle, $interior, $exterior, $colonia, $cp, $telefono, $email, $facebook)
{
	$sql = "INSERT INTO estudiantes(nombre, paterno, materno, edad, fecha_nacimiento, lugar_nacimiento, curp, calle, interior, exterior, colonia, cp, telefono, email, facebook, status)
				   VALUES ('".$nombre."', '".$paterno."', '".$materno."', '".$edad."', '".$fecha_nacimiento."', '".$lugar_nacimiento."', '".$curp."', '".$calle."', '".$interior."', '".$exterior."', '".$colonia."', ".$cp.", '".$telefono."', '".$email."', '".$facebook."', 0)";
	$result = querys($sql);
	return $result;
}

function update_estudiante($id, $nombre, $paterno, $materno, $edad, $fecha_nacimiento, $lugar_nacimiento, $curp, $calle, $interior, $exterior, $colonia, $cp, $telefono, $email, $facebook)
{
	$sql = "UPDATE estudiantes SET nombre ='".$nombre."', paterno = '".$paterno."', materno = '".$materno."', edad = '".$edad."', fecha_nacimiento = '".$fecha_nacimiento."', lugar_nacimiento = '".$lugar_nacimiento."', curp = '".$curp."', calle = '".$calle."', interior = '".$interior."', exterior = '".$exterior."', colonia = '".$colonia."', cp = ".$cp.", telefono = ".$telefono.", email = '".$email."', facebook = '".$facebook."'
							WHERE id = ".$id;
				   
	$result = querys($sql);
	return $result;
}
function update_estu($id, $nombre, $paterno, $materno, $telefono, $email)
{
	$sql = "UPDATE estudiantes SET nombre ='".$nombre."', paterno = '".$paterno."', materno = '".$materno."', telefono = ".$telefono.", email = '".$email."'
							WHERE curp = '".$id."'";
				   
	$result = querys($sql);
	return $result;
}

function update_status_estudiante($id, $status)
{
	$sql = "UPDATE estudiantes SET status = $status
							   WHERE id = $id";
	$result = querys($sql);
	return $result;
}

////////////////////////////////Funciones Tramite//////////////////////////////////////////////////////////////

function get_tramites()
{
	$sql = "SELECT id, id_estudiante, escuela, especialidad, modalidad, horario, tipo, horas, discapacidad, cual, observaciones, etapa, codigo, area
				FROM tramite
			WHERE status = 1";
	$result = querys($sql);
	return $result;
}

function get_tramite_estudiantes($id_estudiante)
{
	$sql = "SELECT id, id_estudiante, escuela, especialidad, modalidad, horario, tipo, horas, discapacidad, cual, observaciones, etapa, codigo, area
				FROM tramite
			WHERE id_estudiante = $id_estudiante AND status = 1";
	$result = querys($sql);
	return $result;
}

function get_tramite_estudiante($id_estudiante)
{
	$sql = "SELECT t.id, t.escuela, t.especialidad, t.tipo, t.horas, t.etapa, t.codigo, t.area, sum(a.horas) AS realizado, t.status
				FROM tramite AS t, auxiliar AS a 
			WHERE t.id_estudiante = $id_estudiante AND t.id = a.id_tramite GROUP BY t.id";
	$result = querys($sql);
	return $result;
}

function get_tramites_id($id)
{
	$sql = "SELECT id, id_estudiante, escuela, especialidad, modalidad, horario, tipo, horas, discapacidad, cual, observaciones, etapa, codigo, area, status
				FROM tramite
			WHERE id = $id";
	$result = query_row_id($sql);
	return $result;
}

function get_tramites_pendientes()
{
	$sql = "SELECT t.id, t.id_estudiante, e.nombre, e.paterno, e.materno, e.telefono, t.escuela, t.tipo, t.area, t.horas, t.etapa, sum(a.horas) AS horas_realizadas, t.status
				FROM tramite AS t, estudiantes AS e, auxiliar AS a 
			WHERE  t.status = 0 AND t.id_estudiante = e.id GROUP BY t.id";
	$result = querys($sql);
	return $result;
}

function get_tramites_proceso()
{
	$sql = "SELECT t.id, t.id_estudiante, e.nombre, e.paterno, e.materno, e.telefono, t.escuela, t.tipo, t.area, t.horas, t.etapa, t.status, sum(a.horas) AS horas_realizadas
				FROM tramite AS t, estudiantes AS e, auxiliar AS a  
			WHERE  t.status = 1 AND t.id_estudiante = e.id AND (t.etapa = 1 OR t.etapa = 2) AND t.id = a.id_tramite GROUP BY t.id";
	$result = querys($sql);
	return $result;
}

function get_tramites_atendidos()
{
	$sql = "SELECT t.id, t.id_estudiante, e.nombre, e.paterno, e.materno, e.telefono, t.escuela, t.tipo, t.area, t.horas, t.etapa, sum(a.horas) AS horas_realizadas, t.status
				FROM tramite AS t, estudiantes AS e, auxiliar AS a
			WHERE  t.id_estudiante = e.id AND a.id_tramite = t.id AND ((t.status = 1 AND t.etapa = 3) OR ( t.status = 2 )) GROUP BY t.id";
	$result = querys($sql);
	return $result;
}

function create_tramite($id_estudiante, $escuela, $especialidad, $modalidad, $horario, $tipo, $horas, $discapacidad, $cual, $observaciones, $etapa, $codigo, $area)
{
	$sql = "INSERT INTO tramite(id_estudiante, escuela, especialidad, modalidad, horario, tipo, horas, discapacidad, cual, observaciones, etapa, codigo, area)
				VALUES(".$id_estudiante.", '".$escuela."', '".$especialidad."', ".$modalidad.", '".$horario."', ".$tipo.", '".$horas."', ".$discapacidad.", '".$cual."', '".$observaciones."', 0, '".$codigo."', '".$area."')";
			
	$result = query_last_id($sql);
	return $result;
}

function update_tramite($id, $escuela, $especialidad, $modalidad, $horario, $tipo, $horas, $discapacidad, $cual, $observaciones, $area)
{
	$sql = "UPDATE tramite SET escuela = '".$escuela."', especialidad = '".$especialidad."', modalidad = ".$modalidad.", horario = '".$horario."', tipo = ".$tipo.", horas = '".$horas."', discapacidad = ".$discapacidad.", cual = '".$cual."', observaciones = '".$observaciones."', area = '".$area."'
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;	
}

function update_etapa_tramite($id, $etapa)
{
	$sql = "UPDATE tramite SET etapa = ".$etapa."
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;	
}

function update_codigo_tramite($id, $codigo)
{
	$sql = "UPDATE tramite SET codigo = '".$codigo."'
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;		
}


function update_status_tramite($id, $status)
{
	$sql = "UPDATE tramite SET status = ".$status."
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;		
}

function update_area_tramite($id, $area)
{
	$sql = "UPDATE tramite SET area = '".$area."'
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;		
}

function update_observaciones_tramite($id, $observacion)
{
	$sql = "UPDATE tramite SET observaciones = '".$observacion."'
							WHERE id = ".$id;				 
			
	$result = querys($sql);
	return $result;		
}

////////////////////////////////Funciones Usuarios//////////////////////////////////////////////////////////////

function get_usuarios()
{
	$sql = "SELECT id_usuario, nombre_usuario, usuario, password, id_tipo_usuario
				FROM usuarios
			WHERE status = 1";
	$result = querys($sql);
	return $result;
}

function get_usuario_id($id)
{
	$sql = "SELECT id_usuario, nombre_usuario, usuario, password, id_tipo_usuario
				FROM usuarios
			WHERE id_usuario = $id";
	$result = querys($sql);
	return $result;
}

function get_usuario_estudiante($usuario)
{
	$sql = "SELECT id_usuario, nombre_usuario, usuario, password, id_tipo_usuario
				FROM usuarios
			WHERE usuario = $usuario";
	$result = querys($sql);
	return $result;
}

function update_usuario($id, $nombre, $psw)
{
	$sql = "UPDATE usuarios SET nombre = '".$nombre."', password = '". $psw."'
							WHERE id_usuario = ".$id;
	$result = querys($sql);
	return $result;
}

function update_status_usuario($id, $status)
{
	$sql = "UPDATE usuarios SET status = ".$status."
							WHERE id_usuario = ".$id;
	$result = querys($sql);
	return $result;	
}

function create_usuario($nombre, $usuario, $psw, $id_tipo, $status)
{
	$sql = "INSERT INTO usuarios(nombre_usuario, usuario, password, id_tipo_usuario, status)
					VALUES('".$nombre."', '".$usuario."', '".$psw."', ".$id_tipo.", ".$status.")";
	$result = querys($sql);
	return $result;
}

////////////////////////////////Funciones Monitor//////////////////////////////////////////////////////////////
function get_usuarios_pendientes()
{
	$sql = "SELECT pendientes 
				FROM usuarios_pendientes
			WHERE 1";
	$result = query_row_id($sql);
	return $result;
}

function get_estudiantes_pendientes()
{
	$sql = "SELECT u.id_usuario, e.nombre, e.paterno, e.materno, e.curp, e.calle, e.colonia, e.exterior, e.interior, e.cp, e.telefono, e.email, e.facebook
				FROM estudiantes AS e, usuarios AS u
			WHERE u.status = 0 AND u.usuario = e.curp";
	$result = querys($sql);
	return $result;
}

////////////////////////////////Funciones Reprotes//////////////////////////////////////////////////////////////

function get_filtros()
{
	$sql = "SELECT e.id, CONCAT(e.nombre,' ', e.paterno,' ', e.materno) AS estudiante, t.escuela, t.area, t.especialidad
				FROM estudiantes AS e, tramite AS t
			WHERE e.id = t.id_estudiante";
	$result = querys($sql);
	return $result;
}

function get_reporte($complemento)
{
	$sql = "SELECT t.id, t.id_estudiante, e.nombre, e.paterno, e.materno, t.escuela, t.tipo, t.area, t.horas, t.etapa, sum(a.horas) AS realizado, t.status
				FROM tramite AS t, estudiantes AS e, auxiliar AS a 
			WHERE  t.id_estudiante = e.id AND a.id_tramite = t.id".$complemento." GROUP BY t.id";
	$result = querys($sql);
	return $result;	
}