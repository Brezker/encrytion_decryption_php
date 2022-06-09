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
		<title>Usuarios registrados</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<?php 
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				if(empty($busqueda)){
					header("location:usuarios.php");
				}
				?>
				<h1>Lista de usuarios registrados</h1>	
				<form action="buscarUsuario.php" method="get" class="form-search">
					<input type="text" name="busqueda" id="busqueda" class="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>">
					<input type="submit" value="Buscar" class="btn_search">
				</form>	
				<?php 
				$result = mysqli_query($conexion ,"SELECT * FROM usuarios  WHERE estatus = 1");
				$row = mysqli_fetch_array($result);
				if($row==0){?>
					<div class="vacio">
						<p>No se han encontrado nuevos usuarios</p>
					</div>
					<?php
				}else{
					?>				
					<table class="table table-responsive">
						<thead>
							<tr>								
								<th>Id</th>
								<th>Nombre</th>
								<th>Correo</th>
								<th>Rol</th>
								<th colspan="2">Acciones</th>
							</tr>
						</thead>
						<?php 

						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM usuarios 
							WHERE estatus = 1 AND (UPPER(nombre) LIKE UPPER('%$busqueda%') OR 
							UPPER(correo) LIKE UPPER('%$busqueda%') OR
							UPPER(rol) LIKE UPPER('%$busqueda%'))");
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

						$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE estatus = 1 AND UPPER(nombre) LIKE UPPER('%$busqueda%') OR 
							UPPER(correo) LIKE UPPER('%$busqueda%') OR
							UPPER(rol) LIKE UPPER('%$busqueda%') ORDER BY nombre ASC LIMIT $por_pagina OFFSET $desde");
						mysqli_close($conexion);
						while($row = mysqli_fetch_array($result)){?>
							<tr>								
								<td><?php echo $row['cve_usuario'] ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['correo']; ?></td>
								<td><?php echo $row['rol']; ?></td>
								<td>
									<a href=""> <i class="fas fa-user-edit"> </i></a>
									<a href=""> <i class="fas fa-user-times"> </i></a>
								</td>
							</tr>
						<?php } ?>
					</table>				
					<br>
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
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
		

	</body>
	</html>
	<?php } ?>