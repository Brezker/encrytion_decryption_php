<?php 
?>

<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<?php 

$conexion=mysqli_connect('localhost','root','','palmerte_versionfinal1');

$servicio=$_POST['servicio'];

	$sql="SELECT id_servicio,
            servicio
		from todos_servicios 
		where servicio='$servicio'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<br>";
		

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<input type="hidden" class="form-control" name="id_serv" id="id_serv" value='.utf8_encode($ver[0]).'>';
	}
    echo $cadena;
	
	
?>