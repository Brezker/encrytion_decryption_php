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
		<title>Actualizar costos de recoleccion</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 
		$id = $_GET['id'];
		$sql = mysqli_query($conexion ,"SELECT * FROM serv_recoleccion WHERE id_recoleccion = $id");
		$result = mysqli_num_rows($sql);
			while ($data = mysqli_fetch_array($sql)) {
				$id = $data['id_recoleccion'];
				$recoleccion = $data['recolección'];
                $descripcion = $data['descripcion'];
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Actualizar recoleccion de costos</h1>
				<div class="form-register">		
					<form action="../controladores/actualizar_magnitud.php" method="post" class="bg-white shadow p-5 rounded-lg">
					
					<div class="form-row">
                    <label for="">ID</label>
						<input type="text" class="form-control" name="id_recoleccion" id="id_recoleccion" value="<?php echo $id ?>" readonly>
						<label for="">Recoleccion</label>
						<input type="text" class="form-control" name="recoleccion" id="recoleccion"  value="<?php echo $recoleccion;?>" required>	
                        <label for="">Descripcion</label>
						<input type="text" class="form-control" name="descripcion" id="descripcion"  value="<?php echo $descripcion;?>" required>	
                    </div>	
					<br><br>
					
            <div class="text-center">
				<input type="submit" value="Actualizar" class="btn btn-primary" name="guardar" id="guardar">
                
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
