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
		<title>Magnitud</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<h1>Registrar Magnitudes</h1>	
		
				
				<div class="form-register">					
					<form action="../controladores/registrar_magnitud_adm.php" method="POST" class="bg-white shadow p-5 rounded-lg"><div class="col-md-4">
							<label for="calificacion_desempeño">Magnitud</label>
							<input type="text" class="form-control" name="magnitud" id="magnitud" >
						</div>
						<br><br><br>
						<div class="col-12" align="center">
                    		<button type="submit" value="Registrar"  class="btn btn-primary btn-lg">Registrar</button>
                    	</div>  
						
					</form>
				</div>
				<br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			
		</main>
		
		</div>
	</body>
	</html>

	<script type="text/javascript" >
	
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
	</script>

	<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarLista(){
		
		$.ajax({
			type:"POST",
			url:"datos_servicios.php",
			data:"servicio=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
	</script>

	<?php } ?>