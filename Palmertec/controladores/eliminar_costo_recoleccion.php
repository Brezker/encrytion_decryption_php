<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_recoleccion']);
$sql = mysqli_query($conexion, "DELETE FROM serv_recoleccion WHERE id_recoleccion=$id");


	if($sql){
		echo ' <script language="javascript">alert("Costo de recolección eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al eliminar el costo de recolección");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>