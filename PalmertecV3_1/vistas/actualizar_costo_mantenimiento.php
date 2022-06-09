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
			
				<h1>Costo Mantenimeinto</h1>	
		
				
				<div class="form-register">					
					<form action="../controladores/actualizar_costo_mantenimientoNc.php" method="POST" class="bg-white shadow p-5 rounded-lg">
						
						<div class="row">
						<div class="col-md-3">
							<label >Acreditaci&oacute;n </label>
			                <select id="acreditamiento" name="acreditamiento">
							<option value='0' selected>-Seleccione-</option>
							<option value="EMA">EMA</option>
							<option value="ILAC">ILAC</option>
                            <option value="TRAZABILIDAD">TRAZABILIDAD</option>
                            <option value="MANTENIMIENTO">MANTENIMIENTO</option>
							</select>
						</div>
						  <div class="col-md-6">
							  <label for="equipo">Equipo </label>
			                <select id="equipo" name="equipo">
							<?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM serviciosmantenimiento");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                           

                            echo '<option value="'. $data_servicio['servicio'].'">'. $data_servicio['servicio'].'</option>';                    
                        }
                        ?>
							</select>
						</div>
                        <?php 
						//Recuperar datos
				if(empty($_GET['id'])){
					header("Location:Mantenimiento_Prev.php");
				}
				$idLab = $_GET['id'];
				$sql = mysqli_query($conexion, "SELECT * FROM costos_mantenimiento WHERE cve_costo_mantenimiento = $idLab ");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:Mantenimiento_Prev.php");
				}else{
					while($data = mysqli_fetch_array($sql)){
					
						$costo1 = $data['costo'];
                        $id = $data['cve_costo_mantenimiento'];
				
					}
				}
				
				?>
					  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                        <div class="col-md-3">
								<label for="costoMantenimiento">Costo</label>	
								<input type="text" class="form-control" name="costoMantenimiento" id="costoMantenimiento"  value="<?php echo $costo1; ?>" >
							</div>

						</div>
                        <br><br><br>
                        <div class="text-center">
							<div class="col-12" align="center">
                    <button type="submit" value="Registrar"  class="btn btn-primary btn-lg">Registrar</button>
                    </div>  
					</div>

						</div>
						
						</div>				
					</form>
				</div>
				<br><br><br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			
		</main>
		
		</div>
	</body>
	</html>
	<?php } ?><?php