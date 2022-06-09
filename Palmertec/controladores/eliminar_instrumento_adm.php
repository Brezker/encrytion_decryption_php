<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_instrumento']);
$sql = mysqli_query($conexion, "DELETE FROM instrumentos WHERE id_instrumento=$id");


	if($sql){
		echo ' <script language="javascript">alert("El instrumento se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar instrumento ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>