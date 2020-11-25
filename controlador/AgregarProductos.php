<?php

session_start();
require_once '../conexion/Conexion.php';

$categoria = $_POST["categoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

//var_dump($categoria,$nombre,$descripcion,$precio);


if ($categoria == '' || $nombre == '' || $descripcion == '' || $precio == '') {

    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {

    $SQL = "insert into productos(`nombre_producto`,`descripcion_producto`,`precio_producto`,`codigo_categoria` ) values('$nombre','$descripcion','$precio','$categoria')";
    $resultado = mysqli_query($conexion, $SQL);

    if ($resultado == true) {
        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Almacenado!</h5>
                  Datos Guardados.
                </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Alert!</h5>
                  Problemas al guardar tus datos.
                </div>";
    }
}
