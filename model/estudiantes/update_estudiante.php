<?php
include('../../controller/tramites/funciones_tramites.php');
$id = $_POST['id'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];

	if(update_estu($id, $name, $apaterno, $amaterno, $tel, $email))
	{
		$mensaje = "correcto";
	}else{
		$mensaje = "error2";
	}
echo $mensaje;
?>