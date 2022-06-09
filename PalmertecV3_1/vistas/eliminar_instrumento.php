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
		<title>Eliminar Instrumento</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 
			$idInstrumento = $_REQUEST['id'];
			$sql = mysqli_query($conexion, "SELECT * FROM instrumentos inner join magnitud on instrumentos.id_magnitud=magnitud.id_magnitud where id_instrumento = $idInstrumento");
			$result = mysqli_num_rows($sql);	    
				while ($data = mysqli_fetch_array($sql)) {
					$id_instrumento = $data['id_instrumento'];
					$instrumento = $data['instrumento'];
                    $magnitud = $data['magnitud'];
		
		?>
		<main class="main">
			<div class="container">
				<h1>Eliminar Servicio</h1>
				<div class="form-register">		
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>
						<p>ID: <span><?php echo $id_instrumento; ?></span></p>
						<p>Instrumento: <span><?php echo $instrumento;?></span></p>
                        <p>Magnitud: <span><?php echo $magnitud;?></span></p>
					
						<form action="" method="post">
							<input type="hidden" name="id_instrumento" id="id_intrumento" value="<?php echo $id_instrumento; ?>">
							<a class="btn_cancel" href="mostrar_instrumentos.php">Cancelar</a>
							
						</form>
						<form action="../controladores/eliminar_instrumento_adm.php" method="post">
							<input type="hidden" name="id_instrumento" id="id_intrumento" value="<?php echo $id_instrumento; ?>">
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
