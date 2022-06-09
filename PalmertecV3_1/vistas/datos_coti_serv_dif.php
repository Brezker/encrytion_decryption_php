<?php 
?>

<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<?php 

$conexion=mysqli_connect('localhost','root','','palmerte_versionfinal1');

$servicio=$_POST['servicio'];

	$sql="SELECT id_servdif,
			 id_serv,
             id_magnitud,
			 servicios,
             equipo
		from servicios_dif
		where id_serv='$servicio'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label for='equipo'>Equipo</label>
    
			<select id_servicio='equipo' name='equipo' id='equipo'>";
		

	while ($ver=mysqli_fetch_row($result)) {
		utf8_encode($cadena=$cadena.'<option value="'."$ver[4]".'">'.$ver[4].'</option>');
	 
		
	}

	echo  $cadena."</select>";
	
	
?>