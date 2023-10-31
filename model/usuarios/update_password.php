<?php
include('../../controller/usuarios/funciones_usuarios.php');
$password = $_POST['password'];
$id = $_POST['id'];

if ($password!="") {
	$pass=",password = '".md5($password)."',";
} else {
	$pass=",";
}

	if(update_pass($id, $password))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error2";
	}
echo $mensaje;
?>