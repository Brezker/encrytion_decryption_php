<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_lab']);






$sql = mysqli_query($conexion, "DELETE FROM costos_servicios WHERE cve_costo_servicio=$id");


	if($sql){
		echo ' <script language="javascript">alert("Servicio eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar servicio.");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>