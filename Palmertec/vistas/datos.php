<?php 
?>

<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<?php 

$conexion=mysqli_connect('localhost','root','','palmerte_versionfinal1');

$instrumento=$_POST['instrumento'];

	$sql="SELECT id_instrumento,
			 id_magnitud,
			 instrumento 
		from instrumentos 
		where id_magnitud='$instrumento'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Instrumento</label> 
    
			<select id_instrumento='busqueda' name='busqueda' id='busqueda' class='busqueda' class='form-control'>";
		

	while ($ver=mysqli_fetch_row($result)) {
		utf8_encode($cadena=$cadena.'<option value='.$ver[0].'>'.$ver[2].'</option>');
	 
		
	}

	echo  $cadena."</select>";
	
	
?>