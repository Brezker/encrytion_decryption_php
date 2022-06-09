<?php 
session_start();
if(@$_SESSION['rol'] != "proveedor"){	
	@session_start();
	session_destroy();
    //Hola
	header("Location:../Index.php");
}else{
	?>


	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cotizador</title>
		<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
      

	<!-- Muestra el nombre del usuario	-->
		<?php include("includes/head.php"); ?>
		<main class="main">
		<?php       
$cve_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);  ?>
				<h1>Bienvenido <?php echo $_SESSION['nombre']?></h1>
				<div class="d-flex justify-content-center text-center" >

				</div>

				<div align="center">
                    </br>
                    <h2>Selecciona una opción</h2>
				</div>
<!--Botones  -->
		<main class="main">
	
        </br>

		<div class="row col align-self-center mx-auto">
		
		  <div class="col-sm-4 card bg-light text-white card text-center card card border-light mb-3">
  			<img class="card-img img-fluid" src="../img/calibraIMG.jpg" alt="Card image">
  			<div class="card-img-overlay align-self-center mr-3">
			  <div class="row align-items-center h-100 justify-content-center"> 
					<div class="col-auto">
					<a href="listar_costo_calibracion.php">
                        <input type="button" value="Calibraci&oacute;n" class="btn btn-outline-light btn-lg">
                    </a>
			  		</div> 
				</div>
  			</div>
		  </div> 

		  <div class="col-sm-4 card bg-light text-white card text-center card card border-light mb-3">
  			<img class="card-img img-fluid" src="../img/serviIMG.jpg" alt="Card image">
  			<div class="card-img-overlay align-self-center mr-3">
			  <div class="row align-items-center h-100 justify-content-center"> 
					<div class="col-auto">
					<a href="listar_costo_servicios.php">
                        <input type="button" value="Servicio" class="btn btn-outline-light btn-lg">
                    </a>
			  		</div> 
				</div>
  			</div>
		  </div>

		  <div class="col-sm-4 card bg-light text-white card text-center card card border-light mb-3">
  			<img class="card-img img-fluid" src="../img/mantenIMG.jpg" alt="Card image">
  			<div class="card-img-overlay align-self-center mr-3">
			  <div class="row align-items-center h-100 justify-content-center"> 
					<div class="col-auto">
					<a href="listar_costo_mantenimiento.php">
                        <input type="button" value="Mantenimiento" class="btn btn-outline-light btn-lg">
                    </a>
			  		</div> 
				</div>
  			</div>
		  </div>

		</div>
		

		</main>
   <!-- Modal Registrar-->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="form1">
						<div class="form-group">                                
						<input type="hidden" class="form-control" id="description" name="description" value="<?php echo $cve_usuario; ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                              <label for="file">Archivo</label>
                              <input type="file" class="form-control" id="file" name="file">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm1()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div align="center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Archivo de  Acreditaci&oacute;n
            </button>
        </div>
        <!-- End Modal Registrar-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
            function onSubmitForm1() {
                var frm = document.getElementById('form1');
                var data = new FormData(frm);
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        var msg = xhttp.responseText;
                        location.reload();                    

                        if (msg == 'success') {
                            alert(msg);
                            $('#exampleModal').modal('hide');
                        } else {
                            alert(msg);
                        }

                    }
                };
                xhttp.open("POST", "../controladores/subir_archivo_Acre.php", true);
                xhttp.send(data);
                $('#form1').trigger('reset');
            }
            function openModelPDF(url) {
                $('#modalPdf').modal('show');
                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/vistas/'; ?>'+url);
            }
        </script>
	

	</body>
	</html>
	<?php } ?>