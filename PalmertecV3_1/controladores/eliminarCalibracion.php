<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_lab']);

$sql = mysqli_query($conexion, "DELETE FROM costos_proveedor WHERE cve_costo_proveedor=$id");


	if($sql){
		echo ' <script language="javascript">alert("La calibracion se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar calibracion ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>