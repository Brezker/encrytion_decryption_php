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
		
		
		<?php include "../scripts/scripts.php";?>

	
	

	</head>
	<body>
		<?php include("includes/head.php"); ?>
		
		
				<?php 
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				$Alcancemi  = mysqli_real_escape_string($conexion, $_REQUEST['Alcancemi']); 
				$Alcancema  = mysqli_real_escape_string($conexion, $_REQUEST['Alcancema']); 
				$unidadmin = mysqli_real_escape_string($conexion, $_REQUEST['unidadmin']); 
				$unidadmax  = mysqli_real_escape_string($conexion, $_REQUEST['unidadmax']); 
				$extra  = mysqli_real_escape_string($conexion, $_REQUEST['extra']); 
				?>

			    <main class="main">
			    <div class="container">
				<h1>Cotización</h1>	
				<label>Nota:En caso de no mostrar resultados es debido a que por el momento no contamos con esos alcances. </label>	
				<?php 
                $result = mysqli_query($conexion, "SELECT * FROM costos_proveedor
				WHERE  instrumento = (
				SELECT instrumento
				FROM instrumentos
				WHERE id_instrumento = '$busqueda') and unidadmin = '$unidadmin' and unidadmax = '$unidadmax' and extra = '$extra'");
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
						    	<th>Precio</th>
								
								<th>Alcance m&iacute;nimo</th>	
								<th>Alcance m&aacute;ximo</th>
							    <th>Otros</th>
								<th>Comentarios</th>
								<th>Acción</th>
								
							</tr>
						</thead>
						<?php 
			

						$result = mysqli_query($conexion, "SELECT * FROM costos_proveedor 
						WHERE  instrumento = (
						SELECT instrumento
                        FROM instrumentos
                        WHERE id_instrumento = '$busqueda') and unidadmin = '$unidadmin' and unidadmax = '$unidadmax' and extra = '$extra'");;
						 	
						
                        

							 
						
						while ($data1 = mysqli_fetch_array($result)) {

							$lista1  = mysqli_real_escape_string($conexion, $_POST['lista1']); 
							$fechac  = mysqli_real_escape_string($conexion, $_POST['fechac']); 
							$instrumento  = mysqli_real_escape_string($conexion, $_POST['busqueda']); 
						
				            (int)$almin = $data1['alcanceMix'];
							(int)$alman = $data1['alcanceMax'];
							
							(int)$porc = $data1['porcentaje'];
						    (int)$cost = $data1['costo']; 
						     
						     (int)$prec=$cost*$porc/100 +$cost;
							    
			

							?>
							<tr>
							
						    
						    <td>$<?php echo $prec ?></td>
							
							<td><?php echo $data1['alcanceMix']; ?> <?php echo $data1['unidadmin']; ?></td>
							<td><?php echo $data1['alcanceMax']; ?> <?php echo $data1['unidadmax']; ?></td>
			                <td><?php echo $data1['extra']; ?></td>
							<td><?php echo $data1['Comentarios']; ?></td>
							<td>
							<form action="Registrar_cotizacionCalibracion.php" method="post">	
							
							<input type="hidden" name="lista1" value="<?php echo $lista1; ?>">
					    	<input type="hidden" name="busqueda" value="<?php echo $busqueda; ?>">
							<input type="hidden" name="Alcancemi" value="<?php echo "$Alcancemi"; ?>">
							<input type="hidden" name="Alcancema" value="<?php echo "$Alcancema"; ?>">
							<input type="hidden" name="unidadmin" value="<?php echo "$unidadmin"; ?>">
							<input type="hidden" name="unidadmax" value="<?php echo "$unidadmax"; ?>">
							<input type="hidden" name="fechac" value="<?php echo "$fechac"; ?>">
							<input type="hidden" name="puntos" value="<?php echo $data1['puntos']; ?>">
							<input type="hidden" name="porcentaje" value="<?php echo $data1['porcentaje']; ?>">
							<input type="hidden" name="costo" value="<?php echo $data1['costo']; ?>">
							<input type="hidden" name="costoExtra" value="<?php echo $data1['costoExtra']; ?>">
							<input type="hidden" name="cve_costo_proveedor" value="<?php echo $data1['cve_costo_proveedor']; ?>">
                          <button type="submit"  value="Seleccionar" class="btn btn-primary btn-lg">Seleccionar</button>
					        </form>
							</td>
							</tr>
							<?php

								//   echo ' <script language="javascript">alert("Lo sentimos, no encontramos coincidencias");</script> ';
							
					       } ?>
						<?php } ?>
					</table>
					
				
					
					
				
							</ul>
						</div>
				
				<br>
					
			</div>
			<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atras" onClick="history.go(-2);"><br><br><br>
		</main>
		

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	</body>
	</html>
    <?php } ?>