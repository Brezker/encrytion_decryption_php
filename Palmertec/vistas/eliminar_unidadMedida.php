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
		<title>Unidad de medida</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 
			$idMedida = $_REQUEST['id'];
			$sql = mysqli_query($conexion, "SELECT * FROM unidad_medidad inner join magnitud on unidad_medidad.id_magnitud=magnitud.id_magnitud where id_unidadMed = $idMedida");
			$result = mysqli_num_rows($sql);	
				while ($data = mysqli_fetch_array($sql)) {
					$id_medida = $data['id_unidadMed'];
					$unidadMedida = $data['unidadMedida'];
                    $magnitud = $data['magnitud'];
		
		?>
		<main class="main">
			<div class="container">
				<h1>Eliminar unidad de medida</h1>
				<div class="form-register">		
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>
						<p>ID: <span><?php echo $id_medida; ?></span></p>
						<p>Servicio: <span><?php echo $unidadMedida;?></span></p>
                        <p>Magnitud: <span><?php echo $magnitud;?></span></p>
					
						<form action="" method="post">
							<input type="hidden" name="id_unidadMed" id="id_unidadMed" value="<?php echo $id_medida; ?>">
							<a class="btn_cancel" href="mostrar_unidadmedida.php">Cancelar</a>
							
						</form>
						<form action="../controladores/eliminar_unidadmedida_adm.php" method="post">
							<input type="hidden" name="id_unidadMed" id="id_unidadMed" value="<?php echo $id_medida; ?>">
							<input class="btn_ok" type="submit" value="Aceptar">
						</form>
					</div>
					<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
				</div>
			</main>
		
		

		</body>
		</html>
        <?php } ?>
	<?php } ?>	
