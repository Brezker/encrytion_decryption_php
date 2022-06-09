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
		<title>Laboratorios</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				
				<?php 
				if(empty($_GET['id'])){
					header("Location:listaLaboratoriosAdmN3.php");
				}

				$idLab = $_GET['id'];
				$result = mysqli_query($conexion, "SELECT * FROM laboratorios WHERE cve_laboratorio = $idLab ");
				$row = mysqli_num_rows($result);
				if($row == 0){
					header("Location:listaLaboratoriosAdmN3.php");
				}else{
					while($f = mysqli_fetch_array($result)){
						$nombreLab = $f['laboratorio'];
					}
					?>
					<h1>Costos de: <?php echo $nombreLab; ?></h1>
					
					<table class="table table-responsive text-nowrap">
						<thead>
							<tr>
							    <th>Acreditamiento</th>
								<th>Equipos</th>
								<th>Costo</th>
								<th>Porcentaje</th>
							</tr>
						</thead>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM costos_mantenimiento WHERE cve_laboratorio = $idLab ");
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
						$result =  mysqli_query($conexion, "SELECT 
						costos_mantenimiento.cve_costo_mantenimiento,
                        costos_mantenimiento.acreditamiento,
						costos_mantenimiento.equipo,
						costos_mantenimiento.costo,
						costos_mantenimiento.porcentaje_mantenimiento,
						
						laboratorios.laboratorio
						 FROM costos_mantenimiento inner join laboratorios on  costos_mantenimiento.cve_laboratorio=laboratorios.cve_laboratorio  WHERE laboratorios.cve_laboratorio = $idLab  ORDER BY equipo ASC LIMIT $por_pagina OFFSET $desde");
						mysqli_close($conexion);
						while ($data = mysqli_fetch_array($result)) {?>
						<tr>
							
						
								<td><?php echo $data['acreditamiento']; ?></td>
								<td><?php echo $data['equipo']; ?></td>
								<td>$<?php echo $data['costo']; ?></td>
								<td><?php echo $data['porcentaje_mantenimiento']; ?>%</td>
								
							
							
								<td>									
									<a href="editar_costo_Administrador3.php?id=<?php echo $data['cve_costo_mantenimiento']; ?>"><i class="far fa-edit"></i></a>
									
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
									<li><a href="?id=<?php echo $idLab; ?>&pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
									<li><a href="?id=<?php echo $idLab; ?>&pagina=<?php echo $pagina-1;?>"><i class="fas fa-backward"></i></a></li>
									<?php 
								}
								for($i=1; $i <= $total_paginas; $i++){
									if($i == $pagina){
										echo '<li class="pagSelected">'.$i.'</li>';					
									}
								}

								if($pagina != $total_paginas){
									?>
									<li><a href="?id=<?php echo $idLab; ?>&pagina=<?php echo $pagina+1;?>"><i class="fas fa-forward"></i></a></li>
									<li><a href="?id=<?php echo $idLab; ?>&pagina=<?php echo $total_paginas; ?>"><i class="fas fa-step-forward"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
				<?php } ?>
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
		

	</body>
	</html>
	<?php } ?>