<?php 
error_reporting (0);
session_start();
if($_SESSION['rol'] != "cliente"){	
	@session_start();
	session_destroy();
	header("Location:../Index.php");
}


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
                'items_subtotalcotizacion'=> $_POST['subtotalcotizacion'],
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



if(isset($_POST['agregar']))
{
    if (isset($_SESSION['add_carro3'])) {
       $count = count($_SESSION['add_carro3']);
       $item_array = array(
                'items_serv'         => $_POST['serv'],         
            );
$_SESSION['add_carro3'][$count] = $item_array;
        echo '<script>alert("Servicio agregado!");</script>';
        echo '<script>window.location="datos_registrados.php";</script>';
        }
    }
    else
        {
            $item_array = array(
                'items_serv'         => $_POST['serv'],
                
            );

            $_SESSION['add_carro3'][0] = $item_array;
}



if(isset($_POST['agregar']))
{
if (isset($_SESSION['add_DtosCliente'])) {
            $count = count($_SESSION['add_DtosCliente']);
            $item_array = array(
                'items_razons'         => $_POST['razons'],
                'items_domicilio'      => $_POST['domicilio'],
                'items_nombre'         => $_POST['nombre'],
                'items_correo'         => $_POST['correo'],
                'items_CotizaN'        => $_POST['CotizaN'],
                'items_fehcaped'        => $_POST['fehcaped'],
        );
 $_SESSION['add_DtosCliente'][$count] = $item_array;
        echo '<script>alert("Datos agregado!");</script>';
        echo '<script>window.location="datos_registrados.php";</script>';
        }  
    }
    else
        {
            $item_array = array(
                'items_razons'         => $_POST['razons'],
                'items_domicilio'      => $_POST['domicilio'],
                'items_nombre'         => $_POST['nombre'],
                'items_correo'         => $_POST['correo'],
                'items_CotizaN'        => $_POST['CotizaN'],
                'items_fehcaped'        => $_POST['fehcaped'],
            );

            $_SESSION['add_DtosCliente'][0] = $item_array;
        }

require('fpdf.php');

