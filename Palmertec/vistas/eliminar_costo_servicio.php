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
		<title>Eliminar servicios</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
		
	//Recuperar datos 
	if(empty($_REQUEST['id'])){
		header("Location:lista_laboratorios.php");
	}else{
		$idLab = $_REQUEST['id'];	
		$sql = mysqli_query($conexion, "SELECT * FROM costos_servicios WHERE cve_costo_servicio = $idLab ");
		$result  = mysqli_num_rows($sql);
		if($result > 0){
			while($f = mysqli_fetch_array($sql)){
				$idServicio = $f['cve_costo_servicio'];
				$acreditamiento = $f['acreditamiento'];
				$equipo = $f['equipo'];
				$calificacion_diseño = $f['calificacion_diseno'];
				$calificacion_instalacion = $f['calificacion_instalacion'];
				$calificacion_operacion = $f['calificacion_operacion'];
				$calificacion_desempeño = $f['calificacion_desempeno'];

			}
		}else{					
			echo '<script>window.history.go(-1)</script>';
		}	
	}			
		?>

		<main class="main">
			<div class="container">
				<h1>Eliminar servicios</h1>	
				<div class="form-register">	
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>
						<p>Equipo: <span><?php echo $equipo; ?></span></p>
						<p>Acreditamiento: <span><?php echo $acreditamiento; ?></span></p>
						<p>Calificación diseño: <span>$<?php echo $calificacion_diseño; ?></span></p>
						<p>Calificación instalación: <span>$<?php echo $calificacion_instalacion; ?></span></p>
						<p>Calificación  operación: <span>$<?php echo $calificacion_operacion; ?></span></p>
						<p>Calificación desempeño: <span>$<?php echo $calificacion_desempeño; ?></span></p>
						<form action="" method="POST">

						<a class="btn_cancel" href="listar_costo_servicios.php?id=<?php echo $idLab; ?>">Cancelar</a>
						</form>
						<form action="../controladores/eliminarServicio.php" method="post">
							<input type="hidden" name="id_lab" value="<?php echo $idLab; ?>">
							<input class="btn_ok" type="submit" value="Aceptar">
						</form>
					</div>
				</div>
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
	

	</body>
	</html>
	<?php } ?>