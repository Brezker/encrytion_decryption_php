<?php
session_start();
require("conexion.php");
$conexion = conectar();

$Id_serv = mysqli_real_escape_string($conexion, $_POST['id_serv']);
$Id_magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);
$servicios = mysqli_real_escape_string($conexion, $_POST['servicio']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);

	$sql = mysqli_query($conexion, "INSERT INTO servicios_dif(id_servdif, id_serv, id_magnitud, servicios, equipo) VALUES (null,'$Id_serv','$Id_magnitud','$servicios','$equipo')");
	
	if($sql){
		echo '<script language="javascript">alert("Registro exitoso");</script> ';
		echo "<script>location.href='../vistas/mostrar_servicios_dif.php'</script>";	
		}else{	
		echo ' <script language="javascript">alert("Error, no se pudo registrar, intente más tarde");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}   
  

	
?>