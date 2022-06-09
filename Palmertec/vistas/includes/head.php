<?php
include("../controladores/conexion.php");
$conexion = conectar();
if (@!$_SESSION['active']) {
	header("Location:../Index.php");
}else if ($_SESSION['rol']=="administrador") {
	?>

<head>
<style type="text/css">* {	margin:0px;padding:0px;}#header {margin:auto;width:500px;font-family:Arial, Helvetica, sans-serif;}
ul, ol {list-style:none;}.nav > li {float:left;}.nav li a {background-color:white;color:black;text-decoration:none;padding:10px 12px;display:block;}
.nav li a:hover {background-color:#1065c7;}.nav li ul {display:none;position:absolute;min-width:140px;}.nav li:hover > ul {display:block;}
.nav li ul li {position:relative;}.nav li ul li ul {right:-140px;top:0px;}
</style>
</head>
	
	     <header class="header">
		  <div class="container logo-nav-container">
		   <link rel="stylesheet" type="text/css" href="css/menustyle.css">
			<a class="logo" href="administrador.php"><img style="width: 50%" src="../img/palmertec.png" alt=""></a>
			<span class="menu-icon"><i class="fas fa-ellipsis-h"></i></span>
			<nav class="navigation">                
				<ul  class="nav">
				    <li>
					<a href=""><i class="fas fa-user fa-no-hover"></i> <?php echo $_SESSION['nombre']?></a>
					</li>
				    <li>
					<a href="administrador.php"><i class="fas fa-home"></i> Inicio</a>
					</li>
					<li>
						<a href="usuarios.php"><i class="fas fa-users"></i> Usuarios</a>
					</li>
					<!--
					<li><a href=""><i class="fa fa-check-square"></i>Pedidos</a>
					<ul>
					<li>
						<a href="comprobante_pago.php"><i class="fa fa-ticket"></i> Comprobantes de pago</a>
						<a href="Reportes_admin.php"><i class="fa fa-folder-open"></i> Reportes</a>
					</li>
				    </li>
					</ul>
				    </li>
					-->
					<li>
						<a href="../controladores/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
					</li>
				</ul>
			</nav>
			
		</div>	
	</header>
<?php }else if($_SESSION['rol']=="proveedor") {?>
<head>
<style type="text/css">* {	margin:0px;padding:0px;}#header {margin:auto;width:500px;font-family:Arial, Helvetica, sans-serif;}
ul, ol {list-style:none;}.nav > li {float:left;}.nav li a {background-color:white;color:black;text-decoration:none;padding:10px 12px;display:block;}
.nav li a:hover {background-color:#1065c7;}.nav li ul {display:none;position:absolute;min-width:140px;}.nav li:hover > ul {display:block;}
.nav li ul li {position:relative;}.nav li ul li ul {right:-140px;top:0px;} 
</style>
</head>
	<header class="header">
		<div class="container logo-nav-container">
			<a class="logo" href="administrador.php"><img style="width: 50%" src="../img/palmertec.png" alt=""></a>
			<span class="menu-icon"><i class="fas fa-ellipsis-h"></i></span>
			<nav class="navigation">                
				<ul class="nav">
				    	<li>
						<a href="proveedor.php"><i class="fas fa-home"></i> Inicio</a>
					</li>
				   <li>
					<a href="editarPerfil.php?id=<?php echo $_SESSION['cve_usuario']; ?>"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']?></a>
					</li>
					<!--
					<li>
					<a  href="editarPerfil.php?id=<?php echo $_SESSION['cve_usuario']; ?>"><i class="fas fa-user"></i> Editar perfil</a>
					</li>
					-->
					<li><a href="../vistas/datos_registrados.php"><i class="fa fa-shopping-cart"></i> Cotizaciones</a>
					<ul>
					   <a href="./subir_archivopago.php"><i class="fa fa-check-square"></i> Pedidos</a>
					<!--	<li><a href="./Ver_reportesCliente.php"><i class="fa fa-folder-open"></i> Reportes</a></li>-->
					
					</ul>
			     	</li>
					 <li>
               			 <a href="cotizar.php"><i class="fas fa-coins"></i> Cotizar</a>
            		</li>		
					<li>
						<a href="../controladores/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
					</li>
				</ul>
			</nav>
		</div>	
	</header>
<?php }else if($_SESSION['rol']=="cliente"){ ?>
<head>
<style type="text/css">* {	margin:0px;padding:0px;}#header {margin:auto;width:500px;font-family:Arial, Helvetica, sans-serif;}
ul, ol {list-style:none;}.nav > li {float:left;}.nav li a {background-color:white;color:black;text-decoration:none;padding:10px 12px;display:block;}
.nav li a:hover {background-color:#1065c7;}.nav li ul {display:none;position:absolute;min-width:140px;}.nav li:hover > ul {display:block;}
.nav li ul li {position:relative;}.nav li ul li ul {right:-140px;top:0px;}
</style>
</head>
	<header class="header">
		<div class="container logo-nav-container">
			<a class="logo" href=""><img style="width: 50%" src="../img/palmertec.png" alt=""></a>
			<span class="menu-icon"><i class="fas fa-ellipsis-h"></i></span>
			<nav class="navigation">                
				<ul class="nav">
					 <li>
					<a href=""><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']?></a>
					</li>			
					<li>
						<a href="cotizar.php"><i class="fas fa-home"></i> Inicio</a>
					</li>
					
					 <li>
						<a href="laboratorios1.php"><i class="fa fa-flask" aria-hidden="true"></i></i></i> Laboratorios</a>
					</li>
						
					<li><a href="../vistas/datos_registrados.php"><i class="fa fa-shopping-cart"></i> Carrito</a>
					<ul>
					   <a href="./subir_archivopago.php"><i class="fa fa-check-square"></i> Pedidos</a>
						<li><a href="./Ver_reportesCliente.php"><i class="fa fa-folder-open"></i> Reportes</a></li>
					
					</ul>
			     	</li>
					 <?php
					$user = $_SESSION['cve_usuario'];
					$result = mysqli_query($conexion, "SELECT estatus FROM clientes where cve_usuario = $user");
					$row = mysqli_fetch_array($result);
					if($row == 0){
				     ?>
					<li>
						<a href="terminar_Registra_ClienteN.php"><i class="fas fa-home"></i> Terminar de registrate</a>
					</li>
					<?php }?>
                     <li>
						<a href="../controladores/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
					</li>
				</ul>
			</nav>
		</div>	
	</header>
<?php }else{
	header("Location:../Index.php");
} ?>