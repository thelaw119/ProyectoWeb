<?php
/*
 * @autor: Thelaw
 */
session_start();
require_once '../conexion/Conexion.php';



  
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$codigo = $_POST["codigo_categoria"];


//var_dump($nombre,$descripcion,$codigo);
//
//die();

if ($nombre == '' || $descripcion == '' || $descripcion == '' ) {

echo"<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {
$SQL = "UPDATE categorias SET nombre_categoria ='$nombre',descripcion_categoria= '$descripcion' WHERE codigo_categoria = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);

if ($resultado == true) {



echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Datos Actualizados Exitosamente</h5>";


    } else {
        echo "<div class = 'alert alert-danger alert-dismissible'>
<button type = button class = 'close data-dismiss=alert aria-hidden=true'>&times;
</button>
<h5><i class = 'icon fas fa-ban'></i> Alert!</h5>
Problemas al actualizar tus datos.
</div>";
    }
}

