<?php 

session_start();
require("conexion.php");
$conexion = conectar();


$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditamiento']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
$costoMantenimiento = mysqli_real_escape_string($conexion, $_POST['costoMantenimiento']);



$sql = mysqli_query($conexion, "INSERT INTO costos_mantenimiento (acreditamiento, equipo, costo,porcentaje_mantenimiento) VALUES 
	('$acreditamiento', '$equipo', $costoMantenimiento,0)");
mysqli_close($conexion);
if($sql){
	echo ' <script language="javascript">alert("Nuevo costo del mantenimiento registrado con éxito");</script> ';
	echo "<script>location.href='../vistas/listar_costo_mantenimiento.php'</script>";
}else{
	echo ' <script language="javascript">alert("Error, no se pudo registrar el costo del mantenimiento, intente más tarde");</script> ';
	echo "<script>location.href='../vistas/Mantenimiento_Prev.php'</script>";
}

?>