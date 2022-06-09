<?php 
session_start();
require_once("../controladores/conexion.php");
$conexion = conectar();

 error_reporting (0);
	?>


<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Búscar laboratorio</title>
		
		<?php include "../scripts/scripts.php";?>


	

	</head>
	<body>
		<?php include("includes/headUser.php"); ?>
		
				<?php
                $serv = mysqli_real_escape_string($conexion, $_REQUEST['lista2']);
				$busqueda = mysqli_real_escape_string($conexion, $_POST['equipo']);
				
				if(empty($busqueda)){
					header("location:cotizacion_serv_dif.php");
				}
				?>
			<main class="main">
			<div class="container">
				<h1>Cotización</h1>	
				
				<?php 
                $result = mysqli_query($conexion, "SELECT * FROM costos_servicios_dif INNER JOIN laboratorios
				ON costos_servicios_dif.cve_laboratorio = laboratorios.cve_laboratorio
				WHERE equipo = (
				SELECT equipo
				FROM servicios_dif
				WHERE equipo = '$busqueda' AND id_serv = '$serv')");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No se encontraron resultados</h2>
					</div>
				<?php }else{ ?>
					<table class="table table-hover">
						<thead>
							<tr>
						    	<th></th>
								<th>Laboratorio</th>
								<th>Precio</th>
								<th>Comentarios</th>
								<th></th>
							</tr>
						</thead>
						<?php 
			
						$result = mysqli_query($conexion, "SELECT * FROM costos_servicios_dif INNER JOIN laboratorios
						ON costos_servicios_dif.cve_laboratorio = laboratorios.cve_laboratorio
						WHERE equipo = (
						SELECT equipo
						FROM servicios_dif
						WHERE equipo = '$busqueda' AND id_serv = '$serv')");
						 	
						
							 
						
						while ($data1 = mysqli_fetch_array($result)) {

							$fechac  = mysqli_real_escape_string($conexion, $_POST['fechac']); 
							$servicio  = mysqli_real_escape_string($conexion, $_POST['busqueda']); 
						
							
							
							?>
							
                            <tr>
                            <td><a href="perfil_laboratorio.php?id=<?php echo $data1['cve_laboratorio']; ?>"><img width="100" src="data:<?php echo $data1['imgTipo']; ?>;base64,<?php echo  base64_encode($data1['imgBinario']); ?>"></a></td>
						    <td><?php echo $data1['laboratorio']; ?></td>
                            <td><?php echo $data1['costo']; ?></td>
                            <td><?php echo $data1['comentarios'] ?></td>
							<td>
                            <form action="Registrar_cotizacionServicios_dif.php" method="post" class="form-new">	
							<input type="hidden" name="serv" value="<?php echo $serv; ?>">
					    	<input type="hidden" name="busqueda" value="<?php echo $busqueda; ?>">
							<input type="hidden" name="fechac" value="<?php echo "$fechac"; ?>">
                            <input type="hidden" name="laboratorio" value="<?php echo $data1['laboratorio']; ?>">
							<input type="hidden" name="costo" value="<?php echo $data1['costo']; ?>">
							<input type="hidden" name="cve_costo_servicio_dif" value="<?php echo $data1['cve_costo_servicio_dif']; ?>">
							<button type="submit"  value="Seleccionar" class="btn btn-primary btn-lg">Seleccionar</button>
                            </form>
							</td>
							</tr>
					       
					       <?php } ?>
					
				<?php } ?>
				<br>
		        
			</div>
			</table>
			<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atras" onClick="history.go(-2);"><br><br><br>
		</main>
		

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	</body>
	</html>