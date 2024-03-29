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
		<title>Registrar servicios</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<h1>Registrar servicio diferente</h1>	
				<div class="form-register">					
					<form action="../controladores/registrar_serviciodiferente_adm.php" method="POST" class="bg-white shadow p-5 rounded-lg"><div class="col-md-4">
					
					<div class="col-md-4" id="select3lista"></div>
					<label for="">Servicio</label>
							<select id="servicio" name="servicio" class="form-control" required>                 
                        <?php 
                        $sql_magnitud = mysqli_query($conexion, "SELECT * FROM todos_servicios");                    
                        while ($data_magnitud = mysqli_fetch_array($sql_magnitud)) {
							$servicio = $data_magnitud['servicio'];
							echo '<option value="'.$servicio.'">'.$servicio.'</option>';                   
                        }
                        ?>
                        </select> 
							<br>
							<label for="">Magnitud</label>
							<select name="id_magnitud" id="id_magnitud" class="form-control" required>  
                        <option value=""></option>               
                        <?php 
                        $sql_magnitud = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        while ($data_magnitud = mysqli_fetch_array($sql_magnitud)) {
                            $id_magnitud = $data_magnitud['id_magnitud'];
							$magnitud = $data_magnitud['magnitud'];
							echo '<option value="'.$id_magnitud.'">'.$magnitud.'</option>';                   
                        }
                        ?>
                        </select> 
							<br>
                            <label for="calificacion_desempeño">Equipo</label>
							<input type="text" class="form-control" name="equipo" id="equipo" >
							<br>
						
							
						</div>
						<br>
					
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
		$('#servicio').val(1);
		recargarLista2();

		$('#servicio').change(function(){
			recargarLista2();
		});
	})
</script>

<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarLista2(){
		
		$.ajax({
			type:"POST",
			url:"obtener_servicio.php",
			data:"servicio=" + $('#servicio').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
	<?php } ?>