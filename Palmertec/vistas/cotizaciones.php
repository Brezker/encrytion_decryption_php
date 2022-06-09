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
	<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cotización</title>
	<?php include "../scripts/scripts.php"; ?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function mostrar(id) {
   if (id == "clase") {
        $("#clase").show();
        
    }
    
	if (id == "Seleccionar") {
        $("#clase").hide();
       
    }
    
}
</script>

	</head>
	<body>

		<?php include("includes/head.php"); ?>
		<div class="container">
    <div class="form-register">		
				
				<?php 
                $opcion = mysqli_real_escape_string($conexion, $_REQUEST['opcion']);
				
                if ($_POST['opcion']==1){?>




             <form method="post" class="bg-white  shadow p-5 rounded-lg" action="precio_calibracion.php">
       
			 <h4 class="pb-3" style="color:#0c62bf">Cotizador de  calibracion</h4>
			   
			
			    <div class="form-row">
				<div class=" col-md-4">
			    <label for="magnitud">Magnitud </label>
                <select id="lista1" name="lista1" >
				<?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                           

                            echo '<option value="'. $data_servicio['id_magnitud'].'">'. $data_servicio['magnitud'].'</option>';                    
                        }
                        ?>
		    	</select>
                </div>
                
			    <div id="select2lista"></div>

				<div class="col-md-2">
						 <label for="clase">Opcional</label>
                        <select id="status" name="status" onChange="mostrar(this.value);">
	                    <option value="Seleccionar">Seleccionar</option>
                        <option value="clase">Clase</option>
                        </select>
						</div>
					
					
					
	                    <div id="clase" style="display: none;">
	                        <label for="extra">Clase</label>
			                <select id="extra" name="extra">
							<option value='0' >-Seleccione-</option>
							<option value="CLASE F1">CLASE F1</option>
							<option value="CLASE F2">CLASE F2</option>
							<option value="CLASE M1">CLASE M1</option>
							<option value="CLASE M2">CLASE M2</option>
							<option value="CLASE M3">CLASE M3</option>
		    				</select>
                        </div>
                       
			    </div>
		        <br><br>


                
		     <div class="form-row">
			<div class="form-group col-md-2">	
			<label for="AlmInput">Alcance mínimo</label>
			<input type="number" step="any" class="form-control" id="Alcancemi" name="Alcancemi" required>
			</div>	


		
			<div id="select4lista" class="col-md-2"></div>


			<!--
			<div class="col-md-2">
						<label for="unidadmin">Unidad de medida</label>
						<select name="unidadmin" id="unidadmin" class="form-control"  required>  
                        <option value=""></option>               
                        <?php 
                        /*$sql_servicio = mysqli_query($conexion, "SELECT * FROM unidad_medidad");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                            $servicio = $data_servicio['unidadMedida'];

                            echo '<option value="'.$servicio.'">'.$servicio.'</option>';                    
                        }*/
                        ?>
                        </select> 
						</div>
					-->
		

			
			<div class="form-group col-md-2">
			<label for="AlmAnput">Alcance máximo</label>
			<input type="number" step="any" class="form-control" id="Alcancema" name="Alcancema" required>
			</div>

	
			
			<div id="select5lista" class="col-md-2"></div>

			<!--
			<div class="col-md-2">
						<label for="unidadmax">Unidad de medida</label>
						<select name="unidadmax" id="unidadmax" class="form-control"  required>  
                        <option value=""></option>               
                        <?php 
                        /*$sql_servicio = mysqli_query($conexion, "SELECT * FROM unidad_medidad");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                            $servicio = $data_servicio['unidadMedida'];

                            echo '<option value="'.$servicio.'">'.$servicio.'</option>';                    
                        }*/
                        ?>
                        </select> 
						</div>
            </div>
					-->


            <div class=" col-md-4">
			<label for="AlmAnput">Fecha de la calibración</label>
            <input type="date" class="form-control" id="fechac" name="fechac" 
			required min= <?php $hoy=date("Y-m-d");
            echo date("Y-m-d",strtotime($hoy. "+ 3 days"));?> >
 </div>
                
            
	<div class="col-12" align="center">
                    <button type="submit" class="btn btn-primary btn-lg">Cotizar</button>
                   
                </div> 

		    </div>


		
            
        
       
		</form>
		<br>
	  
      </div>
					<?php }else if($_POST['opcion']==2){?>

						
<div class="container">
<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

         <main role="main" class="container">
	<div class="form-register">		
		

		<form action="costos_laboratorios2.php" method="post" class="bg-white shadow p-5 rounded-lg">
		<h4 class="pb-3" style="color:#0c62bf">Cotizador de servicios</h4>

		
		<div class="form-row">
			<div class="col-md-4">
				<label for="magnitud">Magnitud</label>
				<select name="lista2" id="lista2">
					<?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM magnitud");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
							echo '<option value="'. $data_servicio['id_magnitud'].'">'. $data_servicio['magnitud'].'</option>';                    
                        }
                	?>
				</select>
			</div>
			
			<div class="col-md-4" id="select3lista"></div>
			
			<div class="form-group col-md-4">
				<label for="magnitud">Servicio </label>
        	    <select id="lista1" name="lista1" >
					<option value="0">Selecciona una opcion</option>
					<option value="1">Calificación de diseño</option>
					<option value="2">Calificación de instalación</option>
					<option value="3">Calificación de operación</option>
					<option value="4">Calificación de desempeño</option>
				</select>	
			</div>
			
			<br><br>

        	<div class="col-12" align="center">
				<br><br>
        		<button type="submit" class="btn btn-primary btn-lg">Cotizar</button>
        	</div>
		</div>

		</form>
		<br>
	</div>

	</div>


						
               <?php }else if($_POST['opcion']==3){?>

						
<div class="container">
<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

         <main role="main" class="container">
	<div class="form-register">		
		

		<form action="precio_mantenimiento.php" method="post" class="bg-white shadow p-5 rounded-lg">
		<h4 class="pb-3" style="color:#0c62bf">Cotizador de mantenimiento</h4>

		
		<div class="form-row">
				<div class=" col-md-4">
				<label for="servicio">Equipo</label>
                    <label for="servicios"> </label>                    
                    <select name="busqueda" id="busqueda" class="notItemOne">  
                        <option value="">- Selecciona -</option>               
                        <?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM serviciosmantenimiento");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                            $servicio = $data_servicio['id_servicioM'];
                            $servicio1 = $data_servicio['servicio'];
                            echo '<option value="'.$servicio.'">'.$servicio1.'</option>';                    
                        }
                        ?>
                    </select>  
                </div>

				
			

        </div>
	           <br><br>
			
            <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Cotizar</button>
			
            </div>

		</form>
		
		<br>
		
	</div>

	
	
               <?php }?>
              <br>
			
	
		<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		

	</body>
	</html>

	<script type="text/javascript" >
	
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();
		recargarListaUM();
		recargarListaUM2();

		$('#lista1').change(function(){
			recargarLista();
			recargarListaUM();
			recargarListaUM2();
		});
	})
</script>

<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarLista(){
		
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"instrumento=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarListaUM(){
		
		$.ajax({
			type:"POST",
			url:"datosUM.php",
			data:"unidadmin=" + $('#lista1').val(),
			success:function(r){
				$('#select4lista').html(r);
			}
		});
	}
</script>

<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarListaUM2(){
		
		$.ajax({
			type:"POST",
			url:"datosUM2.php",
			data:"unidadmax=" + $('#lista1').val(),
			success:function(r){
				$('#select5lista').html(r);
			}
		});
	}
</script>

<script type="text/javascript" >
	
	$(document).ready(function(){
		$('#lista2').val(1);
		recargarLista2();

		$('#lista2').change(function(){
			recargarLista2();
		});
	})
</script>

<script type="text/javascript" http-equiv="content-type" content="text/html; charset=iso8859-1">

	function recargarLista2(){
		
		$.ajax({
			type:"POST",
			url:"datos_coti_serv.php",
			data:"servicio=" + $('#lista2').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
<?php } ?>
