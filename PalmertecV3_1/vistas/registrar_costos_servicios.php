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
		<title>Registrar servicios</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<h1>Registrar costos de servicios</h1>	
		
				
				<div class="form-register">					
					<form action="../controladores/registro_servicios_ProN.php" method="POST" class="bg-white shadow p-5 rounded-lg">
						
						<input type="hidden" name="idLab" id="idLab" value="<?php echo $Cve_laboratorio;?>">
						<div class="row">
						<div class="col-md-4">
							<label >Acreditaci&oacute;n </label>
			                <select id="acreditamiento" name="acreditamiento">
							<option value='0' selected>- Seleccione -</option>
							<option value="EMA">EMA</option>
							<option value="PERRY">PERRY</option>
							<option value="TRAZABILIDAD">TRAZABILIDAD</option>
							</select>
						</div>
						
						<div class="col-md-4">
							<label for="magnitud">Magnitud</label>
							<select id="lista1" name="lista1" >
							<?php 
                        		$sql_servicio = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        		while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
									echo '<option value="'. $data_servicio['id_magnitud'].'">'. $data_servicio['magnitud'].'</option>';                    
                        		}
                			?>
		    				</select>
						</div>
							
						<div class="col-md-4" id="select2lista"></div>
						
						<div class="col-md-6">
							<br><br>
							<h4 class="pb-3" style="color:#215e9a">Diseño</h4>
							<label for="calificacion_diseño">Costo</label>	
							<input type="text" class="form-control" name="calificacion_diseño" id="calificacion_diseño" >
							<br>
						</div>

						<br>
						
						<div class="col-md-6">
							<br><br>
							<h4 class="pb-3" style="color:#215e9a">Instalaci&oacute;n</h4>
							<label for="calificacion_instalacion">Costo </label>	
							<input type="text" class="form-control" name="calificacion_instalacion" id="calificacion_instalacion" >
							<br>
						</div>

						<br>
						
						<div class="col-md-6">
							<h4 class="pb-3" style="color:#215e9a">Operaci&oacute;n</h4>
							<label for="calificacion_operacion">Costo </label>
							<input type="text" class="form-control" name="calificacion_operacion" id="calificacion_operacion">
							<br>
							<label for="cicloOperacion">Costo por ciclo </label>
							<input type="text" class="form-control" name="cicloOperacion" id="cicloOperacion">
							<br>	
						</div>

						<br>
							
						<div class="col-md-6">
							<h4 class="pb-3" style="color:#215e9a">Desempeño</h4>
							<label for="calificacion_desempeño">Costo</label>
							<input type="text" class="form-control" name="calificacion_desempeño" id="calificacion_desempeño" >
							<br>
							<label for="cicloDesempeño">Costo por ciclo</label>
							<input type="text" class="form-control" name="cicloDesempeño" id="cicloDesempeño" >
							<br>
						</div>

						<br>
						
						<br><br>
					
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