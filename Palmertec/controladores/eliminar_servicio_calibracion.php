<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_servicio']);
$sql = mysqli_query($conexion, "DELETE FROM todos_servicios WHERE id_servicio=$id");


	if($sql){
		echo ' <script language="javascript">alert("El servicio se ha eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar servicio ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>