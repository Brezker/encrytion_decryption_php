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
		<title>Cotización</title>
		<?php include "../scripts/scripts.php"; ?>
        <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	
	<script>

function operacion(){
  var n1 = document.getElementById("NewPrice").value;
  var n2 = document.getElementById("NewPrice2").value;
  var n3 = document.getElementById("puntosext").value;

  var costocalibracion = (parseInt(n2) * parseInt(n3)+parseInt(n1));
  
  document.getElementById("subtotalcotizacion").value = costocalibracion
}


</script>




	</head>


	<body>
		<?php include "includes/head.php"; ?>
		<main class="main">
  
       <div class="container">
         <main role="main" class="container">
	<div class="form-register">		
		
<form action="datos_registrados.php" method="POST" class="bg-white shadow p-5 rounded-lg">

<?php 
                $cve_costo_proveedor = mysqli_real_escape_string($conexion, $_REQUEST['cve_costo_proveedor']);
                $lista1 = mysqli_real_escape_string($conexion, $_REQUEST['lista1']);
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				$Alcancemi = mysqli_real_escape_string($conexion, $_REQUEST['Alcancemi']);
				$Alcancema = mysqli_real_escape_string($conexion, $_REQUEST['Alcancema']);
				$unidadmin = mysqli_real_escape_string($conexion, $_REQUEST['unidadmin']);
				$unidadmax = mysqli_real_escape_string($conexion, $_REQUEST['unidadmax']);
				$fechac = mysqli_real_escape_string($conexion, $_REQUEST['fechac']);
				$costo = mysqli_real_escape_string($conexion, $_REQUEST['costo']);
				$costoExtra = mysqli_real_escape_string($conexion, $_REQUEST['costoExtra']);
				$puntos = mysqli_real_escape_string($conexion, $_REQUEST['puntos']);
				$porcentaje = mysqli_real_escape_string($conexion, $_REQUEST['porcentaje']);
				

				
				
				$sql = mysqli_query($conexion ,"SELECT * FROM instrumentos WHERE id_instrumento = $busqueda");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:costos_laboratorios.php");
				}else{
					while ($data = mysqli_fetch_array($sql)) {
						$id_instrumento = $data['id_instrumento'];
						$instrumento = $data['instrumento'];
						
					}
				}


				$sql = mysqli_query($conexion ,"SELECT * FROM magnitud WHERE id_magnitud = $lista1");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:costos_laboratorios.php");
				}else{
					while ($data1 = mysqli_fetch_array($sql)) {
						$id_magnitud = $data1['id_magnitud'];
						$magnitud = $data1['magnitud'];
						
					}
				}
				


				$sql = mysqli_query($conexion ,"SELECT costo * porcentaje /100 + costo AS NewPrice
				FROM costos_proveedor where cve_costo_proveedor = $cve_costo_proveedor");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:costos_laboratorios.php");
				}else{
					while ($data2 = mysqli_fetch_array($sql)) {
						$NewPrice = $data2['NewPrice'];
						
						
					}
				}


				$sql = mysqli_query($conexion ,"SELECT costoExtra * porcentaje /100 + costoExtra AS NewPrice2
				FROM costos_proveedor where cve_costo_proveedor = $cve_costo_proveedor");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:costos_laboratorios.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$NewPrice2 = $data3['NewPrice2'];
						
						
					}
				}


				$sql = mysqli_query($conexion ,"SELECT extra,Comentarios
				FROM costos_proveedor where cve_costo_proveedor = $cve_costo_proveedor");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:costos_laboratorios.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$extra = $data3['extra'];
						$Comentarios = $data3['Comentarios'];
						
						
					}
				}

				?>




		<h4 class="pb-3" style="color:#0c62bf">Cotizador de calibracion</h4>
		
		<div class="form-row">
			<div class="form-group col-md-4">	
			<label for="magnitud">Magnitud</label>
			<input type="text" class="form-control" id="magnitud" readonly name="magnitud" required value="<?php echo $magnitud;?>">
                        </div>	
			<div class="form-group col-md-4">
			<label for="instrumento">Instrumento</label>
			<input type="text" class="form-control" id="instrumento" readonly name="instrumento" required value="<?php echo $instrumento;?>">
                        </div>
		</div>

		<div class="form-row">
		<div class="form-group col-md-3">
			<label for="AlmAnput">Alcance máximo</label>
			<input type="text"  class="form-control" id="Alcancema" readonly name="Alcancema" required value="<?php echo $Alcancema;?>">
		     </div>

			 <div class="form-group col-md-3">
			<label for="AlmAnput">Unidad de medida</label>
			<input type="text"  class="form-control" id="unidadmax" readonly name="unidadmax" required value="<?php echo $unidadmax;?>">
		     </div>

			<div class="form-group col-md-3">	
			<label for="AlmInput">Alcance mínimo</label>
			<input type="text"   class="form-control" id="Alcancemi" readonly name="Alcancemi" required value="<?php echo $Alcancemi;?>">
		        </div>
				
				<div class="form-group col-md-3">
			<label for="AlmInput">Unidad de medida</label>
			<input type="text"  class="form-control" id="unidadmin" readonly name="unidadmin" required value="<?php echo $unidadmin;?>">
		     </div>

				</div>


            <div class="form-row">
			
			<div class="form-group col-md-3">
			<label for="costo">Costo</label>	
			<input type="text" class="form-control" id="costo" readonly name="costo" required value="$<?php echo $NewPrice;?>">
		        </div>
                        <div class="form-group col-md-4">
			<label for="fecha_calibracion">Fecha de la calibracion</label>	
			<input type="date" class="form-control" id="fecha_calibracion" name="fecha_calibracion" value="<?php echo $fechac;?>"
		        required min= <?php $hoy=date("Y-m-d"); echo date("Y-m-d",strtotime($hoy. "+ 3 days"));?> >
                        </div>
		</div>


		<div class="form-row">
			<div class="form-group col-md-3">	
			<label for="extra">Otro</label>
			<input type="text" class="form-control" id="extra" readonly name="extra" required value="<?php echo $extra;?>">
		        </div>	
			<div class="form-group col-md-3">
			<label for="Comentarios">Comentarios</label>	
			<input type="text" class="form-control" id="Comentarios" readonly name="Comentarios" required value="<?php echo $Comentarios;?>">
		        </div>
                        
		</div>


		<h4 class="pb-3" style="color:Black">Registrar el instrumento</h4>
	
		
		<div class="form-row">
			<div class="form-group col-md-3">	
			<label for="marca">Marca</label>
			<input type="text" name="marca" class="form-control" id="marca"  required maxlength="50" minlength="1">
	                </div><br>	
			<div class="form-group col-md-3">
			<label for="modelo">Modelo</label>
			<input type="text" name="modelo" class="form-control" id="modelo"  required maxlength="50" minlength="1">
		    </div>
			<div class="form-group col-md-4">	
			<label for="puntos_calibrar">Puntos a calibrar</label>
			<input type="text" name="puntos_calibrar" class="form-control" id="puntos_calibrar" readonly required maxlength="20" minlength="1" value="<?php echo $puntos;?>">
           </div>
		</div>	

		
        <div class="form-row">	
			
			<div class="form-group col-md-3">	
			<label for="identificador">Identificador</label>
			<input type="text" name="identificador" class="form-control" id="identificador"  required    maxlength="40" minlength="1">
	        </div><br>
			<div class="form-group col-md-4">	
			<label for="puntosext">Puntos adicionales</label>
			<label style="color: red"> Costo por punto  $<?php echo $NewPrice2; ?> </label>
			<input type="number" name="puntosext" class="form-control" id="puntosext"  required    maxlength="40" minlength="1">
	        </div>
			<div class="form-group col-md-4">	
			<label for="subtotalcotizacion">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacion" class="form-control"  id="subtotalcotizacion"  readonly required>
	        </div>
		</div>
		
		<div class="form-group col-md-4">	
		
			<input type="hidden" name="NewPrice" class="form-control" id="NewPrice"  value="<?php echo $NewPrice;?>">
			<input type="hidden" name="NewPrice2" class="form-control" id="NewPrice2"  value="<?php echo $NewPrice2;?>">
			<input type="hidden" name="cve_costo_proveedor" class="form-control" id="cve_costo_proveedor"  value="<?php echo $cve_costo_proveedor;?>">
		</div><br>


	<button class="btn btn-primary btn-lg" type="button"  value="Cotizar" id="boton1" onclick = "operacion();">Cotizar</button>
    <div class="col-12" align="center">
	<button type="submit" value="Agregar" class="btn btn-primary btn-lg">Agregar</button>
	</div>
    </div>
        </form>
		


            </div>

		<br>
		
	</div>

	</div>

        </div>
        </div>
		
    </div>
    </body>
</html>


		
		<?php } ?>