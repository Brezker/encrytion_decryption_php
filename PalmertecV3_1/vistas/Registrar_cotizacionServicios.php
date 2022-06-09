<?php 
session_start();
if($_SESSION['rol'] != "proovedor"){	
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

function operacionserv(){
 
  var n2 = document.getElementById("costo2").value;
  var n3 = document.getElementById("ciclos").value;
  var n4 = document.getElementById("costociclo").value;

  var costociclo = (parseInt(n3) * parseInt(n4));
  var costoservicio = (parseInt(costociclo) + parseInt(n2));
  
  document.getElementById("subtotalcotizacionservicio").value = costoservicio
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
                $cve_costo_servicio = mysqli_real_escape_string($conexion, $_REQUEST['cve_costo_servicio']);
                $lista1 = mysqli_real_escape_string($conexion, $_REQUEST['lista1']);
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				$fechac = mysqli_real_escape_string($conexion, $_REQUEST['fechac']);
                $laboratorio = mysqli_real_escape_string($conexion, $_REQUEST['laboratorio']);
                $porcentaje = mysqli_real_escape_string($conexion, $_REQUEST['porcentaje']);
				$costo = mysqli_real_escape_string($conexion, $_REQUEST['costo']);
               
			
               
                if ($_POST['lista1']==1){
                  $servicio  = 'Calificación de diseño'; 
                }else if ($_POST['lista1']==2){
                    $servicio  = 'Calificación de instalación'; 
                }else if ($_POST['lista1']==3){
                    $servicio  ='Calificación de operación'; 
                }else if ($_POST['lista1']==4){
                     $servicio = 'Calificación de desempeño'; 
                }


				$sql = mysqli_query($conexion ,"SELECT cicloOperacion * porcentaje_calificacion_operacion /100 + cicloOperacion AS NewPrice 
				FROM costos_servicios where cve_costo_servicio = $cve_costo_servicio");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:Registrar_cotizacionServicios.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$NewPrice = $data3['NewPrice'];
						
						
					}
				}



				$sql = mysqli_query($conexion ,"SELECT cicloDesempeño * porcentaje_calificacion_desempeno /100 + cicloDesempeño AS NewPrice1 
				FROM costos_servicios where cve_costo_servicio = $cve_costo_servicio");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:Registrar_cotizacionServicios.php");
				}else{
					while ($data4 = mysqli_fetch_array($sql)) {
						$NewPrice1 = $data4['NewPrice1'];
						
						
					}
				}



				?>

		<h4 class="pb-3" style="color:#0c62bf">Cotizador de Servcios</h4>
		
		<div class="form-row">
			
			<div class="form-group col-md-4">
			<label for="equipo">Equipo</label>
			<input type="text" class="form-control" id="equipo" readonly name="equipo" required value="<?php echo $busqueda;?>">
            </div>

            <div class="form-group col-md-4">
			<label for="servicio">Servicio</label>
			<input type="text" class="form-control" id="servicio" readonly name="servicio" required value="<?php echo $servicio ;?>">
            </div>
            <div class="form-group col-md-4">	
			<label for="laboratorio">Laboratorio</label>
			<input type="text" class="form-control" id="laboratorio" readonly name="laboratorio" required value="<?php echo $laboratorio;?>">
		    </div>
		</div>

		
           <div class="form-row">
				
			<div class="form-group col-md-5">
			<label for="costo">Costo</label>	
			<input type="text" class="form-control" id="costo" readonly name="costo" required value="$<?php echo $costo;?>">
		    </div>
            <div class="form-group col-md-5">
			<label for="fecha_servicio">Fecha del servicio</label>	
			<input type="date" class="form-control" id="fecha_servicio" name="fecha_servicio" value="<?php echo $fechac;?>"
		    required min= <?php $hoy=date("Y-m-d"); echo date("Y-m-d",strtotime($hoy. "+ 3 days"));?> >
            </div>

		</div>


		<h4 class="pb-3" style="color:Black">Datos adicionales</h4>
	
		
		<div class="form-row">
			<div class="form-group col-md-3">	
			<label for="marca">Marca</label>
			<input type="text" name="marca" class="form-control" id="marca"  required maxlength="50" minlength="1">
	                </div><br>	
			<div class="form-group col-md-3">
			<label for="modelo">Modelo</label>
			<input type="text" name="modelo" class="form-control" id="modelo"  required maxlength="50" minlength="1">
		    </div>
			<div class="form-group col-md-3">	
			<label for="identificador">Identificador</label>
			<input type="text" name="identificador" class="form-control" id="identificador"  required    maxlength="40" minlength="1">
	        <input type="hidden" name="cve_costo_servicio" class="form-control" id="cve_costo_servicio"  value="<?php echo $cve_costo_servicio;?>">
			</div><br>
		</div>	

		

        <div class="form-row">	
        <?php if ($_POST['lista1']==1){?>
        	<div class="form-group col-md-4">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio" readonly required >
	        </div>
            <input type="hidden" name="ciclos" class="form-control" id="ciclos"   value="1">
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="0">
            <?php }else if($_POST['lista1']==2){?>
            	<div class="form-group col-md-4">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
            <input type="hidden"  name="ciclos" class="form-control" id="ciclos"  value="1">
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="0">
	        </div>
                <?php }else if($_POST['lista1']==3){?>
            <div class="form-group col-md-4">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
	        </div>
            <div class="form-group col-md-4">	
			<label for="ciclos">Ciclos </label>
			<label style="color: red"> Costo por ciclo  $<?php echo $NewPrice; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos"  required>
	        </div>
                    <?php }else if($_POST['lista1']==4){?>
            <div class="form-group col-md-4">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio" readonly vrequired>
	        </div>
            <div class="form-group col-md-4">	
			<label for="ciclosn">Ciclos</label>
			<label style="color: red"> Costo por ciclo  $<?php echo $NewPrice1; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice1;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos"  required>
	        </div>
                        <?php } ?>

    
	<input type="hidden" name="costo2" class="form-control" id="costo2"  value="<?php echo $costo;?>">
		
		</div>
		
		<br>
		<button class="btn btn-primary btn-lg" type="button"  value="Cotizar" id="boton1" onclick = "operacionserv();">Cotizar</button>
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