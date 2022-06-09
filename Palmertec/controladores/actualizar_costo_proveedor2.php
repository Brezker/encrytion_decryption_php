<?php 
session_start();
require("conexion.php");
$conexion = conectar();


$idLab = mysqli_real_escape_string($conexion, $_POST['idLab']);

$porcentaje1 = mysqli_real_escape_string($conexion, $_POST['porcentaje1']);



	$sql = mysqli_query($conexion, "UPDATE costos_servicios_dif SET porcentaje_servicio = $porcentaje1 WHERE cve_costo_servicio_dif = $idLab");
	if ($sql) {
		echo ' <script language="javascript">alert("Se actualizo el % del servicio");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el % del servidor");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}


?>