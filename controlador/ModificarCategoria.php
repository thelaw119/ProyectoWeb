<?php

session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$opcion = $_POST["opcion"];

if ($nombre == '' || $descripcion == '') {

    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {

    $SQL = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion' WHERE codigo_categoria='$codigo' ";
    $resultado = mysqli_query($conexion, $SQL);
    $data->fetch_assoc($resultado);
    if ($resultado) {
        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Alert!</h5>
                  Datos Guardados.
                </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Alert!</h5>
                  Problemas al guardar tus datos.
                </div>";
    }
}
print json_encode($data, JSON_UNESCAPED_UNICODE);