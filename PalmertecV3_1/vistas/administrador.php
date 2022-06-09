<?php 
session_start();
if(@$_SESSION['rol'] != "administrador"){	
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
		<title>Panel de administrador</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				
				<div class="d-flex justify-content-center text-center">
					
					<form class="p-3 bg-light" method="post"> 
						
					<div class="card-group">
  <div class="card border border-light">
    <img src="../img/cal.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
      <h4 class="card-title">Instrumentos</h4>
      <p class="card-text">
		  <a href="mostrar_instrumentos.php">
		  <input type="button"  class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
  <div class="card border border-light">
    <img src="../img/serv.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Servicios de Calibración</h4>
      <p class="card-text">
	  <a href="mostrar_servicios_calibracion.php">
      <input type="button" class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
  <div class="card border border-light">
    <img src="../img/mag.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Magnitudes</h4>
      <p class="card-text">
	  <a href="mostrar_magnitud.php">
      <input type="button" class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
 
</div>
<div class="card-group">
<div class="card border border-light">
  <img src="../img/mant.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Mantenimiento</h4>
      <p> <a href="mostrar_servicios_mante.php">
	  <input type="button"  class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
  <div class="card border border-light">
    <img src="../img/unidad.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Unidad de medida</h4>
      <p class="card-text">
	  <a href="mostrar_unidadmedida.php">
      <input type="button" class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
  <div class="card border border-light">
    <img src="../img/serv_dif.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Servicios diferentes</h4>
      <p class="card-text">
	  <a href="mostrar_servicios_dif.php">
      <input type="button" class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
  <div class="card border border-light">
    <img src="../img/serv.png" class="card-img-top w-25 m-2 mx-auto" alt="...">
    <div class="card-body">
	<h4 class="card-title">Servicios</h4>
      <p class="card-text">
	  <a href="mostrar_servicio.php">
      <input type="button" class="btn btn-outline-info btn-lg h-50" value="Mostrar">
		</a></p>
    </div>
  </div>
</div>

						<!--<div class="form-group">							
							<div class="input-group">
								<div class="input-group-prepend">
									<a href="listaLaboratoriosAdmN.php">
										<input type="button"  class="btn btn-primary" value="Agregar % Calibraciones">
									</a>
								</div>								
							</div>
						</div>

						<div class="form-group">							
							<div class="input-group">
								<div class="input-group-prepend">
									<a href="listaLaboratoriosAdmN2.php">
										<input type="button"  class="btn btn-primary" value="Agregar % Servicios">
									</a>
								</div>								
							</div>
						</div>

						<div class="form-group">							
							<div class="input-group">
								<div class="input-group-prepend">
									<a href="listaLaboratoriosAdmN3.php">
										<input type="button"  class="btn btn-primary" value="Agregar % Mantenimiento">
									</a>
								</div>								
							</div>
						</div>
-->
						
					</form>
					<!--
					<form class="p-5 bg-light" method="post">
					
					<div class="form-group">							
							<div class="input-group">
								<div class="input-group-prepend">
									<a href="registrarPromocionAdm.php">
										<input type="button"  class="btn btn-primary" value="Agregar Promociones">
									</a>
								</div>								
							</div>
						</div>
						
						<div class="form-group">							
							<div class="input-group">
								<div class="input-group-prepend">
									<a href="registrarArtculosAdm.php">
										<input type="button"  class="btn btn-primary" value="Agregar Art&iacute;culos">
									</a>
								</div>								
							</div>
						</div>
						
					</form>
					-->
				</div>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
		
	</body>
	</html>
	<?php } ?>