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
        <title>Archivos pagos</title>
        <?php include "../scripts/scripts.php"; ?>
    </head>
    <body>
        <?php include("includes/head.php"); ?>
        <?php  

      
 $cve_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);

        $tmp = array();
        $res = array();

        $sel = mysqli_query($conexion, "SELECT * FROM archivo_informe WHERE cve_usuario = $cve_usuario");   
        if(is_null($sel)){

        }else{

            while ($row = mysqli_fetch_array($sel)) {
                $tmp = $row;
                array_push($res, $tmp);
            }
        }
        ?>

        <main class="main">
            <div class="container">
                <h1>Agregar archivo</h1>  
                <div class="row justify-content-md-center">
                    <div class="col-8">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Nuevo
                        </button>

                        <table class="table mt-2">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ver</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Eliminar archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $val) { ?>
                                    <tr>
                                        
                                        <td><?php echo $val['nombre'] ?></td>
                                        <td>
                                        <a href="<?php echo $val['url'] ?>"target="_blank">Ver archivo</a>
                                        <!--<button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver</button> -->                                           
                                        </td>
                                        <td><?php echo $val['estatus'] ?></td>
                                        <td>
                                        <a href="eliminar_archivoProveedor.php?cve_archivo_informe=<?php echo $val['cve_archivo_informe']; ?>"><i class="fas fa-file-pdf" ></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
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
                                <label for="title">Titulo (Cotizacion. No)</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Ejem. PAL-21-001">
                            </div>
                            <div class="form-group">                                
                                <input type="hidden" class="form-control" id="description" name="description" value="<?php echo $cve_usuario; ?>">
                            </div> 
                              <label for="description">archivo</label>
                              
                            <input type="file" class="form-control" id="file" name="file">
                        
                            <div class="form-group">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="onSubmitForm()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Registrar-->

        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            function onSubmitForm() {
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
                xhttp.open("POST", "../controladores/subir_archivo2.php", true);
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