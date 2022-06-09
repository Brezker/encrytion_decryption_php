<?php
session_start();
require("conexion.php");
$conexion = conectar();

$instrumento = mysqli_real_escape_string($conexion, $_POST['instrumento']);
$Id_magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);

	$sql = mysqli_query($conexion, "INSERT INTO instrumentos (instrumento, id_magnitud) VALUES ('$instrumento','$Id_magnitud')");
	
	if($sql){
		echo '<script language="javascript">alert("Registro exitoso");</script> ';
		echo "<script>location.href='../vistas/mostrar_instrumentos.php'</script>";	
		}else{	
		echo ' <script language="javascript">alert("Error, no se pudo registrar, intente más tarde");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}   
  

	
?>