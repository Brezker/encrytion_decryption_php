<?php 
session_start();
require("conexion.php");
$conexion = conectar();

$id = mysqli_real_escape_string($conexion, $_POST['id_user']);


$sql2 = mysqli_query($conexion, "DELETE FROM laboratorios WHERE cve_usuario=$id");




$sql = mysqli_query($conexion, "DELETE FROM usuarios WHERE cve_usuario=$id");


	if($sql){
		echo ' <script language="javascript">alert("Usuario eliminado correctamente.");</script> ';
		echo '<script>window.history.go(-2)</script>';
	}else{
		echo ' <script language="javascript">alert("Error al emliminar el usuario");</script> ';
		echo '<script>window.history.go(-1)</script>';
	}

?>