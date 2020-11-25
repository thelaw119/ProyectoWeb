<?php

/*
 *   @autor: Thelaw
 */



session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["codigo"];



$SQL = "delete from detalle_eventos where codigo_detalle_eventos = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);