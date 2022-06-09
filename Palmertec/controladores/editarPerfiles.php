<?php
session_start();
require("conexion.php");
$conexion = conectar();



if (isset($_REQUEST['guardar'])) {

$id_user = mysqli_real_escape_string($conexion, $_POST['iduser']);
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apat = mysqli_real_escape_string($conexion, $_POST['appPat']);
$amat = mysqli_real_escape_string($conexion, $_POST['appMat']);
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);


$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE (correo = '$correo' AND cve_usuario != $id_user)");
$row = mysqli_fetch_array($result);
if($row > 0){
	echo ' <script language="javascript">alert("Atención, ya existe el correo, verifique sus datos");</script> ';
	echo '<script>window.history.go(-1)</script>';
}else{
	
		$sql_update = mysqli_query($conexion, "UPDATE usuarios 
        SET nombre = '$nombre',
            correo = '$correo',
            app_paterno = '$apat',
            app_materno = '$amat' WHERE cve_usuario = $id_user");

	if($sql_update){
		echo ' <script language="javascript">alert("Usuario actualizado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el usuario");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
}
}
?>

