<?php

/*
 *   @autor: thelaw
 */



session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["codigo"];



$SQL = "delete from categorias where codigo_categoria = '$codigo'";
$resultado = mysqli_query($conexion, $SQL);

