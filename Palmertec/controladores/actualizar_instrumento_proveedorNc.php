<?php
session_start();
require("conexion.php");
$conexion = conectar();
$id = mysqli_real_escape_string($conexion, $_POST['id']);

$busqueda = mysqli_real_escape_string($conexion, $_POST['busqueda']);

					$Hola =  mysqli_query($conexion,"SELECT instrumento from instrumentos where id_instrumento=$busqueda;");
					while ($data = mysqli_fetch_array($Hola)){
						$Instrumento= $data['instrumento'];
					}

				
$lista = mysqli_real_escape_string($conexion, $_POST['lista1']);


					$sql = mysqli_query($conexion ,"SELECT * FROM magnitud WHERE id_magnitud = $lista");
				
						while ($data1 = mysqli_fetch_array($sql)) {
							$id_magnitud = $data1['id_magnitud'];
							$magnitud = $data1['magnitud'];

							
						}
					

$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditacion']);
$puntos = mysqli_real_escape_string($conexion, $_POST['puntos']); 
$AlcanceMinimo = mysqli_real_escape_string($conexion, $_POST['alcanceMinimo']); 
$AlcanceMaximo = mysqli_real_escape_string($conexion, $_POST['alcanceMaximo']);
$costo = mysqli_real_escape_string($conexion, $_POST['costo']); 
$CostosExtra = mysqli_real_escape_string($conexion, $_POST['costoExtra']);
$unidadmin = mysqli_real_escape_string($conexion, $_POST['unidadmin']); 
$unidadmax = mysqli_real_escape_string($conexion, $_POST['unidadmax']);
$extra = mysqli_real_escape_string($conexion, $_POST['extra']);
$Comentarios = mysqli_real_escape_string($conexion, $_POST['Comentarios']);
$sql = mysqli_query($conexion, "UPDATE costos_proveedor SET magnitud = '$magnitud', acreditamiento = '$acreditamiento', instrumento = '$Instrumento', costo = '$costo', puntos = '$puntos',
      porcentaje = '0',costoExtra = '$CostosExtra',alcanceMax = $AlcanceMaximo,unidadmax = '$unidadmax',alcanceMix =$AlcanceMinimo,unidadmin = '$unidadmin',extra = '$extra',Comentarios = '$Comentarios' WHERE cve_costo_proveedor=$id");

if($sql){			
    echo ' <script language="javascript">alert("Actualizacion  exitosa");</script> ';
    echo "<script>location.href='../vistas/listar_Instrumentos_ ProveedorN.php'</script>";	
}else{
    echo ' <script language="javascript">alert("Error, no se pudo hacer la actualizacion, intente más tarde");</script> ';
    echo "<script>location.href='../vistas/listar_Instrumentos_ ProveedorN.php'</script>";	
}

?>