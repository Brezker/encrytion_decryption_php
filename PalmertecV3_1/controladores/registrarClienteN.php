<?php
session_start();
require("conexion.php");
$conexion = conectar();


$idUsuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);


$NomEmpresa = mysqli_real_escape_string($conexion, $_POST['nomEmpresa']);
$Razon = mysqli_real_escape_string($conexion, $_POST['razon']);

$Calle=mysqli_real_escape_string($conexion, $_POST['calle']);
$Numero=mysqli_real_escape_string($conexion, $_POST['numero']);
$Colonia=mysqli_real_escape_string($conexion, $_POST['colonia']);
$Cp=mysqli_real_escape_string($conexion, $_POST['cp']);
$Domicilio =$Calle." ".$Numero." ".$Colonia." ".$Cp;





	$sql = mysqli_query($conexion, "INSERT INTO clientes (nom_empresa,razon_social,domicilio,
	  cve_usuario,estatus) VALUES ('$NomEmpresa','$Razon', '$Domicilio','$idUsuario',1 )");
	
	if($sql){
		echo '<script language="javascript">alert("Registro exitoso");</script> ';
		echo "<script>location.href='../vistas/cliente.php'</script>";	
		}else{
			
		echo ' <script language="javascript">alert("Error, no se pudo registrar, intente más tarde");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}
  

	
?>

