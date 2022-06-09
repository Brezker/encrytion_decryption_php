<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio de sesi&#xF3;n-Palmertec</title>
    <link rel="shortcut icon" href="img/palmertec-favicon.ico"/>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css" />
  
   
    
    
    <!-- VALIDACION-->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="scripts/menu.js"></script>

<style type="text/css">* {	margin:0px;padding:0px;}#header {margin:auto;width:500px;font-family:Arial, Helvetica, sans-serif;}
ul, ol {list-style:none;}.nav > li {float:left;}.nav li a {background-color:white;color:black;text-decoration:none;padding:10px 12px;display:block;}
.nav li a:hover {background-color:#1065c7;}.nav li ul {display:none;position:absolute;min-width:140px;}.nav li:hover > ul {display:block;}
.nav li ul li {position:relative;}.nav li ul li ul {right:-140px;top:0px;}
</style>
</head> 

<body>
<br>        
    <nav >
        <ul class="nav">
             <li >
                <a href="https://palmertec.com.mx/index.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
<!--
            <li><a href=""><i  class="fas fa-user-plus"></i> Registrate</a>
				<ul>
                    <a href="index.php?pagina=registrarse"><i  class="fas fa-user-plus"></i>Cliente</a>
                    <a href="index.php?pagina=registrar_ProvedorN" ><i class="fas fa-user-plus"></i>Afiliado</a>
				</ul>
			</li>
-->
<!--
            <li>
                <a href="https://palmertec.com.mx/SiPalmertecMx/"><i class="fas fa-tasks"></i> CRM</a>
            </li>-->
           <!-- 
            <li>
                <a href="https://palmertec.com.mx/PuntoDeVenta/vistas/cliente.php"><i class="fas fa-coins"></i> Cotizar</a>
            </li>-->
        </ul>
    </nav>
  
   
    <main class="main">
        <div class="container">
            <?php
            if(ISSET($_GET["pagina"])){
                if($_GET["pagina"] == "registrarse"){
                    include "paginas/".$_GET["pagina"].".php";
                                                            
                }else if($_GET["pagina"] == "registrar_ProvedorN"){
                    include "paginas/".$_GET["pagina"].".php";
                }else{
                    include "paginas/login.php";                           
                }
            }else{
                include "paginas/login.php";                           
            }
            ?>
        </div>
    </main>

    <footer class="border-top footer text-muted border-top-color" style="background-color: #ffffff ">

    <div class="container gly " style="max-width: 26rem; ">

    </div>
    <div class="container gly " style="max-width: 18rem; color:#0c62bf ">
        &copy; 2021   Palmertec - <a style="color:#0c62bf" href="/Home/Privacy">Privacy</a>
    </div>
</footer>
<script src="/lib/jquery/dist/jquery.js"></script>
<script src="/lib/jquery/dist/jquery.min.js"></script>
<script src="/lib/bootstrap/dist/js/bootstrap.js"></script>
<script src="/lib/jquery-ui/jquery-ui.min.js"></script>
<script srce="scripts/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/37fd38107f.js" crossorigin="anonymous"></script>


</body>
</html>