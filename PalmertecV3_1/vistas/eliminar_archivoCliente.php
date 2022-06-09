<?php 
session_start();
if($_SESSION['rol'] != "cliente"){    
    @session_start();
    session_destroy();
    header("Location:../Index.php");
}else{
    $Cotizacion_no = $_GET["Cotizacion_no"];    
    ?>


    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Archivos pago</title>
        <?php include "../scripts/scripts.php"; ?>
    </head>
    <body>
        <?php include("includes/head.php"); ?>
        <?php  
        if(!empty($_POST)){
            echo $Cotizacion_no = $_POST['Cotizacion_no'];          
            $sql_delete = mysqli_query($conexion, "DELETE FROM archivos  WHERE Cotizacion_no = '$Cotizacion_no'");
            if($sql_delete){
                echo '<script>window.history.go(-1)</script>';              
            }else{
                echo ' <script language="javascript">alert("Error al eliminar");</script> ';
            }
        }
        if(empty($Cotizacion_no)){
            header("Location:subir_archivopago.php");
        }
        $sql = mysqli_query($conexion, "SELECT * FROM archivos WHERE Cotizacion_no = '$Cotizacion_no'");
        $sql_row = mysqli_num_rows($sql);
        if($sql_row == 0){
          header("Location:subir_archivopago.php");
      }else{
        while($data = mysqli_fetch_array($sql)){
            $idArchivo = $data['cve_archivo'];
            $Cotizacion_no = $data['Cotizacion_no'];
            $nombre = $data['nombre'];
            $url = $data['url'];


        }
    }
    ?>

    <main class="main">
        <div class="container">
            <h1>Eliminar archivo</h1>  
            <div class="form-register">     
                <div class="data-delete">
                    <h2>¿Está seguro que quiere eliminar este registro?</h2>
                    <p>Nombre: <span><?php echo $nombre; ?></span></p>
                   <!-- <p>Archivo: <span><button onclick="openModelPDF('<?php echo $url; ?>')" class="btn btn-primary" type="button">Ver</button></span></p>-->
                   <a href="<?php echo $url;?>" target="_blank">Ver archivo</a>
                                        
                    <form action="" method="post">
                        <input type="hidden" name="Cotizacion_no" value="<?php echo $Cotizacion_no; ?>">
                        <a class="btn_cancel" href="agregararchivo.php?Cotizacion_no=<?php echo $Cotizacion_no ?>">Cancelar</a>
                        <input class="btn_ok" type="submit" value="Aceptar">
                    </form>
                </div>
                <input class="btn btn-secondary" style="width: 100px; height: 40px; float: right;" type="button" value="Atrás" onClick="history.go(-1);"><br><br><br>
            </div>
        </div>
    </main>



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
            xhttp.open("POST", "../controladores/subir_archivo.php", true);
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