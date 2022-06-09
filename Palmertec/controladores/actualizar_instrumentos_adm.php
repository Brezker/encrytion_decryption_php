<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$id_instrumento = mysqli_real_escape_string($conexion, $_POST['id_instrumento']);
$instrumento = mysqli_real_escape_string($conexion, $_POST['instrumento']);
$Magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);

		$sql_update = mysqli_query($conexion, "UPDATE instrumentos SET instrumento = '$instrumento', id_magnitud = '$Magnitud' WHERE id_instrumento = $id_instrumento");
	
	if($sql_update){
		echo ' <script language="javascript">alert("Instrumento actualizado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el instrumento");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
?>