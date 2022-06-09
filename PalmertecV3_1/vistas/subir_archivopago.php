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
		<title>Comprobantes</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<h1>Cotizaciones</h1>	
				
				<?php 
                $id_cliente = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
				$result = mysqli_query($conexion, "SELECT * FROM detallepedido WHERE cve_usuario =$id_cliente ");
				$row = mysqli_fetch_array($result);
				if($row == 0){?>
					<div class="vacio">
						<h2>No se han registrado pedidos</h2>
					</div>
				<?php }else{ ?>
					<table class="table table-responsive text-nowrap">
						<thead>
							<tr>
                                <th>Recoleccion</th>
								<th>Subtotal</th>
								<th>Iva</th>
								<th>Total</th>
								<th>Cotizacion No.</th>
								<th>Pago</th>
								<th>Comentarios</th>
								<th>PDF</th>
								<th colspan="1">Subir comprobante</th>
								<th>Reporte</th>
								
							</tr>
						</thead>
						<?php 
						$sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM detallepedido WHERE cve_usuario =$id_cliente");
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
						$result =  mysqli_query($conexion, "SELECT * FROM detallepedido WHERE cve_usuario =$id_cliente");
						while ($data = mysqli_fetch_array($result)) {
							$id_detallePedido = $data['id_detallePedido'];
                            $Cotizacion_no = $data['Cotizacion_no'];
							?>
							<tr>
                                <td>$<?php echo $data['recoleccion']; ?></td>
								<td>$<?php echo $data['subtotal']; ?></td>
								<td>$<?php echo $data['iva']; ?></td>
								<td>$<?php echo $data['total']; ?></td>
								<td><?php echo $data['Cotizacion_no']; ?></td>
								<td><?php echo $data['pago']; ?></td>
								<td><?php echo $data['Comentarios']; ?></td>

								<td>
								<?php	
                                $resultArchivos = mysqli_query($conexion, "SELECT * FROM archivos WHERE Cotizacion_no= '$Cotizacion_no'");
                                $num_reg = mysqli_num_rows($resultArchivos);
                                if($num_reg == 0){
                                echo 'Sin registros';
                                }else{
                                while ($datos = mysqli_fetch_array($resultArchivos)) {?>

                                 <!--<button onclick="openModelPDF('<?php echo $datos['url'] ?>')" class="btn btn-primary" type="button">Ver</button>-->
							
								 <a href="<?php echo $datos['url'] ?>" target="_blank">Ver archivo</a>
                                 <?php	}
                                    }
                                  ?>


								</td>
								<td>
							
                                <form method="post"  action="agregararchivo.php">
                               <input type="hidden" name="Cotizacion_no" value="<?php echo $data["Cotizacion_no"] ?>">
                               <button class="btn btn-lg" style="background-color:#3b9b27; width:50px; height:38px" >
                               <i class="fas fa-file-pdf"></i>
                               </button>
						       </form>  


						    <!-- <a href="agregararchivo.php?Cotizacion_no=<?php echo $data["Cotizacion_no"]; ?>"><i class="fas fa-file-pdf"></i></a>-->
								</td>
								
								<?php 
								$file = "../vistas/archivos/$Cotizacion_no.pdf";
								?>
								<td>
									<a href="<?php echo $file ?>" target="_blank">Ver reporte PDF</a>
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
		<script>
			
			function openModelPDF(url) {
				$('#modalPdf').modal('show');
				$('#iframePDF').attr('src','<?php echo '..archivos/' . $_SERVER['HTTP_HOST'] . '/files/'; ?>'+url);
				                                
			}
		</script>
	</body>
	</html>
	<?php } ?>