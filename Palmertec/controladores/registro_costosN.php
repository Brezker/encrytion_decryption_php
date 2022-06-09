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
					

$idLab = mysqli_real_escape_string($conexion, $_POST['idLab']);

$acreditamiento = mysqli_real_escape_string($conexion, $_POST['acreditacion']);
$puntos = mysqli_real_escape_string($conexion, $_POST['puntos']); 
$AlcanceMinimo = mysqli_real_escape_string($conexion, $_POST['alcanceMinimo']); 
$AlcanceMaximo = mysqli_real_escape_string($conexion, $_POST['alcanceMaximo']); 
$costo = mysqli_real_escape_string($conexion, $_POST['costo']); 
$CostosExtra = mysqli_real_escape_string($conexion, $_POST['costoExtra']);

$sql = mysqli_query($conexion, "INSERT INTO costos_proveedor (
	cve_laboratorio, magnitud, acreditamiento, instrumento, costo, puntos,costoExtra,alcanceMax,alcanceMix, porcentaje)
	VALUES ($idLab, '$magnitud', '$acreditamiento', '$Instrumento', '$costo', '$puntos','$CostosExtra',$AlcanceMaximo,$AlcanceMinimo, '0')");



if($sql){
	echo ' <script language="javascript">alert("Nuevo costo del servicio registrado con éxito");</script> ';
	echo '<script>window.history.go(-2)</script>';	
}else{
	echo ' <script language="javascript">alert("Error, no se pudo registrar el costo del servicio, intente más tarde");</script> ';
	echo '<script>window.history.go(-1)</script>';

}
	
	
	
?>