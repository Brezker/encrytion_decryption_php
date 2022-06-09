<?php 

session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id']);

$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditamiento']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
$costoMantenimiento = mysqli_real_escape_string($conexion, $_POST['costoMantenimiento']);



$sql = mysqli_query($conexion, "UPDATE costos_mantenimiento SET  acreditamiento = '$acreditamiento', 
equipo = '$equipo', costo = $costoMantenimiento,porcentaje_mantenimiento =0 WHERE cve_costo_mantenimiento=$id");


mysqli_close($conexion);
if($sql){
	echo ' <script language="javascript">alert("Se actualizo con éxito");</script> ';
	echo "<script>location.href='../vistas/Mantenimiento_Prev.php'</script>";
}else{
	echo ' <script language="javascript">alert("Error, no se pudo actualizae el costo del mantenimiento, intente más tarde");</script> ';
	echo "<script>location.href='../vistas/Mantenimiento_Prev.php'</script>";
}

?>