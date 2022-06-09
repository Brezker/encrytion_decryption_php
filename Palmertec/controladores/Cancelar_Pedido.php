<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id_detallePedido = mysqli_real_escape_string($conexion, $_POST['id_detallePedido']);
$Cotizacion_no = mysqli_real_escape_string($conexion, $_POST['Cotizacion_no']);






$sql = mysqli_query($conexion, "DELETE FROM detallepedido WHERE id_detallePedido=$id_detallePedido");
$sql = mysqli_query($conexion, "DELETE FROM pedidocalibracion WHERE CotizacionNo = '$Cotizacion_no'");
$sql = mysqli_query($conexion, "DELETE FROM pedidoservicio WHERE CotizacionNo = '$Cotizacion_no'");
$sql = mysqli_query($conexion, "DELETE FROM pedidomantenimiento WHERE CotizacionNo = '$Cotizacion_no'");

	if($sql){
		echo ' <script language="javascript">alert("Pedido Cancelado");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al cancelar el pedido ");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>