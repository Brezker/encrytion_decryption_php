<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);
$sql = mysqli_query($conexion, "DELETE FROM magnitud WHERE id_magnitud=$id");


	if($sql){
		echo ' <script language="javascript">alert("La magnitud se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar magnitud ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>