<?php 
session_start();
include("conexion.php");
$conexion = conectar();
$correo= mysqli_real_escape_string($conexion, $_POST['Correo']);
$contraseña=md5(mysqli_real_escape_string($conexion, $_POST['Contraseña']));
$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
if($f=mysqli_fetch_assoc($sql)){
	if($contraseña==$f['password']){
		$_SESSION['active'] = true;
		$_SESSION['cve_usuario']=$f['cve_usuario'];
		$nombre = $_SESSION['nombre']=$f['nombre'];
		$_SESSION['rol']=$f['rol'];					
		mysqli_close($conexion);
		
		echo '<script>alert("BIENVENIDO A PALMERTEC '.$nombre.'")</script> ';

		if($f['rol']=="administrador"){
			echo "<script>location.href='../vistas/administrador.php'</script>";
		}else if($f['rol'] == "proveedor"){			
			echo "<script>location.href='../vistas/proveedor.php'</script>";
		}else if($f['rol'] == "cliente"){
			echo "<script>location.href='../vistas/clientes.php'</script>";			
		}
	}else{
		echo '<script>alert("CONTRASEÑA INCORRECTA")</script>';
		echo "<script>location.href='../index.php'</script>";
	}
}else{

	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

	echo "<script>location.href='../index.php'</script>";	

}

?>
