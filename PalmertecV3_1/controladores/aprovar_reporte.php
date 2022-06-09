<?php 
session_start();
require("conexion.php");
$conexion = conectar();


$cve_archivo_informe = mysqli_real_escape_string($conexion, $_POST['cve_archivo_informe']);

	$sql = mysqli_query($conexion, "UPDATE archivo_informe SET estatus = 'Aprobado' WHERE cve_archivo_informe = '$cve_archivo_informe'");
	
	if ($sql) {
		echo ' <script language="javascript">alert("El reporte fue aprobado");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}else{
		echo ' <script language="javascript">alert("Error");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}


?>