<?php 
session_start();
if($_SESSION['rol'] != "administrador"){    
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
        <title>Reportes</title>
        <?php include "../scripts/scripts.php"; ?>
    </head>
    <body>
        <?php include("includes/head.php"); ?>
        <?php  

      
 $cve_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);

        $tmp = array();
        $res = array();

        $sel = mysqli_query($conexion, "SELECT * FROM archivo_informe ");   
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
                <h1>Reportes</h1>  
                <div class="row justify-content-md-center">
                    <div class="col-8">
                      

                        <table class="table mt-2">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ver</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Aprobar</th>
                                    <th scope="col">Rechazar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $val) { ?>
                                    <tr>
                                        
                                        <td><?php echo $val['nombre'] ?></td>
                                        <td>
                                        <a href="<?php echo $val['url'] ?>" target="_blank">Ver archivo</a>
                                        <!--<button onclick="openModelPDF('<?php echo $val['url'] ?>')" class="btn btn-primary" type="button">Ver</button> -->                                           
                                        </td>
                                        <td><?php echo $val['estatus'] ?></td>
                                        <td>
                                        <form  method="post"  action="../controladores/aprovar_reporte.php" >
                                        <input type="hidden" name="cve_archivo_informe" value="<?php echo $val['cve_archivo_informe']; ?>">
                                        <button  class="btn btn-lg" style="background-color:#3b9b27; width:50px; height:38px" >
                                        <i class="fa fa-check"></i>
                                        </button>
							            </form>
                                       </td>
                                       <td>
                                        <form  method="post"  action="../controladores/rechazar_reporte.php" >
                                        <input type="hidden" name="cve_archivo_informe" value="<?php echo $val['cve_archivo_informe']; ?>">
                                        <button  class="btn btn-lg" style="background-color:red; width:50px; height:38px" >
                                        <i class="fa fa-times"></i>
                                        </button>
							            </form>
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




     

        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
         

    </body>
    </html>

    <?php } ?>