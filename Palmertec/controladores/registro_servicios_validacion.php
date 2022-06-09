<?php 

session_start();
require("conexion.php");
$conexion = conectar();


$idLab = mysqli_real_escape_string($conexion, $_POST['idLab']);
$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditamiento']);
$lista1 = mysqli_real_escape_string($conexion, $_POST['lista1']);
$equipo = mysqli_real_escape_string($conexion, $_POST['equipo']);
$alcance = mysqli_real_escape_string($conexion, $_POST['alcance']);
$patron_carga = mysqli_real_escape_string($conexion, $_POST['patron_carga']);
$comentarios = mysqli_real_escape_string($conexion, $_POST['comentarios']);
$costo_val = mysqli_real_escape_string($conexion, $_POST['costo_val']);


$sql = mysqli_query($conexion, "INSERT INTO costos_servicios_dif (cve_laboratorio, acreditamiento, servicio, id_magnitud, equipo, alcance, patron_carga, comentarios, costo_val) VALUES 
	($idLab, '$acreditamiento', '$lista1', '1', '$equipo', '$alcance', '$patron_carga', '$comentarios', '$costo_val')");
mysqli_close($conexion);
if($sql){
	echo ' <script language="javascript">alert("Nuevo costo del servicio registrado con éxito");</script> ';
	echo "<script>location.href='../vistas/listar_Servicio_ProveedorN.php'</script>";
}else{
	echo ' <script language="javascript">alert("Error, no se pudo registrar el costo del servicio, intente más tarde");</script> ';
	echo "<script>location.href='../vistas/listar_Servicio_ProveedorN.php'</script>";
}

?>