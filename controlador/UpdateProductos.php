<?php
/*
 * @autor: Thelaw
 */
session_start();
require_once '../conexion/Conexion.php';

$nombre = $_POST["nombre"];
$categoria = $_POST["categoria"];    
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$codigo = $_POST["codigo_producto"];

//var_dump($nombre,$categoria,$descripcion,$precio,$codigo);  
//
//die();

//var_dump($nombre_pila,$apellido_usuario,$direccion_usuario,$email_usuario,$clave_usuario,$codigo_usuario);



if ($nombre == '' || $categoria == '' || $descripcion == '' || $precio == '' ) {

echo"<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {
$SQL = "UPDATE productos SET nombre_producto ='$nombre',descripcion_producto= '$descripcion',precio_producto='$precio',codigo_categoria ='$categoria' WHERE codigo_producto = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);

if ($resultado == true) {



echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Datos Actualizados Exitosamente</h5>";


    } else {
        echo "<div class = 'alert alert-danger alert-dismissible'>
<button type = button class = 'close data-dismiss=alert aria-hidden=true'>&times;
</button>
<h5><i class = 'icon fas fa-ban'></i> ERROR!</h5>
Problemas al actualizar tus datos.
</div>";
    }
}

