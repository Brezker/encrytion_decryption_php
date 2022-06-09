<?php 
session_start();
require("conexion.php");
$conexion = conectar();


$Cotizacion_no = mysqli_real_escape_string($conexion, $_POST['Cotizacion_no']);

	$sql = mysqli_query($conexion, "UPDATE detallepedido SET pago = 'Pagado' WHERE Cotizacion_no = '$Cotizacion_no'");
	$sql = mysqli_query($conexion, "UPDATE pedidocalibracion SET pago = 'Pagado' WHERE CotizacionNo = '$Cotizacion_no'");
	$sql = mysqli_query($conexion, "UPDATE pedidoservicio SET pago = 'Pagado' WHERE CotizacionNo = '$Cotizacion_no'");
	$sql = mysqli_query($conexion, "UPDATE pedidomantenimiento SET pago = 'Pagado' WHERE CotizacionNo = '$Cotizacion_no'");
   
	if ($sql) {
		echo ' <script language="javascript">alert("El pago fue aceptado");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}else{
		echo ' <script language="javascript">alert("Error");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}


?>