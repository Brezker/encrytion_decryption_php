<?php 
?>

<meta http-equiv="content-type" content="text/html; charset=iso8859-1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<?php 

$conexion=mysqli_connect('localhost','root','','palmerte_versionfinal1');

$unidadmax=$_POST['unidadmax'];

	$sql="SELECT id_unidadMed,
			 id_magnitud,
			 unidadMedida 
		from unidad_medidad
		where id_magnitud='$unidadmax'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Unidad de medida</label>
    
            <select id_unidadMed='unidadmax' name='unidadmax' id='unidadmax' class='form-control' class='unidadmax' required>";


	while ($ver=mysqli_fetch_row($result)) {
		utf8_encode($cadena=$cadena.'<option value="'.$ver[2].'">'.$ver[2].'</option>');
	 
		
	}

	echo  $cadena."</select>";
	
	
?>