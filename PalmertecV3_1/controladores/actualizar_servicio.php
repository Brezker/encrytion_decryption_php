<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$id_servicio = mysqli_real_escape_string($conexion, $_POST['id_servicio']);
$servicio = mysqli_real_escape_string($conexion, $_POST['servicio']);
$Magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);

		$sql_update = mysqli_query($conexion, "UPDATE servicios SET servicio = '$servicio', id_magnitud = '$Magnitud' WHERE id_servicio = $id_servicio");
	
	if($sql_update){
		echo ' <script language="javascript">alert("Servicio actualizado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el servicio");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
?>