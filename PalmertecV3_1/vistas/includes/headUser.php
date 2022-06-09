
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
			<ul class="nav">
				    	<li>
						<a href="proveedor.php"><i class="fas fa-home"></i> Inicio</a>
					</li>
				   <li>
					<a href=""><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']?></a>
					</li>
					<li>
					<a  href="editarPerfil.php?id=<?php echo $_SESSION['cve_usuario']; ?>"><i class="fas fa-user"></i> Editar perfil</a>
					</li>
					<li>
						<a href="pedidos_proveedor.php"><i class="fa fa-check-square"></i> Pedidos</a>
					</li>		
					<li><a href="../vistas/datos_registrados.php"><i class="fa fa-shopping-cart"></i> Carrito</a>
					<ul>
					   <a href="./subir_archivopago.php"><i class="fa fa-check-square"></i> Pedidos</a>
						<li><a href="./Ver_reportesCliente.php"><i class="fa fa-folder-open"></i> Reportes</a></li>
					
					</ul>
			     	</li>
					<li>
						<a href="../controladores/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
					</li>
				</ul>
			</nav>
		</div>	
	</header>