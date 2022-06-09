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
		<title>Actualizar Servicio</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
		<?php include("includes/head.php"); ?>
		<?php 
//Recuperar datos 
		$id_servicio= $_GET['id'];
		$sql = mysqli_query($conexion ,"SELECT * FROM servicios inner join magnitud on servicios.id_magnitud=magnitud.id_magnitud where id_servicio = $id_servicio");
		$result = mysqli_num_rows($sql);
			while ($data = mysqli_fetch_array($sql)) {
				$id_servicio = $data['id_servicio'];
				$servicio = $data['servicio'];
                $magnitud = $data['magnitud'];
		}
		?>
		<main class="main">
			<div class="container">
				<h1>Actualizar Servicio</h1>
				<div class="form-register">		
					<form action="../controladores/actualizar_servicio.php" method="post" class="bg-white shadow p-5 rounded-lg">
					
					<div class="form-row">
                    <label for="">ID</label>
						<input type="text" class="form-control" name="id_servicio" id="id_servicio" value="<?php echo $id_servicio ?>" readonly>
                        <label for="">Servicios</label>
						<input type="text" class="form-control" name="servicio" id="servicio" value="<?php echo $servicio ?>">
                        <label for="cicloDesempeño">Magnitud</label>
						<select name="id_magnitud" id="id_magnitud" class="form-control" required>  
                        <option value=""><?php echo $magnitud ?></option>               
                        <?php 
                        $sql_magnitud = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        while ($data_magnitud = mysqli_fetch_array($sql_magnitud)) {
                            $id = $data_magnitud['id_magnitud'];
							$servicio = $data_magnitud['magnitud'];
							echo '<option value="'.$id.'">'.$servicio.'</option>';                   
                        }
                        ?>
                        </select> 	
					</div>	
					<br><br>
					
            <div class="text-center">
				<input type="submit" value="Actualizar" class="btn btn-primary" name="guardar" id="guardar">
                
            </div>
        </div>	
					</form>
					<br>
					<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
				</div>
			</div>
		</main>
		

	</body>
	</html>
<?php } ?>	