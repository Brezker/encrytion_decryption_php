<?php 
session_start();
require("conexion.php");
$conexion = conectar();
$Nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$AppPaterno = mysqli_real_escape_string($conexion, $_POST['appPaterno']);
$AppMaterno = mysqli_real_escape_string($conexion, $_POST['appMaterno']);
$Correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$Contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
$CContraseña = mysqli_real_escape_string($conexion, $_POST['ccontraseña']);

$correo_e = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$Correo'");
$correo_exist = mysqli_num_rows($correo_e);
if($Contraseña == $CContraseña){
	if($correo_exist>0){
		echo ' <script language="javascript">alert("Atención, ya existe el correo, verifique sus datos");</script> ';
		echo "<script>location.href='../index.php?pagina=login'</script>";
	}else{
		$sql = mysqli_query($conexion, "INSERT INTO usuarios (nombre,app_paterno,
		app_materno ,
		 correo, password, rol) VALUES ('$Nombre',
		 '$AppPaterno','$AppMaterno',
		  '$Correo',
		  md5('$Contraseña'), 'cliente')");
		if($sql){			
			echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
			echo "<script>location.href='../index.php'</script>";
		}else{
			echo ' <script language="javascript">alert("Error, no se pudo registrar el usuario, intente más tarde");</script> ';
			echo "<script>location.href='../index.php?pagina=registrarse'</script>";
		}
	}
}else{
	echo ' <script language="javascript">alert("Las contraseñas no coinciden");</script> ';
	echo "<script>location.href='../index.php?pagina=registrarse'</script>";	
}
?>
