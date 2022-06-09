<?php 
session_start();
if($_SESSION['rol'] != "proveedor"){	
	@session_start();
	session_destroy();
	header("Location:https://palmertec.com.mx/PuntoDeVenta/");

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
                $cve_costo_servicio_dif = mysqli_real_escape_string($conexion, $_REQUEST['cve_costo_servicio_dif']);
                $serv = mysqli_real_escape_string($conexion, $_REQUEST['serv']);
				$busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
				$fechac = mysqli_real_escape_string($conexion, $_REQUEST['fechac']);
                $laboratorio = mysqli_real_escape_string($conexion, $_REQUEST['laboratorio']);
				$costo = mysqli_real_escape_string($conexion, $_REQUEST['costo']);
               
			
               
                if ($_POST['serv']==1){
                  $servicio  = 'Perfil Térmico Baños';
                }else if ($_POST['serv']==2){
                    $servicio  = 'Perfil Térmico';
                }else if ($_POST['serv']==3){
                    $servicio  ='Validación';
                }else if ($_POST['serv']==4){
                     $servicio = 'Calificación';
                }else if ($_POST['serv']==5){
                    $servicio  ='Presión';
                }else if ($_POST['serv']==6){
                    $servicio  ='Temperatura';
                }else if ($_POST['serv']==7){
                    $servicio  ='Conductividad';
                }else if ($_POST['serv']==8){
                    $servicio  ='PH';
                }else if ($_POST['serv']==9){
                    $servicio  ='Turbidez';
                }


				$sql = mysqli_query($conexion ,"SELECT punto_adicional AS NewPrice FROM costos_servicios_dif where cve_costo_servicio_dif = $cve_costo_servicio_dif");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:Registrar_cotizacionServicios_dif.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$NewPrice = $data3['NewPrice'];
						
						
					}
				}



				



				?>

		<h4 class="pb-3" style="color:#0c62bf">Cotizador de Servicios</h4>
		
		<div class="form-row">
			
			<div class="form-group col-md-4">
			<label for="equipo">Equipo</label>
			<input type="text" class="form-control" id="equipo" readonly name="equipo" required value="<?php echo $busqueda;?>">
            </div>

            <div class="form-group col-md-4">
			<label for="servicio">Servicio</label>
			<input type="text" class="form-control" id="servicio" readonly name="servicio" required value="<?php echo $servicio ;?>">
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
			<input type="text" name="marca" class="form-control" id="marca"  required maxlength="10" minlength="1">
	                </div><br>	
			<div class="form-group col-md-3">
			<label for="modelo">Modelo</label>
			<input type="text" name="modelo" class="form-control" id="modelo"  required maxlength="8" minlength="1">
		    </div>
			<div class="form-group col-md-3">	
			<label for="identificador">Identificador</label>
			<input type="text" name="identificador" class="form-control" id="identificador"  required    maxlength="8" minlength="1">
	        <input type="hidden" name="cve_costo_servicio" class="form-control" id="cve_costo_servicio"  value="<?php echo $cve_costo_servicio;?>">
			</div><br>
		</div>	

		

        <div class="form-row">	
        <?php if ($serv==1){?>
        	<div class="form-group col-md-6">
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio" readonly required >
	        </div>
            <div class="form-group col-md-6">	
			<label for="ciclos">Punto Adicional </label>
			<label style="color: red"> Costo por punto adicional  $<?php echo $NewPrice; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos" value="0">
	        </div>
        <?php }else if($serv==2){?>
            <div class="form-group col-md-6">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
            </div>
            <div class="form-group col-md-6">	
			<label for="ciclos">Punto Adicional </label>
			<label style="color: red"> Costo por punto adicional  $<?php echo $NewPrice; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos" value="0" required>
	        </div>
        <?php }else if($serv==3){?>
            <div class="form-group col-md-6">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
            </div>
            <div class="form-group col-md-6">	
			<label for="ciclos">Punto Adicional </label>
			<label style="color: red"> Costo por punto adicional  $<?php echo $NewPrice; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos" value="0" required>
	        </div>
            <!--
            <div class="form-group col-md-4">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
	        </div>
            <input type="hidden"  name="ciclos" class="form-control" id="ciclos"  value="1">
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="0">
			-->
        <?php }else if($serv==4){?>
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
	    <?php }else{?>
            <div class="form-group col-md-6">	
			<label for="subtotalcotizacionservicio">Costo cotizacion</label>
			<input style="color:red;" type="text" name="subtotalcotizacionservicio" class="form-control" id="subtotalcotizacionservicio"  readonly required>
            </div>
            <div class="form-group col-md-6">	
			<label for="ciclos">Punto Adicional </label>
			<label style="color: red"> Costo por punto adicional  $<?php echo $NewPrice; ?> </label>
			<input type="hidden" name="costociclo" class="form-control" id="costociclo"  value="<?php echo $NewPrice;?>">
			<input type="number" name="ciclos" class="form-control" id="ciclos" value="0" required>
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