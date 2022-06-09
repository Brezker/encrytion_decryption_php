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




				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				
				if(empty($busqueda)){
					header("location:cotizacion.php");
				}
				?>
			<main class="main">
			<div class="container">
				<h1>Cotización</h1>	
				
				<?php 
                $result = mysqli_query($conexion, "SELECT * FROM costos_mantenimiento
                costos_mantenimiento
				INNER JOIN laboratorios laboratorios 
				ON costos_mantenimiento.cve_laboratorio = laboratorios.cve_laboratorio
				WHERE  equipo = (
				SELECT servicio
				FROM serviciosmantenimiento
				WHERE id_servicioM = '$busqueda') ");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No se encontraron resultados</h2>
					</div>
				<?php }else{ 


				
				?>


					<table class="table table-hover">
						<thead>
						
							<tr>
						    	<th></th>
								<th>Laboratorio</th>
								<th>Equipo</th>
                                <th>Acreditacion</th>
                                <th>Costo</th>
								<th></th>
														
								
							</tr>
						</thead>
						<?php 
			

						$result = mysqli_query($conexion, "SELECT *
						 FROM costos_mantenimiento
                         costos_mantenimiento
				         INNER JOIN laboratorios laboratorios 
				         ON costos_mantenimiento.cve_laboratorio = laboratorios.cve_laboratorio
			             WHERE  equipo = (
				         SELECT servicio
				         FROM serviciosmantenimiento
				         WHERE id_servicioM = '$busqueda') ");					
						while ($data1 = mysqli_fetch_array($result)) {
							$servicio  = mysqli_real_escape_string($conexion, $_POST['busqueda']); 
  
							   (int)$porc = $data1['porcentaje_mantenimiento'];
						       (int)$cost = $data1['costo']; 
						     
						     (int)$desc=($cost * $porc) / 100;
						     (int)$prec=$cost - $desc;
							?>
							<tr>
                            <td><a href="perfil_laboratorio.php?id=<?php echo $data1['cve_laboratorio']; ?>"><img width="100" src="data:<?php echo $data1['imgTipo']; ?>;base64,<?php echo  base64_encode($data1['imgBinario']); ?>"></a></td>
						    <td><?php echo $data1['laboratorio']; ?></td>
                            <td><?php echo $data1['equipo']; ?></td>
                            <td><?php echo $data1['acreditacion']; ?></td>
                            <td>$<?php echo $prec  ?></td>
							<td>
                            <form action="Registrar_cotizacionMantenimiento.php" method="post" class="form-new">	
			      	    	<input type="hidden" name="busqueda" value="<?php echo $busqueda; ?>">
							<input type="hidden" name="laboratorio" value="<?php echo $data1['laboratorio']; ?>">
                            <input type="hidden" name="costo" value="<?php echo $data1['costo']; ?>">
							<input type="hidden" name="equipo" value="<?php echo $data1['equipo']; ?>">
                            <input type="hidden" name="porcentaje_mantenimiento" value="<?php echo $data1['porcentaje_mantenimiento']; ?>">
							<input type="hidden" name="cve_costo_mantenimiento" value="<?php echo $data1['cve_costo_mantenimiento']; ?>">
							<button type="submit"  value="Seleccionar" class="btn btn-primary btn-lg">Seleccionar</button>
                            </form>
							</td>
							 
							</tr>
						<?php } ?>
					</table>
				
							</ul>
						</div>
					
				<?php } ?>
				<br>
				
			</div>
			<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-2);"><br><br><br>
		</main>
		

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	</body>
	</html>