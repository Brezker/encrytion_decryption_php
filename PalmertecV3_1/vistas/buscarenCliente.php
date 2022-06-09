<?php 
session_start();
if($_SESSION['rol'] != "cliente"){	
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
		<title>Búscar laboratorio</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		
				<?php 
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				if(empty($busqueda)){
					header("location:cliente.php");
				}
				?>
			<main class="main">
			<div class="container">
				<h1>B&uacute;scar  laboratorios</h1>	
				<form action="buscarenCliente.php" method="get" class="form-search">
					<input type="text" name="busqueda" id="busqueda" class="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>">
					<input type="submit" value="Buscar" class="btn_search">
				</form>
				<?php 


				$result = mysqli_query($conexion, "SELECT * FROM laboratorios inner join usuarios on  laboratorios.cve_usuario=usuarios.cve_usuario  WHERE laboratorios.estatus = 1");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No se han registrado laboratorios</h2>
					</div>
				<?php }else{ ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Imagen</th>
								<th>Laboratorio</th>
								<th>Teléfono</th>								
								<th>Domicilio</th>
								<th>Entidad</th>
								<th>Acreditación</th>
								
							</tr>
						</thead>
						<?php 
					$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM laboratorios inner join usuarios on  laboratorios.cve_usuario=usuarios.cve_usuario  WHERE laboratorios.estatus = 1");
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
						$result =  mysqli_query($conexion, "SELECT * FROM laboratorios inner join usuarios on  laboratorios.cve_usuario=usuarios.cve_usuario  WHERE laboratorios.estatus = 1 AND (UPPER(laboratorio) LIKE UPPER('%$busqueda%') OR 
							UPPER(acreditacion) LIKE UPPER('%$busqueda%') OR 	UPPER(entidad) LIKE UPPER('%$busqueda%')) ORDER BY laboratorio ASC LIMIT $por_pagina OFFSET $desde");
						
						while ($data1 = mysqli_fetch_array($result)) {
							
							?>
							<tr>
							<!-- Muestra la img-->
							<td><img width="100" src="data:<?php echo $data1['imgTipo']; ?>;base64,<?php echo  base64_encode($data1['imgBinario']); ?>"></td>
							<!-- Muestra la img-->
                                <td class=".font-weight-bold"><?php echo $data1['laboratorio']; ?></td>
								<td><?php echo $data1['telefono']; ?></td>
								<td><?php echo $data1['domicilio']; ?></td>
								<td><?php echo $data1['entidad']; ?></td>
								<td><?php echo $data1['acreditacion']; ?></td>
								
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
									<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-step-backward"></i></a></li>
									<li><a href="?pagina=<?php echo $pagina-1;?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-backward"></i></a></li>
									<?php 
								}
								for($i=1; $i <= $total_paginas; $i++){
									if($i == $pagina){
										echo '<li class="pagSelected">'.$i.'</li>';					
									}
								}

								if($pagina != $total_paginas){
									?>
									<li><a href="?pagina=<?php echo $pagina+1;?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-forward"></i></a></li>
									<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-step-forward"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
				<?php } ?>
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
		<div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
	</html>
	<?php } ?>