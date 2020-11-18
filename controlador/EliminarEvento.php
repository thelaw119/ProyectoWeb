<?php

/*
 *   @autor: seiko
 */



session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["codigo"];



$SQL = "delete from eventos where codigo_evento = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);