<?php 
session_start();
require("conexion.php");
$conexion = conectar();
error_reporting (0);

if(isset($_POST['agregar']))
{
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
        }else
            {
                echo '<script>alert("El servicio ya existe!");</script>';
            }
    }
    else
        {
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
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['items_identificador'] == $_GET['identificador'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El servicio Fue Eliminado!");</script>';
                 echo '<script>window.location="datos_registrados.php";</script>';
             
            }
        }
    }
}


if(isset($_POST['agregar']))
{


    if (isset($_SESSION['add_carro2'])) {
        $item_array_id_cart = array_column($_SESSION['add_carro2'], 'items_identificador');
        if (!in_array($_POST['identificador'], $item_array_id_cart)) {
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
        }else
            {
                echo '<script>alert("El servicio ya existe!");</script>';
            }
    }
    else
        {
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
if(isset($_GET['action']))
{
    if($_GET['action']=='delete'){
        foreach ($_SESSION['add_carro2'] AS $key => $value){
            if($value['items_identificador'] == $_GET['identificador']){
            unset($_SESSION['add_carro2'][$key]);
            echo '<script>alert("El servicio Fue Eliminado!");</script>';
            echo '<script>window.location="datos_registrados.php";</script>';
            }
        }
    }
}




if(isset($_POST['agregar']))
{


    if (isset($_SESSION['add_carro3'])) {
        $item_array_id_cart = array_column($_SESSION['add_carro3'], 'items_identificadorm');
        if (!in_array($_POST['identificadorm'], $item_array_id_cart)) {
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
        }else
            {
                echo '<script>alert("El servicio ya existe!");</script>';
            }
    }
    else
        {
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
if(isset($_GET['action']))
{
    if($_GET['action']=='delete'){
        foreach ($_SESSION['add_carro3'] AS $key => $value){
            if($value['items_identificadorm'] == $_GET['identificadorm']){
            unset($_SESSION['add_carro3'][$key]);
            echo '<script>alert("El servicio Fue Eliminado!");</script>';
            echo '<script>window.location="datos_registrados.php";</script>';
            }
        }
    }
}




?>




<?php
if(!empty($_SESSION['add_carro']))
{
 
 foreach ($_SESSION['add_carro'] AS $key => $value)
 {
     ?>
     <tbody align="center">
<tr>
    <td><?php  $instrumento = ($value['items_instrumento']);?></td>
    <td><?php  $marca = ($value['items_marca']);?></td>
    <td><?php  $modelo = ($value['items_modelo']);?></td>
    <td><?php  $identificador = ($value['items_identificador']);?></td>
    <td><?php  $puntos_cali = $value['items_puntos_calibrar'];?></td>
    <td><?php  $puntos_adic = $value['items_puntosext'];?></td>
    <td><?php  $subtotalcotizacion = $value['items_subtotalcotizacion'];?></td>
    <td><?php  $fecha_calibracion = $value['items_fecha_calibracion'];?></td>
    <td><?php  $extra = $value['items_extra'];?></td>
    <td><?php  $Comentarios = $value['items_Comentarios'];?></td>
</tr>

<?php
      $total+=(int)$subtotalcotizacion;
      $CotizaN = mysqli_real_escape_string($conexion, $_POST['CotizaN']);
      $id_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
      $sql=mysqli_query($conexion, "INSERT INTO pedidocalibracion VALUES ('',$id_usuario, '$instrumento','$marca',
'$modelo', '$identificador', '$puntos_cali', '$puntos_adic', '$subtotalcotizacion','$fecha_calibracion','En proceso',now(),'$CotizaN','$extra','$Comentarios')");  
     if($sql){
        echo ' <script language="javascript">alert("Cotización agregada");</script> ';
        echo "<script>location.href='../vistas/Orden.php'</script>";		
    
    }else{
        echo ' <script language="javascript">alert("Error, no se pudo registrar la cotización, intente más tarde");</script> ';
        
    }
 }}
?>





<?php
if(!empty($_SESSION['add_carro2']))
{
 
 foreach ($_SESSION['add_carro2'] AS $key => $value)
 {
     ?>
     <tbody align="center">
<tr>
    <td><?php  $equipo = ($value['items_equipo']);?></td>
    <td><?php  $marca = $value['items_marca'];?></td>
    <td><?php  $modelo = ($value['items_modelo']);?></td>
    <td><?php  $identificador = $value['items_identificador'];?></td>
    <td><?php  $servicio = ($value['items_servicio']);?></td>
    <td><?php  $ciclos = $value['items_ciclos'];?></td>
    <td><?php  $subtotalcotizacionservicio = $value['items_subtotalcotizacionservicio'];?></td>
    <td><?php  $fecha_servicio = $value['items_fecha_servicio'];?></td>
   
</tr>

<?php
$total1+=(int)$subtotalcotizacionservicio;
     $CotizaN = mysqli_real_escape_string($conexion, $_POST['CotizaN']);
   $id_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
   $sql=mysqli_query($conexion, "INSERT INTO pedidoservicio VALUES ('',$id_usuario, '$equipo','$marca',
'$modelo', '$identificador', '$servicio', '$ciclos', '$subtotalcotizacionservicio','En proceso',now(),'$fecha_servicio','$CotizaN')");  
  if($sql){
     echo ' <script language="javascript">alert("Cotización agregada");</script> ';
     echo "<script>location.href='../vistas/Orden.php'</script>";	
 
    }else{
        echo ' <script language="javascript">alert("Error, no se pudo registrar la cotización, intente más tarde");</script> ';
        
    }
 }}
?>



<?php
if(!empty($_SESSION['add_carro3']))
{
 
 foreach ($_SESSION['add_carro3'] AS $key => $value)
 {
     ?>
     <tbody align="center">
<tr>
    <td><?php  $equipom = ($value['items_equipom']);?></td>
    <td><?php  $marcam = $value['items_marcam'];?></td>
    <td><?php  $modelom = ($value['items_modelom']);?></td>
    <td><?php  $identificadorm = $value['items_identificadorm'];?></td>
    <td><?php  $serviciom = $value['items_serviciom'];?></td>
    <td><?php  $subtotalcotizacionserviciom = $value['items_subtotalcotizacionserviciom'];?></td>
    <td><?php  $fecha_serviciom = $value['items_fecha_serviciom'];?></td>
   
</tr>

<?php
$totalm+=(int)$subtotalcotizacionserviciom;
     $CotizaN = mysqli_real_escape_string($conexion, $_POST['CotizaN']);
   $id_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
   $sql=mysqli_query($conexion, "INSERT INTO pedidomantenimiento VALUES ('',$id_usuario, '$equipom','$marcam',
'$modelom', '$identificadorm', '$serviciom', '$subtotalcotizacionserviciom','En proceso',now(),'$fecha_serviciom','$CotizaN')");  
  if($sql){
     echo ' <script language="javascript">alert("Pedido agregado");</script> ';
     echo "<script>location.href='../vistas/Orden.php'</script>";	
 
    }else{
        echo ' <script language="javascript">alert("Error, no se pudo registrar la cotización, intente más tarde");</script> ';
        
    }
 }}
?>






<?php  if(!empty($_SESSION['add_carro']) or !empty($_SESSION['add_carro2']) or !empty($_SESSION['add_carro3']))
            {  ?>

<?php  
   $id_usuario = mysqli_real_escape_string($conexion, $_SESSION['cve_usuario']);
    $CotizaN = mysqli_real_escape_string($conexion, $_POST['CotizaN']);
   $serv = mysqli_real_escape_string($conexion, $_POST['serv1']);
   $Comentarios = mysqli_real_escape_string($conexion, $_POST['Comentarios']);
   $finall = (int)$total+ (int)$total1+ (int)$totalm+ (int)$serv;
   $iva = $finall * 0.16;
   $final = $finall + $iva; 
   
   $sql=mysqli_query($conexion, "INSERT INTO detallepedido VALUES ('',$id_usuario, $serv,$finall,$iva ,$final,'$CotizaN','En proceso','$Comentarios')");   
 
   echo ' <script language="javascript">alert("Cotización agregada");</script> ';
   echo "<script>location.href='../vistas/Orden.php'</script>";	
   ?>


 <?php }?>


 