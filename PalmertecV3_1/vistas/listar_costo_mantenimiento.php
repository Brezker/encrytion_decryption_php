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
		<title>Mantenimiento</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
					<h1>Costos de mantenimiento</h1>
					<form action="registrar_costo_mantenimiento.php" method="post" class="form-new">		
						<input type="hidden" name="idLab" value="<?php echo $Cve_laboratorio; ?>">					
						<input type="submit" value="Nuevo servicio" class="btn_search">
					</form>
										
					<table class="table table-responsive text-nowrap">
						<tbody>
							<tr class="border-white">
								
								<th>Equipo</th>
								<th>Acreditamiento</th>								
								<th>Costo mantenimiento</th>	
								<th colspan="1">Acciones</th>
							</tr>							
						</tbody>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM costos_mantenimiento");
						$result_register = mysqli_fetch_array($sql_register);
						$total_registro = $result_register['total_registros'];

						$por_pagina = 5;

						if(empty($_GET['pagina'])){
							$pagina = 1;
						}else{
							$pagina = $_GET['pagina'];
						}

						$desde = ($pagina-1) * $por_pagina;
						$total_paginas = ceil($total_registro / $por_pagina);
						$result =  mysqli_query($conexion, "SELECT * FROM costos_mantenimiento ORDER BY equipo ASC LIMIT $por_pagina OFFSET $desde");
						mysqli_close($conexion);
						while ($data = mysqli_fetch_array($result)) {?>
							<tr>
						
								<td><?php echo $data['equipo']; ?></td>
								<td><?php echo $data['acreditamiento']; ?></td>
								<td>$<?php echo $data['costo']; ?></td>
								
														
								<td>									
					
									<a href="eliminar_costo_mantenimiento.php?id=<?php echo $data['cve_costo_mantenimiento']; ?>"><i class="fas fa-trash-alt"></i></a>
									<a href="actualizar_costo_mantenimiento.php?id=<?php echo $data['cve_costo_mantenimiento']; ?>"><i class="far fa-edit"></i></a>
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
			
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
	

	</body>
	</html>
	<?php } ?>