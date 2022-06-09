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
		<title>Menú Principal</title>
		<?php include "../scripts/scripts.php"; ?>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/palmertec-favicon.ico"/>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/site.css" />
    <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="css/fontello/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/menustyle.css">
    
	</head>

	<body>
		<?php include("includes/head.php"); ?>
		<br/>
		<div class="container">
			<h1 class="display-4">¿Qué servicio quieres cotizar?</h1>
		</div>
		<br/>
        
        <div class="row col align-self-center mx-auto justify-content-center">
		<!--
        <div class="col-sm-6 card bg-light text-white card text-center card card border-light mb-3">
			<form method="post" action="cotizacion_serv.php">
  			<img class="card-img img-fluid" src="../img/serv2.jpg">
  			<div class="card-img-overlay align-self-center mr-3">
			  <div class="row align-items-center h-100 justify-content-center"> 
					<div class="col-auto">
						<h5 class="card-title font-weight-bold">Servicio General</h5>
						<button type="submit" value="2" id="opcion" name="opcion" class="btn btn-primary btn-lg">Pulsa aqui para cotizar</button>
			  		</div> 
				</div>
  			</div>
			</form>
		  </div>
-->
          <div class="col-sm-6 card bg-light text-white card text-center card card border-light mb-3">
		  <form method="post" action="cotizacion_serv_difs.php">
  			<img class="card-img img-fluid" src="../img/serv1.jpg">
  			<div class="card-img-overlay align-self-center mr-3">
			  <div class="row align-items-center h-100 justify-content-center"> 
					<div class="col-auto">
						<h5 class="card-title font-weight-bold">Servicios</h5>
						<button type="submit" value="4" id="opcion" name="opcion" class="btn btn-primary btn-lg">Pulsa aqui para cotizar</button>
			  		</div> 
				</div>
  			</div>
			</form>
		  </div>
</div>

    	</body>
	</html>
    <?php } ?>