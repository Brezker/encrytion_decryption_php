<?php 

session_start();
require("conexion.php");
$conexion = conectar();
$id = mysqli_real_escape_string($conexion, $_POST['id']);


$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditamiento']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
$calificacion_diseño = mysqli_real_escape_string($conexion, $_POST['calificacion_diseño']);
$calificacion_instalacion = mysqli_real_escape_string($conexion, $_POST['calificacion_instalacion']);
$calificacion_operacion = mysqli_real_escape_string($conexion, $_POST['calificacion_operacion']);
$calificacion_desempeño = mysqli_real_escape_string($conexion, $_POST['calificacion_desempeño']);
$cicloOperacion = mysqli_real_escape_string($conexion, $_POST['cicloOperacion']);
$cicloDesempeño = mysqli_real_escape_string($conexion, $_POST['cicloDesempeño']);


$sql = mysqli_query($conexion, "UPDATE costos_servicios SET 
 acreditamiento = '$acreditamiento', equipo = '$equipo', calificacion_diseno = '$calificacion_diseño', calificacion_instalacion = '$calificacion_instalacion', 
 calificacion_operacion = '$calificacion_operacion',cicloOperacion = '$cicloOperacion ', calificacion_desempeno = '$calificacion_desempeño',
 cicloDesempeño = '$cicloDesempeño', porcentaje_calificacion_diseno = '0', porcentaje_calificacion_instalacion = '0', 
 porcentaje_calificacion_operacion = '0', porcentaje_calificacion_desempeno ='0' where cve_costo_servicio= $id" );

mysqli_close($conexion);
if($sql){
	echo ' <script language="javascript">alert("Se actualizo correctamente el costo del servicio ");</script> ';
	echo "<script>location.href='../vistas/listar_Servicio_ProveedorN.php'</script>";
}else{
	echo ' <script language="javascript">alert("Error, no se pudo actualizar el costo del servicio, intente más tarde");</script> ';
	echo "<script>location.href='../vistas/listar_Servicio_ProveedorN.php'</script>";
}

?>