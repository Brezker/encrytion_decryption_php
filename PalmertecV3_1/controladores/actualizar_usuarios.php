<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$id_user = mysqli_real_escape_string($conexion, $_POST['id_user']);
$Nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$Correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$Contraseña = md5(mysqli_real_escape_string($conexion, $_POST['contraseña']));


$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE (correo = '$Correo' AND cve_usuario != $id_user)");
$row = mysqli_fetch_array($result);
if($row > 0){
	echo ' <script language="javascript">alert("Atención, ya existe el correo, verifique sus datos");</script> ';
	echo '<script>window.history.go(-1)</script>';
}else{
	if(empty($_POST['contraseña'])){
		$sql_update = mysqli_query($conexion, "UPDATE usuarios SET nombre = '$Nombre', correo = '$Correo' WHERE cve_usuario = $id_user");
	}else{
		$sql_update = mysqli_query($conexion, "UPDATE usuarios SET nombre = '$Nombre', correo = '$Correo', password = '$Contraseña' WHERE cve_usuario = $id_user");
	}
	if($sql_update){
		echo ' <script language="javascript">alert("Usuario actualizado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el usuario");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
}
?>