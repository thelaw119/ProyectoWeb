<?php
/*
 * @autor: Thelaw
 */
session_start();
require_once '../conexion/Conexion.php';


$evento = $_POST["evento"];
$usuario = $_POST["usuario"];
$fecha_inicio = $_POST["fecha_inicio"];
$fecha_termino = $_POST["fecha_termino"];


//var_dump($evento,$usuario,$fecha_inicio,$fecha_termino);
//
//die();


if ($evento == '' || $usuario == '' || $fecha_inicio == '' || $fecha_termino == '') {

    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {

    $SQL = "insert into detalle_eventos(`codigo_evento`,`codigo_usuario`,`fecha_inicio_evento`,`fecha_termino_evento` ) 
            values('$evento','$usuario','$fecha_inicio','$fecha_termino')";
    $resultado = mysqli_query($conexion, $SQL);

    if ($resultado == true) {
        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Guardado!</h5>
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
