<?php
include("controladores/conexion.php");
$conexion = conectar(); ?>


<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Buscar Laboratorios</title>
		<?php include "scripts/scripts.php"; ?>
	</head>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>


<div class="container mt-5">
    <div class="col-12">
 


        <div class="row">
                <div class="col-12 grid-margin">
                        <div class="card">
                                <div class="card-body">

                                        <h4 class="card-title">Buscador</h4>


                                        <form id="form2" name="form2" method="POST" action="buscador.php">
                                                <div class="col-12 row">
                                                        <div class="col-11">
                                                        <label  class="form-label">Nombre a buscar</label>
                                                        
                                                        <input type="text" class="form-control" id="buscar" name="buscar"  >     
                                                        </div>
                                                        <div class="col-1">
                                                                <input type="submit" class="btn btn-success" value="VER" >
                                                        </div>
                                                </div>
                                                <?php 
                                                $sql=mysqli_query($conexion,"SELECT * FROM laboratorios WHERE laboratorio LIKE '%".$_POST["buscar"]."%' OR entidad LIKE '%".$_POST["buscar"]."%' OR acreditacion LIKE '%".$_POST["buscar"]."%'    ");
                                                $numeroSql = mysqli_num_rows($sql);
                                                ?>
                                                <p style="font-weight: bold; color:green;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                                        </form>


                                        <div class="table-responsive">
                                                <table class="table">
                                                        <thead>
                                                                <tr style="background-color: #00695c; color:#FFFFFF;">
                                                                        <th style=" text-align: center;"> Nombre </th>
                                                                        <th style=" text-align: center;"> Domicilio </th>
                                                                        <th style=" text-align: center;"> Entidad </th>
                                                                        <th style=" text-align: center;"> Acreditacion </th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php while ($rowSql = mysqli_fetch_assoc($sql)){ ?>
                                                
                                                                <tr>
                                                                <td style="text-align: center;"><?php echo $rowSql["laboratorio"]; ?></td>
                                                                <td style="text-align: center;"><?php echo $rowSql["domicilio"]; ?></td>
                                                                <td style="text-align: center;"><?php echo $rowSql["entidad"]; ?></td>
                                                                <td style=" text-align: center;"><?php echo $rowSql["acreditacion"]; ?></td>
                                                                </tr>
                                                
                                                <?php } ?>
                                                        </tbody>
                                                </table>
                                        </div>


                                </div>
                        </div>
                </div>
        </div>


    </div>
</div>

