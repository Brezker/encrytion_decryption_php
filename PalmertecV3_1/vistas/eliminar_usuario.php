<?php 
session_start();
if($_SESSION['rol'] != "administrador"){	
	@session_start();
	session_destroy();
	header("Location:../Index.php");
}else{	
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Eliminar usuario</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 

		if(!empty($_POST)){
			$idUser = $_POST['id_user'];
			//$sql_delete = pg_query($conexion, "DELETE FROM usuarios WHERE cve_usuario = $idUser");
			$sql_delete = mysqli_query($conexion, "UPDATE usuarios SET estatus = 0 WHERE cve_usuario = $idUser");
			if($sql_delete){
				header("Location:usuarios.php");
			}else{
				echo ' <script language="javascript">alert("Error al eliminar");</script> ';
			}
		}
//Recuperar datos 
		if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1){
			header("Location:usuarios.php");
		}else{
			$id_user = $_REQUEST['id'];
			$sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE cve_usuario = $id_user AND estatus = 1");
			$result = mysqli_num_rows($sql);
			if($result > 0){
				while ($data = mysqli_fetch_array($sql)) {
					$id_user = $data['cve_usuario'];
					$nombre = $data['nombre'];
					$correo = $data['correo'];
					
				}
			}else{
				header("Location:usuarios.php");
			}
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Eliminar usuario</h1>
				<div class="form-register">		
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>
						<p>Nombre: <span><?php echo $nombre; ?></span></p>
						<p>Correo: <span><?php echo $correo;?></span></p>
					
						<form action="" method="post">
							<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
							<a class="btn_cancel" href="usuarios.php">Cancelar</a>
							
						</form>
						<form action="../controladores/eliminarUsuario.php" method="post">
							<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
						
							<input class="btn_ok" type="submit" value="Aceptar">
						</form>
					</div>
					<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
				</div>
			</main>
		
		

		</body>
		</html>
	<?php } ?>	
