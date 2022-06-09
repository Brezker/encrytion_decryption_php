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
		<title>Eliminar costo</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 

	
//Recuperar datos 
		if(empty($_REQUEST['id'])){
			header("Location:listar_Instrumentos_ ProveedorN.php");
		}else{
			$idLab = $_REQUEST['id'];
			
				$Hola =  mysqli_query($conexion,"SELECT * from costos_proveedor where cve_costo_proveedor=$idLab;");
			$result = mysqli_num_rows($Hola);
			if($result > 0){
				while ($data = mysqli_fetch_array($Hola)) {
					$magnitud = $data['magnitud'];
					$acreditamiento = $data['acreditamiento'];
					$instrumento = $data['instrumento'];
					$costo = $data['costo'];
					$puntos = $data['puntos'];
					$punto_adicional = $data['costoExtra'];
				
					
				}
			}else{
				header("Location:listar_Instrumentos_ ProveedorN.php");
			}
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Eliminar costo</h1>
				<div class="form-register">		
					<div class="data-delete">
						<h2>¿Está seguro que quiere eliminar este registro?</h2>						
						<p>Magnitud: <span><?php echo $magnitud;?></span></p>
						<p>Acreditacion: <span><?php echo $acreditamiento;?></span></p>
						<p>Instrumento: <span><?php echo $instrumento;?></span></p>
						<p>Costo: <span>$<?php echo $costo;?></span></p>
						<p>Puntos: <span><?php echo $puntos;?></span></p>
						<p>Puntos Adicionales: <span><?php echo $punto_adicional;?></span></p>
					
						<form action="" method="post">
					
							<a class="btn_cancel" href="listar_costo_calibracion.php?id=<?php echo $idLab; ?>">Cancelar</a>
						
						</form>
						<form action="../controladores/eliminarCalibracion.php" method="post">
							<input type="hidden" name="id_lab" value="<?php echo $idLab; ?>">
						
							<input class="btn_ok"  type="submit" value="Aceptar">
						</form>
					
					
					
					
					</div>
					<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
				</div>
			</main>
		

		</body>
		</html>
	<?php } ?>	
