<?php
session_start();
require("conexion.php");
$conexion = conectar();

$Magnitud = mysqli_real_escape_string($conexion, $_POST['magnitud']);

	$sql = mysqli_query($conexion, "INSERT INTO magnitud (magnitud) VALUES ('$Magnitud')");
	
	if($sql){
		echo '<script language="javascript">alert("Registro exitoso");</script> ';
		echo "<script>location.href='../vistas/mostrar_magnitud.php'</script>";	
		}else{	
		echo ' <script language="javascript">alert("Error, no se pudo registrar, intente más tarde");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}   
  

	
?>