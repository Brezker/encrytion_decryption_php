
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
		<title>Registrar costos</title>
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
		<main class="main">
			<div class="container">
				<h1>Registrar costos de Calibraci&oacute;n</h1>	
				
				
				<div class="form-register">					
					<form action="../controladores/actualizar_instrumento_proveedorNc.php" method="POST" class="bg-white shadow p-5 rounded-lg">
					
			
					<input type="hidden" name="idLab" id="idLab" value="<?php echo $Cve_laboratorio;?>">

					<div class="row">
						<div class="col-md-2">
							<label >Acreditaci&oacute;n </label>
			                <select id="acreditacion" name="acreditacion"  required>
							<option value='0' selected>-Seleccione-</option>
							<option value="EMA">EMA</option>
							<option value="ILAC">ILAC</option>
							<option value="TRAZABILIDAD">TRAZABILIDAD</option>
							</select>
						</div>

						<div class="col-md-2">
							  <label for="magnitud">Magnitud </label>
			                <select id="lista1" name="lista1"  required>
							<option value='0' >-Seleccione-</option>
							<option value="1">Temperatura</option>
							<option value="2">Masa</option>
							<option value="3">Presión</option>
							<option value="4">Volumen</option>
							<option value="5">Humedad</option>
							<option value="6">Dimensional</option>
							<option value="7">Tiempo</option>
							<option value="8">Eléctrica</option>
							<option value="9">Fuerza</option>
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
						
						<div class="col-md-2">
	                    <div id="clase" style="display: none;">
	                        <label for="extra">Clase</label>
			                <select id="extra" name="extra">
							<option value='0' >-Seleccione-</option>
							<option value="CLASE F1">CLASE F1</option>
							<option value="CLASE F2">CLASE F2</option>
							<option value="CLASE M1">CLASE M1</option>
							<option value="CLASE M2">CLASE M2</option>
		    				</select>
                        </div>
                       
                       
                        </div>
                        
                        
                        
                        
						</div>
						<br><br>
					
					 <div class="row">	

					 <div class="col-md-2">
							  <label for="puntos">Puntos </label>
			                <select id="puntos" name="puntos"  required class="form-control" >
							<option value="0">-Seleccione-</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="9">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
		    				</select>
						</div>

						
						

					 <div class="col-md-2">
								<label for="alcanceMinimo">Alcance minimo</label>
								<input type="number" step="any"  class="form-control" name="alcanceMinimo" id="alcanceMinimo" placeholder="" required>
							</div>
							

                        <div class="col-md-2">
						<label for="alcanceMinimo">Unidad de medida</label>
						<select name="unidadmin" id="unidadmin" class="form-control"  required>  
                        <option value=""></option>               
                        <?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM unidad_medidad");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                            $servicio = $data_servicio['unidadMedida'];

                            echo '<option value="'.$servicio.'">'.$servicio.'</option>';                    
                        }
                        ?>
                        </select> 
						</div>


							<div class="col-md-2">
					    		<label for="alcanceMaximo">Alcance Maximo</label>
								<input type="number" step="any" class="form-control" name="alcanceMaximo" id="alcanceMaximo" placeholder="" required>
							</div>

                            <div class="col-md-2">
						<label for="unidadmax">Unidad de medida</label>
						<select name="unidadmax" id="unidadmax" class="form-control"  required>  
                        <option value=""></option>               
                        <?php 
                        $sql_servicio = mysqli_query($conexion, "SELECT * FROM unidad_medidad");                    
                        while ($data_servicio = mysqli_fetch_array($sql_servicio)) {
                            $servicio = $data_servicio['unidadMedida'];

                            echo '<option value="'.$servicio.'">'.$servicio.'</option>';                    
                        }
                        ?>
                        </select> 
						</div>
						</div>
                        <br><br>
						<?php 				
					//Recuperar datos
				if(empty($_GET['id'])){
					header("Location:listaLaboratoriosAdmN.php");
				}
				$idLab = $_GET['id'];
				$sql = mysqli_query($conexion, "SELECT * FROM costos_proveedor WHERE cve_costo_proveedor = $idLab ");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("Location:listaLaboratoriosAdmN.php");
				}else{
					while($data = mysqli_fetch_array($sql)){
					
						$costo1 = $data['costo'];
						$costo2 = $data['costoExtra'];
						$costo3 = $data['Comentarios'];
						$id = $data['cve_costo_proveedor'];
					}
				}
				
				?>
					  <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
				
						<div class="row">
							<div class="col-md-3">	
								<label for="costo">Costo:</label>
								<input type="text" class="form-control" name="costo" id="costo" placeholder="" value="<?php echo $costo1; ?>" required>	
							</div>	
							<div class="col-md-3">
								<label for="costoExtra">Costo adicional por punto:</label>
								<input type="text" class="form-control" name="costoExtra" id="costoExtra" placeholder=""value="<?php echo $costo2; ?>" required>	
								</div>


								<div class="form-group col-md-2">	
			            <label for="Comentarios">Comentarios</label>
                        <textarea id="Comentarios"  name="Comentarios" cols="25" rows="3" value="<?php echo $costo3; ?>" wrap="hard"></textarea>
			            
					</div>
						</div>
						<br>
					
					<div class="text-center">
              			<div class="col-12" align="center">
                        <button type="submit" value="Registrar"  class="btn btn-primary btn-lg">Registrar</button>
                        </div>  
        				</div>
						</div>
						<br><br>
						
					</form>
				</div>
				        <br>
				<input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
			</div>
		</main>
	


	</body>
	</html>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
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



	<?php } ?>