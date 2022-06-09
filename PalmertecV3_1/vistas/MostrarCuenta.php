<?php 
session_start();
if($_SESSION['rol'] != "cliente"){	
	@session_start();
	session_destroy();
	header("Location:../Index.php");
}?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Proveedores-Palmertec</title>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="../lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="css/fontello/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
<body>

    <header style="background-color:#f1eeee ">
    <nav class="navbar  navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
    <div class="container">
    <div align="left">
    <img src="../img/palmertec.png" />
    </div>
    <input type="checkbox" id="btn-menu"/>
    <label class="icon-menu"for="btn-menu"></label>
    <nav class="menu">
    <ul>
    
    </ul>
    </nav>
    </div>
    </nav>
    </header>

   
    
    <center> 
    <form method="post" class="bg-white  shadow p-5 rounded-lg" action="../controladores/pedido_realizadop.php" enctype="multipart/form-data">
    <h4 class="pb-3" style="color:#0c62bf">Pago por transferencia</h4>
    <div class="form-row">
    <div class="form-group col-md-4">
    <div><h4></h4></div>
    </div>
    <div class="form-group col-md-4">
    
    <div><h4>Cuenta Bancaria </h4>
    <li>PALMERTEC SAS DE C.V.</li>
    <li>Banco: Santander</li>Banco: Santander
    <li>Número de cuenta: 65-50721914-9</li>
    <li>Sucursal: 5808</li>
    <li>Clave: 014180655072191499</li></div>
    </div>
    <div class="form-group col-md-12">


    <table>
    
    <tr>
   
    
    </tr>
   
    <tr>
    <tr><br>
    
    </tr><center><td><input type="submit" value="subir" class="btn btn-primary" name="subir"></td></center>
    </tr>
    </table>
    
    <?php
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
                'items_laboratorio'    => $_POST['laboratorio'],
                'items_puntos_calibrar'=> $_POST['puntos_calibrar'],
                'items_puntosext'      => $_POST['puntosext'],
                'items_identificador'  => $_POST['identificador'],
                'items_fecha_calibracion' => $_POST['fecha_calibracion'],
                'items_subtotalcotizacion'=> $_POST['subtotalcotizacion'],
             

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
                'items_laboratorio'    => $_POST['laboratorio'],
                'items_puntos_calibrar'=> $_POST['puntos_calibrar'],
                'items_puntosext'      => $_POST['puntosext'],
                'items_identificador'  => $_POST['identificador'],
                'items_fecha_calibracion' => $_POST['fecha_calibracion'],
                 
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
                'items_laboratorio'    => $_POST['laboratorio'],
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
                'items_laboratorio'    => $_POST['laboratorio'],
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



?>

<?php
            if(!empty($_SESSION['add_carro']))
            {
                $total = 0;
                foreach ($_SESSION['add_carro'] AS $key => $value)
                {
                 ?>
                    <tbody align="center">
            <tr>


                <td><?php  $instrumento = utf8_decode($value['items_instrumento']);?></td>
                <td><?php  $marca = utf8_decode($value['items_marca']);?></td>
                <td><?php  $modelo = utf8_decode($value['items_modelo']);?></td>
                <td><?php  $laboratorio = utf8_decode($value['items_laboratorio']);?></td>
                <td><?php  $puntos_cali = $value['items_puntos_calibrar'];?></td>
                <td><?php  $puntos_adic = $value['items_puntosext'];?></td>
                <td><?php  $identificador = utf8_decode($value['items_identificador']);?></td>
                <td><?php  $fecha_calibracion = $value['items_fecha_calibracion'];?></td>
                <td><?php  $fecha_subtotalcotizacion = $value['items_subtotalcotizacion'];?></td>
               
                 
                <?php } ?>  
                <?php } ?>



            <?php             

            if(!empty($_SESSION['add_carro2']))
            {
                $total = 0;
                foreach ($_SESSION['add_carro2'] AS $key => $value)
                {
                 ?>
                    <tbody align="center">
            <tr>
            
                <td><?php  $equipo = utf8_decode($value['items_equipo']);?></td>
                <td><?php  $servicio = utf8_decode($value['items_servicio']);?></td>
                <td><?php  $laboratorio = utf8_decode($value['items_laboratorio']);?></td>
                <td><?php  $fecha_servicio = $value['items_fecha_servicio'];?></td>
                <td><?php  $marca = $value['items_marca'];?></td>
                <td><?php  $modelo = utf8_decode($value['items_modelo']);?></td>
                <td><?php  $identificador = $value['items_identificador'];?></td>
                <td><?php  $ciclos = $value['items_ciclos'];?></td>
                <td><?php  $fecha_subtotalcotizacionservicio = $value['items_subtotalcotizacionservicio'];?></td>
               
                <?php } ?>  
                <?php } ?>



    
                <input type="hidden" name="CotizaN" class="form-control" value="PAL-20-001" id="CotizaN" />
            


            <div class="pull-right"><input class="btn btn-secondary" type="button" value="Atrás" onClick="history.go(-1);"></div>
    </center>
            
    </div></div>
            </form>  

    </footer>
    <script src="/lib/jquery/dist/jquery.js"></script>
    <script src="/lib/jquery/dist/jquery.min.js"></script>
    <script src="/lib/bootstrap/dist/js/bootstrap.js"></script>
    <script src="/js/site.js?v=xLg3OBNLN5axpvxHCX-BMlgT_JPLXBVRSmlvwHdncrI"></script>
    <script src="/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/37fd38107f.js" crossorigin="anonymous"></script>
    
    
</body>
</html>

  