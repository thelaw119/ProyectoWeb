<?php

/*
 *   @autor: thelaw
 */



session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["detalle_evento"];



$SQL = "delete from detalle_evento where codigo_detalle_eventos = '$detalle_evento'";
$resultado = mysqli_query($conexion, $SQL);
