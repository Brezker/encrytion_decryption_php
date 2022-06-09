<?php
session_start();
require("conexion.php");
$conexion = conectar();

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
$sql = mysqli_query($conexion, "INSERT INTO costos_proveedor(
		magnitud, acreditamiento, instrumento, costo, puntos,
      porcentaje,costoExtra,alcanceMax,unidadmax,alcanceMix,unidadmin,extra,Comentarios)
	VALUES ('$magnitud', '$acreditamiento', '$Instrumento', '$costo', '$puntos',
    '0','$CostosExtra',$AlcanceMaximo,'$unidadmax',$AlcanceMinimo,'$unidadmin','$extra','$Comentarios')");



if($sql){			
    echo ' <script language="javascript">alert("Registro exitoso");</script> ';
    echo "<script>location.href='../vistas/listar_costo_calibracion.php'</script>";	
}else{
    echo ' <script language="javascript">alert("Error, no se pudo hacer el registro, intente más tarde");</script> ';
    echo "<script>location.href='../vistas/registrar_calibracion.php'</script>";	
}

?>