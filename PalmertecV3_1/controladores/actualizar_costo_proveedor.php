<?php 
session_start();
require("conexion.php");
$conexion = conectar();


$idLab = mysqli_real_escape_string($conexion, $_POST['idLab']);

$porcentaje = mysqli_real_escape_string($conexion, $_POST['porcentaje']); 



	$sql = mysqli_query($conexion, "UPDATE costos_proveedor SET porcentaje = $porcentaje WHERE cve_costo_proveedor = $idLab");
	if ($sql) {
		echo ' <script language="javascript">alert("Se actualizo el costo del proveedor");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al actualizar el costo del proveedor");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}


?>