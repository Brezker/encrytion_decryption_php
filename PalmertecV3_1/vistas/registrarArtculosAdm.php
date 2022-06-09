<?php 
session_start();
if($_SESSION['rol'] != "administrador"){	
	@session_start();
	session_destroy();
	header("Location:../Index.php");
}else{
	?>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>

	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registrar Articulo</title>
	
		
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
			<br>
			<center><h4 class="pb-3" style="color:#0c62bf">Registrar Alt&iacute;culos</h4></center>
				
		
			
					<form action="../controladores/registrarArticuloAdm.php" method="POST"  enctype="multipart/form-data" class="bg-white shadow p-5 rounded-lg">
  
								

   <!--Imagen 1-->
 		<div class="form-row">
 
 			<h4 class="pb-3" style="color:#0c62bf">Ingresa la primera promoci&oacute;n</h4>
			<input type="file" class="form-control-file" name="foto" id="foto" accept="image/png,image/jpeg">
                    
		</div>											
    <!-- Imagen 1-->

					
						<div class="row">
							<div class="col-md-6">
								<label for="nombreAr">Nombre del art&iacute;culo</label>	
								<input type="text" class="form-control" name="nombreAr" id="nombreAr" >
							</div>
							<br>
						
						</div>
						<br>
						
						
						
						<div class="row">
							<div class="col-md-6">
								<label for="fecha">Fecha</label>	
								<input type="date" class="form-control" name="fecha" id="fecha" >
							</div>
							<br>
						
						</div>
						<br>

						<div class="row">
							<div class="col-md-10">
								<label for="infoAr">Informaci&oacute;n </label>
								<textarea name="infoAr" id="infoAr" class="form-control" rows="10" cols="40"></textarea>
							</div>
							<br>
						
						</div>
						<br>



				

									
		<div class="form-group">
            <div class="text-center">
                <h3>
				<input type="submit" value="Registrarse" class="btn btn-primary" name="guardar" id="guardar">
                    
                </h3>
            </div>
        </div>	
						
						
					</form>
		</div>
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
		</div>
	</main>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



	</body>
	</html>
	<?php } ?>
