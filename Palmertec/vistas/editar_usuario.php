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
		<title>Actualizar usuario</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 
		if(empty($_GET['id'])){
			header("Location:usuarios.php");
		}
		$id_user = $_GET['id'];
		$sql = mysqli_query($conexion ,"SELECT * FROM usuarios WHERE cve_usuario = $id_user AND estatus = 1");
		$result = mysqli_num_rows($sql);
		if($result == 0){
			header("Location:usuarios.php");
		}else{
			while ($data = mysqli_fetch_array($sql)) {
				$id_user = $data['cve_usuario'];
				$nombre = $data['nombre'];
				$correo = $data['correo'];
				$rol = $data['rol'];
			}
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Actualizar usuario</h1>
				<div class="form-register">		

					<form action="../controladores/actualizar_usuarios.php" method="post" class="bg-white shadow p-5 rounded-lg">
					
					<div class="form-row">
						
						<input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo $id_user ?>">
						<label for="nombre">Nombre</label>
					
					
					
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo"  value="<?php echo $nombre;?>" required>	
						<label for="correo">Correo electrónico</label>
						<input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electrónico"  value="<?php echo $correo;?>" required>
						<label for="contraseña">Contraseña</label>
						<input type="password" class="form-control"  name="contraseña" id="contraseña" placeholder="Contraseña">
					</div>	
					<br><br>
					<div class="form-group">
            <div class="text-center">
                <h3>
				<input type="submit" value="Actualizar" class="btn btn-primary" name="guardar" id="guardar">
                    
                </h3>
            </div>
        </div>	
					
					
						
					</form>
					<br>
					<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
				</div>
			</div>
		</main>
		

	</body>
	</html>
<?php } ?>	
