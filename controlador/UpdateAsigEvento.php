<?php
/*
 * @autor: seiko
 */
session_start();
require_once '../conexion/Conexion.php';
  
$evento = $_POST["evento"];
$usuario = $_POST["usuario"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_termino = $_POST["fecha_termino"];
$codigo = $_POST["codigo"];

//var_dump($evento, $usuario, $fecha_inicio, $fecha_termino, $codigo);
//die();


if ($evento == '' || $usuario == '' || $fecha_inicio == '' || $fecha_termino == '') {

    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {

    $SQL = "UPDATE detalle_eventos SET codigo_evento='$evento',  codigo_usuario='$usuario',
            fecha_inicio_evento='$fecha_inicio',  fecha_termino_evento='$fecha_termino'
            WHERE codigo_detalle_eventos ='$codigo'";
    $resultado = mysqli_query($conexion, $SQL);

    if ($resultado == true) {
        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Modificado!</h5>
                  Modificado con Exito.
                </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Error!</h5>
                  Problemas al modificar tus datos.
                </div>";
    }
}