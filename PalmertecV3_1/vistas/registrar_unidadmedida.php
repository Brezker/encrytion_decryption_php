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
		<title>Registrar unidad de medida</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<main class="main">
			<div class="container">
				<h1>Registrar Unidad de medida</h1>	
				<div class="form-register">					
					<form action="../controladores/registrar_unidadmedida_adm.php" method="POST" class="bg-white shadow p-5 rounded-lg"><div class="col-md-4">
							<label for="">Unidad medida</label>
							<input type="text" class="form-control" name="unidadMedida" id="unidadMedida" >
							<br>
							<label for="">Magnitud</label>
							<select name="id_magnitud" id="id_magnitud" class="form-control" required>  
                        <option value="">Seleccionar</option>               
                        <?php 
                        $sql_magnitud = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        while ($data_magnitud = mysqli_fetch_array($sql_magnitud)) {
                            $id = $data_magnitud['id_magnitud'];
							$servicio = $data_magnitud['magnitud'];
							echo '<option value="'.$id.'">'.$servicio.'</option>';                   
                        }
                        ?>
                        </select> 
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


	<?php } ?>