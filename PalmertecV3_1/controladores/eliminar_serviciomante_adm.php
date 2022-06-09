<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_servicioM']);
$sql = mysqli_query($conexion, "DELETE FROM serviciosmantenimiento WHERE id_servicioM=$id");


	if($sql){
		echo ' <script language="javascript">alert("El servicio de mantenimiento se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar servicio de mantenimiento ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>