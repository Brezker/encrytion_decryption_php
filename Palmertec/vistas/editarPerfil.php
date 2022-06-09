<?php 
session_start();
if($_SESSION['rol'] != "proveedor"){	
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
		<title>Editar Perfil</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 

		$id_user = $_GET['id'];
		$sql = mysqli_query($conexion ,"SELECT * FROM usuarios WHERE usuarios.cve_usuario = $id_user");
		$result = mysqli_num_rows($sql);
		if($result == 0){
			header("Location:usuarios.php");
		}else{
			while ($data = mysqli_fetch_array($sql)) {
				$id_user = $data['cve_usuario'];
				$nombre = $data['nombre'];
                $appPaterno = $data['app_paterno'];
				$appMaterno = $data['app_materno'];
				$correo = $data['correo'];
                
			}
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Actualizar usuario</h1>
				<div class="form-register">		

					<form action="../controladores/editarPerfiles.php" method="post"  enctype="multipart/form-data" class="bg-white shadow p-5 rounded-lg">
					
					<div class="form-row">
						<input type="hidden" class="form-control" name="iduser" id="iduser" value="<?php echo $id_user ?>">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre"   value="<?php echo $nombre;?>" required>
						<label for="appPat">Apellido Paterno</label>
						<input type="text" class="form-control" name="appPat" id="appPat"  value="<?php echo $appPaterno;?>" required>
						<label for="appMat">Apellido Materno</label>
						<input type="text" class="form-control" name="appMat" id="appMat"   value="<?php echo $appMaterno;?>" required>	
						<label for="correo">Correo electrónico</label>
						<input type="email" class="form-control" name="correo" id="correo"   value="<?php echo $correo;?>" required>
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
