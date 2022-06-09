<?php 

session_start();
require("conexion.php");
$conexion = conectar();


$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditamiento']);
$lista1 = mysqli_real_escape_string($conexion, $_POST['lista1']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
$calificacion_diseño = mysqli_real_escape_string($conexion, $_POST['calificacion_diseño']);
$calificacion_instalacion = mysqli_real_escape_string($conexion, $_POST['calificacion_instalacion']);
$calificacion_operacion = mysqli_real_escape_string($conexion, $_POST['calificacion_operacion']);
$calificacion_desempeño = mysqli_real_escape_string($conexion, $_POST['calificacion_desempeño']);
$cicloOperacion = mysqli_real_escape_string($conexion, $_POST['cicloOperacion']);
$cicloDesempeño = mysqli_real_escape_string($conexion, $_POST['cicloDesempeño']);


$sql = mysqli_query($conexion, "INSERT INTO costos_servicios (acreditamiento, id_magnitud, equipo, calificacion_diseno, calificacion_instalacion, calificacion_operacion,cicloOperacion, calificacion_desempeno,cicloDesempeño, porcentaje_calificacion_diseno, porcentaje_calificacion_instalacion, porcentaje_calificacion_operacion, porcentaje_calificacion_desempeno) VALUES 
	('$acreditamiento', '$lista1', '$equipo', '$calificacion_diseño', '$calificacion_instalacion', '$calificacion_operacion','$cicloOperacion ','$calificacion_desempeño','$cicloDesempeño', '0', '0','0', '0')");
mysqli_close($conexion);
if($sql){
	echo ' <script language="javascript">alert("Nuevo costo del servicio registrado con éxito");</script> ';
	echo "<script>location.href='../vistas/listar_costo_servicios.php'</script>";
}else{
	echo ' <script language="javascript">alert("Error, no se pudo registrar el costo del servicio, intente más tarde");</script> ';
	echo "<script>location.href='../vistas/listar_Servicio_ProveedorN.php'</script>";
}

?>