<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$id_unidadMed = mysqli_real_escape_string($conexion, $_POST['id_unidadMed']);
$unidadMedida = mysqli_real_escape_string($conexion, $_POST['unidadMedida']);
$Magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);

$sql_update = mysqli_query($conexion, "UPDATE unidad_medidad SET unidadMedida = '$unidadMedida ', id_magnitud = '$Magnitud' WHERE id_unidadMed = $id_unidadMed");
	
	if($sql_update){
		echo ' <script language="javascript">alert("Unidad de medida actualizada correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el unidad de medida");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
?>