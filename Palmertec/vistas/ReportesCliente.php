<?php 
session_start();
if($_SESSION['rol'] != "proveedor"){    
    @session_start();
    session_destroy();
    header("Location:../Index.php");
}else{
   $Cotizacion_no = $_REQUEST["Cotizacion_no"];  
   
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

        if(empty($Cotizacion_no)){
            header("Location:subir_archivopago.php");
        }
        $sql = mysqli_query($conexion, "SELECT * FROM archivo_informe WHERE nombre = '$Cotizacion_no' and estatus='Aprobado'");
        $sql_row = mysqli_num_rows($sql);
        if($sql_row == 0){
            header("Location:subir_archivopago.php");

        }

        $tmp = array();
        $res = array();

        $sel = mysqli_query($conexion, "SELECT * FROM archivo_informe WHERE nombre = '$Cotizacion_no' and estatus='Aprobado'");   
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $val) { ?>
                                    <tr>
                                        
                                        <td><?php echo $val['nombre'] ?></td>
                                        <td>
                                        <a href="<?php echo $val['url'] ?>" target="_blank">Ver archivo</a>                                        
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