<?php

/*
 *   @autor: thelaw
 */



session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["codigo"];



$SQL = "delete from productos where codigo_producto = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);

