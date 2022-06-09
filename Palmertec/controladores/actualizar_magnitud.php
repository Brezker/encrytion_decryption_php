<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$id_magnitud = mysqli_real_escape_string($conexion, $_POST['id_magnitud']);
$Magnitud = mysqli_real_escape_string($conexion, $_POST['magnitud']);

		$sql_update = mysqli_query($conexion, "UPDATE magnitud SET magnitud = '$Magnitud' WHERE id_magnitud = $id_magnitud");
	
	if($sql_update){
		echo ' <script language="javascript">alert("Magnitud actualizada correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el magnitud");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
?>