$pdf = new FPDF($orientation='L',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
// Agregamos los datos de la empresa
$pdf->Image('data:image/png;base64,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',10,3,30,0,'PNG');
$pdf->SetFont('Arial','',10);    
$pdf->setY(10);$pdf->setX(200);
$pdf->Cell(5,$textypos,"Cuenta BBVA bancomer");
$pdf->SetFont('Arial','',10);    
$pdf->setY(15);$pdf->setX(200);
$pdf->Cell(5,$textypos,"PALMERTEC SAS DE C.V");
$pdf->SetFont('Arial','',10);    
$pdf->setY(20);$pdf->setX(200);
$pdf->Cell(5,$textypos,"Cuenta clabe: 012180001168028695");
$pdf->setY(25);$pdf->setX(200);
$pdf->Cell(5,$textypos,utf8_decode('Número de cuenta: 0116802869'));
$pdf->setY(30);$pdf->setX(200);
$pdf->Cell(5,$textypos,"Dudas y aclaraciones:ventas@palmertec.mx");
$pdf->setY(35);$pdf->setX(200);
$pdf->Cell(5,$textypos,"Contacto.5568414743");



$pdf->setY(5);$pdf->setX(200);
$pdf->Ln();


if(!empty($_SESSION['add_DtosCliente']))
            {      
foreach ($_SESSION['add_DtosCliente'] AS $key => $value)
            {
//// Array cliente
$header = array("","");
$data3 = array(

array("Razon social:",utf8_decode($value['items_razons'])),
array("Direccion:",utf8_decode($value['items_domicilio'])),
array("Atencion a:",utf8_decode($value['items_nombre'])),
array("Correo:",utf8_decode($value['items_correo'])),
array(utf8_decode("Cotización No.:"),utf8_decode($value['items_CotizaN'])),
array("Fecha pedido:",utf8_decode($value['items_fehcaped'])),

);

$w = array(25);

foreach($data3 as $row1)
    {
    $pdf->setX(50);
    $pdf->Cell($w[0],6,$row1[0],0);
    $pdf->Cell($w[1],6,$row1[1],0);
    $pdf->Cell($w[2],6,$row1[2],0);
    $pdf->Cell($w[3],6,$row1[3],0);
    $pdf->Cell($w[4],6,$row1[4],0);
    $pdf->Cell($w[5],6,$row1[5],0);
     
     $pdf->Ln();
   }
  
            }}

            $pdf->Ln();

// Agregamos los datos del cliente

$fechaActual = date('d-m-Y');

$pdf->setY(45);$pdf->setX(138);
$pdf->Cell(5,$textypos,"");
$pdf->setY(50);$pdf->setX(138);
$pdf->Cell(5,$textypos,"");
 $pdf->Ln(); $pdf->Ln();

/// Apartir de aqui empezamos con la tabla de productos
$pdf->Cell(10,$textypos,utf8_decode("Cotización de calibraciones"));
$pdf->setY(60);$pdf->setX(135);
$pdf->Ln();
/////////////////////////////
//// Array de Cabecera

$header = array("Laboratorio","Instrumento","Marca","Modelo","Identificador","Puntos cali.","Puntos adi.",utf8_decode("Fecha calibración"),utf8_decode("Costo calibración"));

  $w = array(40,65,25,25,30,20,20,30,28);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;

 if(!empty($_SESSION['add_carro']))
            {      
foreach ($_SESSION['add_carro'] AS $key => $value)
            {
//// Arrar de Productos
$products = array(array(
utf8_decode($value['items_laboratorio']),
utf8_decode($value['items_instrumento']),
utf8_decode($value['items_marca']),
utf8_decode($value['items_modelo']),
utf8_decode($value['items_identificador']),
$value['items_puntos_calibrar'],
$value['items_puntosext'],
$value['items_fecha_calibracion'],
$value['items_subtotalcotizacion']),

);// Column widths
foreach($products as $row)
    {
    $pdf->Cell($w[0],6,$row[0],1);
    $pdf->Cell($w[1],6,$row[1],1);
    $pdf->Cell($w[2],6,$row[2],1);
    $pdf->Cell($w[3],6,$row[3],1);
    $pdf->Cell($w[4],6,$row[4],1);
    $pdf->Cell($w[5],6,$row[5],1);
    $pdf->Cell($w[6],6,$row[6],1);
    $pdf->Cell($w[7],6,$row[7],1);
    $pdf->Cell($w[8],6,"$ ".number_format($row[8],2,".",","),'1',0,'R');
                                                
    $pdf->Ln();
    $total+=$row[8];    
     }}
   }
   $pdf->Ln();
   $pdf->Cell(5,$textypos,"                                                                                                                                                                                                                                   Total de calibraciones: $ ". + $total);
   $pdf->Ln();

   $pdf->Ln();
   $pdf->Cell(10,$textypos,utf8_decode("Cotización de ervicios"));
   $pdf->Ln();

$header = array("Laboratorio","Equipo","Marca","Modelo","Identificador","Servicio","Ciclos","Fecha servicio", "Costo servicio");
$w = array(40,65,22,22,28,44,11,26,25);



// Header
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();
// Data
if(!empty($_SESSION['add_carro']))
            {
            
               
foreach ($_SESSION['add_carro2'] as $key => $value)
{
//// Arrar de Productos
$products = array(
  array(utf8_decode($value['items_laboratorio'])
  ,utf8_decode($value['items_equipo'])
  ,utf8_decode($value['items_marca'])
  ,utf8_decode($value['items_modelo'])
  ,utf8_decode($value['items_identificador'])
  ,utf8_decode($value['items_servicio'])
  ,$value['items_ciclos']
  ,$value['items_fecha_servicio']
  ,$value['items_subtotalcotizacionservicio']),
);
    // Column widths
   foreach($products as $rows)
    {
    $pdf->Cell($w[0],6,$rows[0],1);
    $pdf->Cell($w[1],6,$rows[1],1);
    $pdf->Cell($w[2],6,$rows[2],1);
    $pdf->Cell($w[3],6,$rows[3],1);
    $pdf->Cell($w[4],6,$rows[4],1);
    $pdf->Cell($w[5],6,$rows[5],1);
    $pdf->Cell($w[6],6,$rows[6],1);
    $pdf->Cell($w[7],6,$rows[7],1);
    $pdf->Cell($w[8],6,"$ ".number_format($rows[8],2,".",","),'1',0,'R');
   
    $pdf->Ln();
     
    $total1+=$rows[8];    
     }}
   }
   $pdf->Ln();
   $pdf->Cell(5,$textypos,"                                                                                                                                                                                                                                           Total de servicios: $ ". +$total1);
   $pdf->Ln();
        


   $pdf->Cell(10,$textypos,"Servicios adicionales");
   $pdf->Ln();

$header = array("Recoleccion");
$w = array(40);

// Header
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
$pdf->Ln();
// Data
if(!empty($_SESSION['add_carro']))
            {
            
               
foreach ($_SESSION['add_carro3'] as $key => $value)
{
//// Arrar de Productos
$products = array(array($value['items_serv']),);
    // Column widths
   foreach($products as $rows)
    {
    
    $pdf->Cell($w[0],6,"$ ".number_format($rows[0],2,".",","),'1',0,'R');
   
    $pdf->Ln();
     
    $tota3+=$rows[0];    
     }}
   }
   $pdf->Ln();
   
              
   $finall = $total1 + $total+$tota3;
   $iva = $finall * 0.16;
   $final = $finall + $iva; 
                   
       

//Apartir de aqui esta la tabla con los subtotales y totales
 $pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
 
    array("Subtotal", $finall),
    array("IVA 16 %", $iva),
    array("Total", $final),
);
    // Column widths
    $w2 = array(40, 40);
     //Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row) {
    $pdf->setX(213);
    $pdf->Cell($w2[0],6,$row[0],1);
    $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

    $pdf->Ln();
    }
    $pdf->Ln();
    //$pdf->Image('https://aloglobal.com/wp-content/uploads/2018/07/franja-roja-main-slider.png,240,3,30,0,'PNG');

    $pdf->output($archivo,"f");
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="Cotizacion Palmertec.pdf"');
    readfile('doc.pdf');
$pdf->output();
