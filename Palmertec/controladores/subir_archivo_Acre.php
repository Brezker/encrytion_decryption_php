<?php
include('archivos.php');
include('conexion.php');
$conexion = conectar();

error_reporting (0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conexion, htmlentities($_POST['title']));
    $description = mysqli_real_escape_string($conexion, htmlentities($_POST['description']));

    
    $file_name = $_FILES['file']['name'];

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['file']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = '../files/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['file']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {

            }
            
            if($title == null || $title == '' ){
                echo 'Llenar datos correctamente y aceptar nuestras politicas';
            }else{

                

  $ins = mysqli_query($conexion, "UPDATE laboratorios  SET  titulo='$title', url='$new_name_file'  where laboratorios.cve_usuario= $description ");
               if ($ins) {       
                    echo 'Registrado correctamente';
                } else {            
                    echo 'Error al registrar';
                }
            }
        }else{
            echo 'Archivo no valido';        
        }
    }else{
        echo 'Debe de seleccionar un archivo';
    }


} else {
    echo 'fail';
}
