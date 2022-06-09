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
		<title>Mis pedidos</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
	
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">

			<form action="agregararchivoprov.php" method="post">	
			<?php   $cve_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);?>
			<button type="submit"  value="Reportes" class="btn btn-primary btn-lg">Reportes</button>
			
			</form>


			<h4 class="pb-3" style="color:#0c62bf">Calibraciones</h4>
            <?php 
            $id_cliente = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
            $sql = mysqli_query($conexion ,"SELECT * from usuarios WHERE usuarios.cve_usuario=$id_cliente");
				
                $result = mysqli_num_rows($sql);
				if($result == 0){
					header("pedidos_proveedor.php");
				}else{
					while ($data = mysqli_fetch_array($sql)) {
						$laboratorio = $data[0];
                      
					}
				}
				
                ?>

				<?php 
				 $id_cliente = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
		    	$result = mysqli_query($conexion, "SELECT * FROM pedidocalibracion  WHERE   pago ='Pagado'");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No tienes pedidos</h2>
					</div>
				<?php }else{ ?>


					
					<table class="table table-striped table-sm table-responsive-sm">
					</thead>
						<thead class="thead-inverse" class="pb-3">
							<tr>
							
                                <th>Instrumento</th>
								<th>Marca</th>							
								<th>Modelo</th>
								<th>Identificador</th>
								<th>Puntos a calibrar</th>
								<th>Puntos adicionales</th>
								<th>Fecha calibracion </th>
                                <th>Costo</th>
                                <th>Fecha pedido </th>
                                <th>Cotizacion No.</th>
							    <th>Pago</th>
								<th>Comentarios</th>
								<th colspan="2"></th>
							</tr>
						</thead>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM pedidocalibracion  WHERE pago ='Pagado'");
						$result_register = mysqli_fetch_array($sql_register);
						$total_registro = $result_register['total_registros'];

						$por_pagina = 2;

						if(empty($_GET['pagina'])){
							$pagina = 1;
						}else{
							$pagina = $_GET['pagina'];
						}
					
					
						$desde = ($pagina-1) * $por_pagina;
						$total_paginas = ceil($total_registro / $por_pagina);
						$result =  mysqli_query($conexion, "SELECT * FROM pedidocalibracion WHERE pago ='Pagado'");
						while ($data1 = mysqli_fetch_array($result)) {
							
							?>
							<tr>
							    <?php $Cotizacion_no = $data1['cotizacionNo'];?>
                                <td><?php echo $data1['instrumento']; ?></td>
								<td><?php echo $data1['marca']; ?></td>
                                <td><?php echo $data1['modelo']; ?></td>
								<td><?php echo $data1['identificacion']; ?></td>
                                <td><?php echo $data1['puntos_calibrar']; ?></td>
                                <td><?php echo $data1['puntos_adicionales']; ?></td>
                                <td><?php echo $data1['fehca_calibracion']; ?></td>
								<td>$<?php echo $data1['costo_calibracion']; ?></td>
                                <td><?php echo $data1['fecha_pedido']; ?></td>
								<td><?php echo $data1['cotizacionNo']; ?></td>
								<td><?php echo $data1['pago']; ?></td>
                                <td>
								<?php
								$resulcom = mysqli_query($conexion, "SELECT Comentarios FROM detallepedido WHERE Cotizacion_no= '$Cotizacion_no'");
                                while ($datos = mysqli_fetch_array($resulcom)) {?>
                                <?php echo $datos['Comentarios'] ?>
                                 <?php	}?>
							
							     </td>
							
							
							</tr>
						<?php } ?>
					</table>

					<?php 
					if($total_registro != 0){
						?>
						<div class="paginador">
							<ul>	
								<?php
								if($pagina != 1){								
									?>		
									<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
									<li><a href="?pagina=<?php echo $pagina-1;?>"><i class="fas fa-backward"></i></a></li>
									<?php 
								}
								for($i=1; $i <= $total_paginas; $i++){
									if($i == $pagina){
										echo '<li class="pagSelected">'.$i.'</li>';					
									}
								}

								if($pagina != $total_paginas){
									?>
									<li><a href="?pagina=<?php echo $pagina+1;?>"><i class="fas fa-forward"></i></a></li>
									<li><a href="?pagina=<?php echo $total_paginas; ?>"><i class="fas fa-step-forward"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
				<?php } ?>
				<br>
				
			</div>
			
		</main>







		<main class="main">
			<div class="container">
			<h4 class="pb-3" style="color:#0c62bf">Servicios</h4>
				<?php 
			
			
				$result = mysqli_query($conexion, "SELECT * FROM pedidoservicio  WHERE pago ='Pagado'");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No tienes pedidos</h2>
					</div>
				<?php }else{ ?>
					<table class="table table-striped table-sm table-responsive-sm">
						<thead class="thead-inverse">
							<tr>
							  
                                <th>Equipo</th>
								<th>Marca</th>
								<th>Modelo</th>
                                <th>Identificador</th>
								<th>Servicio</th>
                                <th>Ciclos</th>
                                <th>Fecha del servicio</th>							
								<th>Costo servicio</th>
                                <th>Fecha pedido</th>
                                <th>Cotizacion No.</th>
								<th>Pago</th>
								<th>Comentarios</th>
                               <th colspan="2"></th>
							</tr>
						</thead>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM pedidoservicio  WHERE  pago ='Pagado'");
						$result_register = mysqli_fetch_array($sql_register);
						$total_registro = $result_register['total_registros'];

						$por_pagina = 2;

						if(empty($_GET['pagina'])){
							$pagina = 1;
						}else{
							$pagina = $_GET['pagina'];
						}
					
					
						$desde = ($pagina-1) * $por_pagina;
						$total_paginas = ceil($total_registro / $por_pagina);
						$result =  mysqli_query($conexion, "SELECT * FROM pedidoservicio  WHERE  pago ='Pagado'");
						while ($data1 = mysqli_fetch_array($result)) {
							
							?>
							<tr>
							    
							<?php $Cotizacion_no = $data1['cotizacionNo'];?>
                                <td><?php echo $data1['equipo']; ?></td>
                                <td><?php echo $data1['marca']; ?></td>
								<td><?php echo $data1['modelo']; ?></td>
								<td><?php echo $data1['identificacion']; ?></td>
								<td><?php echo $data1['servicio']; ?></td>
                                <td><?php echo $data1['ciclos']; ?></td>
                                <td><?php echo $data1['fecha_servicio']; ?></td>
                                <td>$<?php echo $data1['costo_servicio']; ?></td>
                                <td><?php echo $data1['fecha_pedido']; ?></td>
                                <td><?php echo $data1['cotizacionNo']; ?></td>
								<td><?php echo $data1['pago']; ?></td>
                             
                            <td>
							<?php
								$resulcom = mysqli_query($conexion, "SELECT Comentarios FROM detallepedido WHERE Cotizacion_no= '$Cotizacion_no'");
                                while ($datos = mysqli_fetch_array($resulcom)) {?>
                                <?php echo $datos['Comentarios'] ?>
                                 <?php	}?>
							   </td>
							   
							  
							
							
							</tr>
						<?php } ?>
					</table>

					<?php 
					if($total_registro != 0){
						?>
						<div class="paginador">
							<ul>	
								<?php
								if($pagina != 1){								
									?>		
									<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
									<li><a href="?pagina=<?php echo $pagina-1;?>"><i class="fas fa-backward"></i></a></li>
									<?php 
								}
								for($i=1; $i <= $total_paginas; $i++){
									if($i == $pagina){
										echo '<li class="pagSelected">'.$i.'</li>';					
									}
								}

								if($pagina != $total_paginas){
									?>
									<li><a href="?pagina=<?php echo $pagina+1;?>"><i class="fas fa-forward"></i></a></li>
									<li><a href="?pagina=<?php echo $total_paginas; ?>"><i class="fas fa-step-forward"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
				<?php } ?>
				<br>
				
			</div>
			
		</main>




		<main class="main">
			<div class="container">
			<h4 class="pb-3" style="color:#0c62bf">Mantenimiento</h4>
				<?php 
			
			
				$result = mysqli_query($conexion, "SELECT * FROM pedidomantenimiento  WHERE pago ='Pagado'");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No tienes pedidos</h2>
					</div>
				<?php }else{ ?>
					<table class="table table-striped table-sm table-responsive-sm">
						<thead class="thead-inverse">
							<tr>
							  
                                <th>Equipo</th>
								<th>Marca</th>
								<th>Modelo</th>
                                <th>Identificador</th>
								<th>Servicio</th>
                                <th>Fecha del servicio</th>							
								<th>Costo servicio</th>
                                <th>Fecha pedido</th>
                                <th>Cotizacion No.</th>
								<th>Pago</th>
								<th>Comentarios</th>
                               <th colspan="2"></th>
							</tr>
						</thead>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM pedidomantenimiento  WHERE pago ='Pagado'");
						$result_register = mysqli_fetch_array($sql_register);
						$total_registro = $result_register['total_registros'];

						$por_pagina = 2;

						if(empty($_GET['pagina'])){
							$pagina = 1;
						}else{
							$pagina = $_GET['pagina'];
						}
					
					
						$desde = ($pagina-1) * $por_pagina;
						$total_paginas = ceil($total_registro / $por_pagina);
						$result =  mysqli_query($conexion, "SELECT * FROM pedidomantenimiento  WHERE pago ='Pagado'");
						while ($data1 = mysqli_fetch_array($result)) {
							
							?>
							<tr>
							    
							<?php $Cotizacion_no = $data1['cotizacionNo'];?>
                                <td><?php echo $data1['equipo']; ?></td>
                                <td><?php echo $data1['marca']; ?></td>
								<td><?php echo $data1['modelo']; ?></td>
								<td><?php echo $data1['identificacion']; ?></td>
								<td><?php echo $data1['servicio']; ?></td>
                                <td><?php echo $data1['fecha_servicio']; ?></td>
                                <td>$<?php echo $data1['costo_mantenimiento']; ?></td>
                                <td><?php echo $data1['fecha_pedido']; ?></td>
                                <td><?php echo $data1['cotizacionNo']; ?></td>
								<td><?php echo $data1['pago']; ?></td>
                             
                            <td>
							<?php
								$resulcom = mysqli_query($conexion, "SELECT Comentarios FROM detallepedido WHERE Cotizacion_no= '$Cotizacion_no'");
                                while ($datos = mysqli_fetch_array($resulcom)) {?>
                                <?php echo $datos['Comentarios'] ?>
                                 <?php	}?>
							   </td>
							   
							  
							
							
							</tr>
						<?php } ?>
					</table>

					<?php 
					if($total_registro != 0){
						?>
						<div class="paginador">
							<ul>	
								<?php
								if($pagina != 1){								
									?>		
									<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
									<li><a href="?pagina=<?php echo $pagina-1;?>"><i class="fas fa-backward"></i></a></li>
									<?php 
								}
								for($i=1; $i <= $total_paginas; $i++){
									if($i == $pagina){
										echo '<li class="pagSelected">'.$i.'</li>';					
									}
								}

								if($pagina != $total_paginas){
									?>
									<li><a href="?pagina=<?php echo $pagina+1;?>"><i class="fas fa-forward"></i></a></li>
									<li><a href="?pagina=<?php echo $total_paginas; ?>"><i class="fas fa-step-forward"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
				<?php } ?>
				<br>
				
			</div>
			
		</main>

		</div>
		
		<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
		

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	
	</body>
	</html>
	<?php } ?>