<?php 
session_start();
if($_SESSION['rol'] != "proveedor"){	
	@session_start();
	session_destroy();
	header("Location:../Index.php");
}else{?>
<?php error_reporting (0);?>
<?php

if (
    isset($_POST['instrumento'])
    && isset($_POST['marca'])
    && isset($_POST['modelo'])  
    && isset($_POST['puntos_calibrar'])
    && isset($_POST['puntosext'])
    && isset($_POST['identificador'])
    && isset($_POST['fecha_calibracion'])
    && isset($_POST['subtotalcotizacion'])
    && isset($_POST['extra'])
    && isset($_POST['Comentarios'])
   
) {
    if (isset($_SESSION['add_carro'])) {
        $item_array_id_cart = array_column($_SESSION['add_carro'], 'items_identificador');
        if (!in_array($_POST['identificador'], $item_array_id_cart)) {
            $count = count($_SESSION['add_carro']);
            $item_array = array(
                'items_instrumento'    => $_POST['instrumento'],
                'items_marca'          => $_POST['marca'],
                'items_modelo'         => $_POST['modelo'],
                'items_puntos_calibrar'=> $_POST['puntos_calibrar'],
                'items_puntosext'      => $_POST['puntosext'],
                'items_identificador'  => $_POST['identificador'],
                'items_fecha_calibracion' => $_POST['fecha_calibracion'],
                'items_subtotalcotizacion'=> $_POST['subtotalcotizacion'],
                'items_extra' => $_POST['extra'],
                'items_Comentarios'=> $_POST['Comentarios'],

            );

            $_SESSION['add_carro'][$count] = $item_array;
            echo '<script>alert("Servicio agregado!");</script>';
            echo '<script>window.location="datos_registrados.php";</script>';
        } else {
            echo '<script>alert("El servicio ya existe!");</script>';

            echo "<script>location.href='../vistas/datos_registrados.php'</script>";
        }

    } else {
        $item_array = array(
                'items_instrumento'    => $_POST['instrumento'],
                'items_marca'          => $_POST['marca'],
                'items_modelo'         => $_POST['modelo'],
                'items_puntos_calibrar'=> $_POST['puntos_calibrar'],
                'items_puntosext'      => $_POST['puntosext'],
                'items_identificador'  => $_POST['identificador'],
                'items_fecha_calibracion' => $_POST['fecha_calibracion'],
                'items_subtotalcotizacion'=> $_POST['subtotalcotizacion'],
                'items_extra' => $_POST['extra'],
                'items_Comentarios'=> $_POST['Comentarios'],
        );

        $_SESSION['add_carro'][0] = $item_array;
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
    foreach ($_SESSION['add_carro'] as $key => $value) {
    if ($value['items_identificador'] == $_GET['identificador']) {
    unset($_SESSION['add_carro'][$key]);
    echo '<script>alert("El servicio Fue Eliminado!");</script>';
    }
    }
    }
}
if (
    isset($_POST['equipo'])
    && isset($_POST['servicio'])
    && isset($_POST['fecha_servicio'])
    && isset($_POST['marca'])
    && isset($_POST['modelo'])
    && isset($_POST['identificador'])
    && isset($_POST['ciclos'])
    && isset($_POST['subtotalcotizacionservicio'])
) {
    if (isset($_SESSION['add_carro2'])) {
        $item_array_id_cart = array_column($_SESSION['add_carro2'], 'items_identificador');
       
            $count = count($_SESSION['add_carro2']);
            $item_array = array(
                'items_equipo'         => $_POST['equipo'],
                'items_servicio'       => $_POST['servicio'],
                'items_fecha_servicio' => $_POST['fecha_servicio'],
                'items_marca'          => $_POST['marca'],
                'items_modelo'         => $_POST['modelo'],
                'items_identificador'  => $_POST['identificador'],
                'items_ciclos'         => $_POST['ciclos'],
                'items_subtotalcotizacionservicio' => $_POST['subtotalcotizacionservicio'],
                
            );

            $_SESSION['add_carro2'][$count] = $item_array;
            echo '<script>alert("Servicio agregado!");</script>';
            echo '<script>window.location="datos_registrados.php";</script>';
       
    } else {
        $item_array = array(
            'items_equipo'         => $_POST['equipo'],
            'items_servicio'       => $_POST['servicio'],
            'items_fecha_servicio' => $_POST['fecha_servicio'],
            'items_marca'          => $_POST['marca'],
            'items_modelo'         => $_POST['modelo'],
            'items_identificador'  => $_POST['identificador'],
            'items_ciclos'         => $_POST['ciclos'],
            'items_subtotalcotizacionservicio' => $_POST['subtotalcotizacionservicio'],
        );

        $_SESSION['add_carro2'][0] = $item_array;
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
    foreach ($_SESSION['add_carro2'] as $key => $value) {
    if ($value['items_identificador'] == $_GET['identificador']) {
    unset($_SESSION['add_carro2'][$key]);
    echo '<script>alert("El servicio Fue Eliminado!");</script>';
    }
    }
    }
}



if (
    isset($_POST['equipom'])
    && isset($_POST['serviciom'])
    && isset($_POST['fecha_serviciom'])
    && isset($_POST['marcam'])
    && isset($_POST['modelom'])
    && isset($_POST['identificadorm'])
    && isset($_POST['subtotalcotizacionserviciom'])
) {
    if (isset($_SESSION['add_carro3'])) {
        $item_array_id_cart = array_column($_SESSION['add_carro3'], 'items_identificadorm');
       
            $count = count($_SESSION['add_carro3']);
            $item_array = array(
                'items_equipom'         => $_POST['equipom'],
                'items_serviciom'       => $_POST['serviciom'],
                'items_fecha_serviciom' => $_POST['fecha_serviciom'],
                'items_marcam'          => $_POST['marcam'],
                'items_modelom'         => $_POST['modelom'],
                'items_identificadorm'  => $_POST['identificadorm'],
                'items_subtotalcotizacionserviciom' => $_POST['subtotalcotizacionserviciom'],
                
            );

            $_SESSION['add_carro3'][$count] = $item_array;
            echo '<script>alert("Servicio agregado!");</script>';
            echo '<script>window.location="datos_registrados.php";</script>';
       
    } else {
        $item_array = array(
            'items_equipom'         => $_POST['equipom'],
            'items_serviciom'       => $_POST['serviciom'],
            'items_fecha_serviciom' => $_POST['fecha_serviciom'],
            'items_marcam'          => $_POST['marcam'],
            'items_modelom'         => $_POST['modelom'],
            'items_identificadorm'  => $_POST['identificadorm'],
            'items_subtotalcotizacionserviciom' => $_POST['subtotalcotizacionserviciom'],
        );

        $_SESSION['add_carro3'][0] = $item_array;
    }
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
    foreach ($_SESSION['add_carro3'] as $key => $value) {
    if ($value['items_identificadorm'] == $_GET['identificadorm']) {
    unset($_SESSION['add_carro3'][$key]);
    echo '<script>alert("El servicio Fue Eliminado!");</script>';
    }
    }
    }
}




