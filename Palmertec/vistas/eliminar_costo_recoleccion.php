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
		<title>Eliminar recoleccion</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
		
	//Recuperar datos 
	if(empty($_REQUEST['id'])){
		header("Location:lista_laboratorios.php");
	}else{
		$sql = mysqli_query($conexion, "SELECT * FROM serv_recoleccion");
		$result  = mysqli_num_rows($sql);
		if($result > 0){
			while($f = mysqli_fetch_array($sql)){
				$id_recoleccion = $f['id_recoleccion'];
				$recoleccion = $f['recolección'];
				$descripcion = $f['descripcion'];
			}
		}else{					
			echo '<script>window.history.go(-1)</script>';
		}	
	}			
		?>

		<main class="main">
			<div class="container">
				<h1>Eliminar costo recolección</h1>	
				<div class="form-register">	
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>
						<p>ID: <span><?php echo $id_recoleccion; ?></span></p>
						<p>Costo de recoleccion: <span>$<?php echo $recoleccion; ?></span></p>
						<p>Concepto: <span><?php echo $descripcion; ?></span></p>
						<form action="" method="POST">

						<a class="btn_cancel" href="mostrar_costo_recoleccion.php?id=<?php echo $id_recoleccion; ?>">Cancelar</a>
						</form>
						<form action="../controladores/eliminarServicio.php" method="post">
							<input type="hidden" name="id_lab" value="<?php echo $idLab; ?>">
							<input class="btn_ok" type="submit" value="Aceptar">
						</form>
					</div>
				</div>
				<br>
			</div>
		</main>
	

	</body>
	</html>
	<?php } ?>