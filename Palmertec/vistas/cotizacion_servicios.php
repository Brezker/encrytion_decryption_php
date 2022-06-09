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
	<title>Cotización Servicios Diferentes</title>
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
<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

         <main role="main" class="container">
	<div class="form-register">		
		

		<form action="precio_servicios.php" method="post" class="bg-white shadow p-5 rounded-lg">
		<h4 class="pb-3" style="color:#0c62bf">Cotizador de servicios especificos</h4>

		
		<div class="form-row">
			<div class="col-md-4">
				<label for="magnitud">Servicios</label>
				<select name="lista2" id="lista2">
					<?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM todos_servicios");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
							echo '<option value="'. $data_servicio['id_servicio'].'">'. $data_servicio['servicio'].'</option>';                    
                        }
                	?>
				</select>
			</div>
			
			<div class="col-md-4" id="select3lista"></div>
			
			
			</div><br><br>
        	<div class="col-12" align="center">
				<br><br>
        		<button type="submit" class="btn btn-primary btn-lg">Cotizar</button>
        	</div>
		</div>

		</form>
		<br>
	</div>

	</div>

    </div>
              <br>
		

	</body>
	</html>


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
			url:"datos_coti_serv_dif.php",
			data:"servicio=" + $('#lista2').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
<?php } ?>
