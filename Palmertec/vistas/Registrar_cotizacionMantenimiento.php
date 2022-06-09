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

function operacionserv(){
var n1 = document.getElementById("costo2").value;

  
  document.getElementById("subtotalcotizacionserviciom").value = n1


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
                $cve_costo_mantenimiento = mysqli_real_escape_string($conexion, $_REQUEST['cve_costo_mantenimiento']);
                $busqueda = mysqli_real_escape_string($conexion, $_REQUEST['busqueda']);
                $porcentaje_mantenimiento = mysqli_real_escape_string($conexion, $_REQUEST['porcentaje_mantenimiento']);
				$costo = mysqli_real_escape_string($conexion, $_REQUEST['costo']);
                $equipo = mysqli_real_escape_string($conexion, $_REQUEST['equipo']);
               

				$sql = mysqli_query($conexion ,"SELECT costo * porcentaje_mantenimiento /100 + costo AS NewPrice1 
				FROM costos_mantenimiento where cve_costo_mantenimiento = $cve_costo_mantenimiento");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:Registrar_cotizacionMantenimiento.php");
				}else{
					while ($data4 = mysqli_fetch_array($sql)) {
						$NewPrice1 = $data4['NewPrice1'];
						
						
					}
				}



				?>

		<h4 class="pb-3" style="color:#0c62bf">Cotizador de Mantenimiento</h4>
		
		<div class="form-row">
			
			<div class="form-group col-md-4">
			<label for="equipom">Equipo</label>
			<input type="text" class="form-control" id="equipom" readonly name="equipom" required value="<?php echo $equipo;?>">
            </div>

            <div class="form-group col-md-4">
			<label for="serviciom">Servicio</label>
			<input type="text" class="form-control" id="serviciom" readonly name="serviciom" required value="Mantenimiento">
            </div>
           
		</div>

		
           <div class="form-row">
				
			<div class="form-group col-md-5">
			<label for="costom">Costo</label>	
			<input type="text" class="form-control" id="costom" readonly name="costom" required value="$<?php echo $NewPrice1;?>">
		    </div>
            <div class="form-group col-md-5">
			<label for="fecha_serviciom">Fecha del servicio</label>	
			<input type="date" class="form-control" id="fecha_serviciom" name="fecha_serviciom" value="<?php echo $fechac;?>"
		    required min= <?php $hoy=date("Y-m-d"); echo date("Y-m-d",strtotime($hoy. "+ 3 days"));?> >
            </div>

		</div>


		<h4 class="pb-3" style="color:Black">Datos adicionales</h4>
	
		
		<div class="form-row">
			<div class="form-group col-md-3">	
			<label for="marcam">Marca</label>
			<input type="text" name="marcam" class="form-control" id="marcam"  required maxlength="10" minlength="1">
	                </div><br>	
			<div class="form-group col-md-3">
			<label for="modelom">Modelo</label>
			<input type="text" name="modelom" class="form-control" id="modelom"  required maxlength="10" minlength="1">
		    </div>
			<div class="form-group col-md-3">	
			<label for="identificadorm">Identificador</label>
			<input type="text" name="identificadorm" class="form-control" id="identificadorm"  required    maxlength="10" minlength="1">
	       </div>
           <div class="form-group col-md-4">	
			<label for="subtotalcotizacionserviciom">Costo mantenimiento</label>
			<input style="color:red;" type="hidden" name="costo2" class="form-control"  id="costo2"  value="<?php echo $NewPrice1;?>"readonly required>  
            <input style="color:red;" type="text" name="subtotalcotizacionserviciom" class="form-control" required   id="subtotalcotizacionserviciom"  readonly>
        </div>
            <br>
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