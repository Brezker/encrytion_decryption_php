<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_unidadMed']);
$sql = mysqli_query($conexion, "DELETE FROM unidad_medidad WHERE id_unidadMed=$id");


	if($sql){
		echo ' <script language="javascript">alert("La unidad de medida se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar la unidad de medida ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>