?>



<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include "../scripts/scripts.php"; ?>
	</head>
	<body>
	
		<?php include("includes/head.php"); ?>
		<main class="main">
		<div class="container">


        <div id="home-box">
        <div class="content">

           <section id="contact" class="contact-area ptb-120 bg-gray-dark">
            <div class="container">
            <div class="row m-0">
            <div class="col-lg-7 col-md-12 p-0">
            <div class="form">
           
            <?php 
            $fechaActual = date('Y-m-d');
            $id_cliente = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
            $sql = mysqli_query($conexion ,"SELECT * from usuarios  WHERE cve_usuario=$id_cliente");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("datos_registrados.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$nombre = $data3[1];
                        $correoc = $data3[2];
                        $app = $data3[6];
                        $apm = $data3[7];
					}
				}

                $sql = mysqli_query($conexion ,"SELECT * from clientes  WHERE cve_usuario=$id_cliente");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("datos_registrados.php");
				}else{
					while ($data3 = mysqli_fetch_array($sql)) {
						$cve_cliente = $data3[0];
                        $empresa = $data3[1];
                        $razons = $data3[2];
                        $domicilio = $data3[3];
					}
				}
                $id_cliente = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
                $sql = mysqli_query($conexion ,"SELECT recoleccion, Cotizacion_no,Comentarios
                FROM detallepedido
                WHERE id_detallepedido = (SELECT MAX( id_detallepedido )FROM detallepedido WHERE cve_usuario=$id_cliente)");
				$result = mysqli_num_rows($sql);
				if($result == 0){
					header("datos_registrados.php");
				}else{
					while ($data4 = mysqli_fetch_array($sql)) {
						$recoleccion= $data4[0];
                        $numerocotizacion = $data4[1];
                        $Comentarios = $data4[2];
                       
					}
				}


                ?>

         
            </div>
            </div>
            </div>
           </section>
 
     
    <div style="clear:both"></div>
    <br/>
    <h3>Detalle de la Orden</h3>  
    <td colspan="3" align="right"><strong>Cotización No.</strong></td>
    
    <strong   style="color:red;"><?php echo $numerocotizacion?></strong>
    </div>
    </div>
	<br>		


       <h5> Calibraciones:</h5>
        <table class='table table-striped table-sm table-responsive-sm'>
        <thead style='color: blue' background='gray' align="center">
            <tr align="center">
              
            <th>Instrumento</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Identificador</th>
            <th>Puntos a calibrar</th>
            <th>Punto adicional</th>
            <th>Otros</th>
            <th>Comentarios</th>
            <th>Fecha del servicio</th>
            <th>Costo calibracion</th>
            </tr>

            <?php
            if(!empty($_SESSION['add_carro']))
            {
            
                  $total = 0;
                foreach ($_SESSION['add_carro'] AS $key => $value)
                {
                 ?>
                 
            
                <tbody align="center">
                <tr>
                <td><?php echo $value['items_instrumento'];?></td>
                <td><?php echo $value['items_marca'];?></td>
                <td><?php echo $value['items_modelo'];?></td>
                <td><?php echo $value['items_identificador'];?></td>
                <td><?php echo $value['items_puntos_calibrar'];?></td>
                <td><?php echo $value['items_puntosext'];?></td>
                <td><?php echo $value['items_extra'];?></td>
               <td><?php echo $value['items_Comentarios'];?></td>
               <td><?php echo $value['items_fecha_calibracion'];?></td>
                <td>$<?php echo number_format($value['items_subtotalcotizacion'],2);?></td>
              
            </tr>
           <?php

$var = $value['items_subtotalcotizacion'];
$valorToTal = floatval($var);
$total1 +=$valorToTal ;
                }
           ?>
         
         <tr>
                <td colspan="3" align="right"><strong>Total calibracion:</strong></td>
                <td><strong style="color:red;">$<?php echo number_format($total1,2)?></strong></td>
                <td></td>
        </tr>
        <?php

            }else{
        ?>
                <tr>
                    <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
                </tr>
            <?php
        }
           ?>
         </table>
         <h5> Servicios:</h5>
        <table class='table table-striped table-sm table-responsive-sm'>
        <thead style='color: blue' background='gray' align="center">
            <tr align="center">
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Identificador</th>
            <th>Servicio</th>
            <th>ciclos</th>
            <th>Fecha del servicio</th>
            <th>Costo servicio</th>
            </tr>

            <?php
            if(!empty($_SESSION['add_carro2']))
            {
            
                  $total = 0;
                foreach ($_SESSION['add_carro2'] AS $key => $value)
                {
                 ?>
              
                <tbody align="center">
                <tr>
                <td><?php echo $value['items_equipo'];?></td>
                <td><?php echo $value['items_marca'];?></td>
                <td><?php echo $value['items_modelo'];?></td>
                <td><?php echo $value['items_identificador'];?></td>
                <td><?php echo $value['items_servicio'];?></td>
                <td><?php echo $value['items_ciclos'];?></td>
                <td><?php echo $value['items_fecha_servicio'];?></td>
                <td>$<?php echo number_format($value['items_subtotalcotizacionservicio'],2);?></td>
               
            </tr>
          
               <?php
                $var2 = $value['items_subtotalcotizacionservicio'];
                $valorToTa2 = floatval($var2);
                $total2 +=$valorToTa2 ;
               }
               ?>
               
                <tr>
                
                <td colspan="3" align="right"><strong>Total servicios</strong></td>
                <td><strong style="color:red;">$<?php echo number_format($total2,2)?></strong></td>

               <td></td>
            </tr>

            <?php
                }else{

             ?>
        <tr>
        <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
        </tr>
        
       <?php

          }
         ?>


<!-- AQUI TERMINA-->

</table>

           
<h5> Mantenimiento:</h5>
        <table class='table table-striped table-sm table-responsive-sm'>
        <thead style='color: blue' background='gray' align="center">
            <tr align="center">
            
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Identificador</th>
            <th>Servicio</th>
            <th>Fecha del servicio</th>
            <th>Costo servicio</th>
            </tr>

            <?php
            if(!empty($_SESSION['add_carro3']))
            {
            
                  $total = 0;
                foreach ($_SESSION['add_carro3'] AS $key => $value)
                {
                 ?>
              
                <tbody align="center">
                <tr>
                <td><?php echo $value['items_equipom'];?></td>
                <td><?php echo $value['items_marcam'];?></td>
                <td><?php echo $value['items_modelom'];?></td>
                <td><?php echo $value['items_identificadorm'];?></td>
                <td><?php echo $value['items_serviciom'];?></td>
                <td><?php echo $value['items_fecha_serviciom'];?></td>
                <td>$<?php echo number_format($value['items_subtotalcotizacionserviciom'],2);?></td>
               
            </tr>
          
               <?php
                $var2m = $value['items_subtotalcotizacionserviciom'];
                $valorToTa2m = floatval($var2m);
                $total2m +=$valorToTa2m ;
               }
               ?>
               
                <tr>
                
                <td colspan="3" align="right"><strong>Total mantenimiento</strong></td>
                <td><strong style="color:red;">$<?php echo number_format($total2m,2)?></strong></td>

               <td></td>
            </tr>

            <?php
                }else{

             ?>
        <tr>
        <td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
        </tr>
        
       <?php

          }
         ?>


<!-- AQUI TERMINA-->

</table>


           <div class="form-group col-md-4">
               <label for="input" ><h6>Servicio de recolección</h6></label>
               <td><strong  style="color:red;">$<?php echo number_format($recoleccion,2)?></strong></td>
           </div>
           <div class="form-group col-md-4">
               
               <td><label for="input" ><h6>Comentarios:</h6></label></td>
               <td><?php echo $Comentarios?></td>
           </div>


<br>
<!-- CALCULA PRECIO FINAL -->
 <table class='table table-striped table-sm table-responsive-sm'>

<tr>
<?php  
$totalFinal  = $total1 + $total2 + $total2m;
(int)$totx=$totalFinal + (int)$recoleccion;
?>
<td colspan="3" align="right"><strong>Subtotal</strong></td>
<td><strong   style="color:red;">$<?php echo number_format($totalFinal,2)?></strong></td>
</tr>
<br>

<tr>
<td colspan="3" align="right"><strong>Total </strong></td>
<input type="hidden" name="tot" id="tot" readonly class="form-control" value="<?php echo$totalFinal?>"/>
<td><strong  style="color:red;">$<?php echo number_format($totx,2)?></strong></td>
</tr> 
<br>

<tr>
<?php 

$iva2 = $totx * 0.16;
$final2 = $totx + $iva2; 
?>
<td colspan="3" align="right"><strong>IVA 16.00%</strong></td>
<td><strong  style="color:red;">$<?php echo number_format($iva2,2)?></strong></td>
</tr> 
<br>
<tr>

<td colspan="3" align="right"><strong>Final</strong></td>
<td><strong  style="color:red;">$<?php echo number_format($final2,2)?></strong></td>
</tr> 
</table>
          
    <?php  if(!empty($_SESSION['add_carro']) or !empty($_SESSION['add_carro2']) or !empty($_SESSION['add_carro3']))
            {  ?>

           <form action="enviar.php" method="post" target="_blank">
           <input type="hidden" name="serv" id="serv" class="form-control" value="<?php echo$recoleccion ?>" />
           <input type="hidden" name="CotizaN" class="form-control" value="<?php echo$numerocotizacion ?>" id="CotizaN" />
            <div><button class="btn btn-primary" id="generar" type="submit" required>Generar reporte</button><small style="color:#FF0000;">*Obligatorio</small></div>
            </form>
<br>

 <?php }  ?>
</div>
       

    </center>
      
                   
    
                    </div>
                    </div>
                    </div>
                </div><br>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>

	</html>
	<?php } ?>
  