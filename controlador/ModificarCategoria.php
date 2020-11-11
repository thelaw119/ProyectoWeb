<?php

session_start();
require_once '../conexion/Conexion.php';

$codigo = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$opcion = $_POST["opcion"];

switch ($opcion) {

    case 1:
        $SQL = "INSERT INTO categorias(nombre_categoria,descripcion_categoria) values('$nombre','$descripcion')";
        $resultado = mysqli_query($conexion, $SQL);


        $consulta = "SELECT codigo_categoria, nombre_categoria, descripcion_categoria FROM categorias ORDER BY codigo_categoria DESC LIMIT 1";
        $resultado = mysqli_query($conexion, $consulta);
        $data = $resultado->fetch_assoc(MYSQLI_ASSOC);

        break;

    case 2:
        
        
        $SQL = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion' WHERE codigo_categoria ='$codigo'";
        $resultado = mysqli_query($conexion, $SQL);   
        
        $consulta = "SELECT codigo_categoria, nombre_categoria, descripcion_categoria FROM categorias WHERE codigo_categoria ='$codigo'";
        $resultado = mysqli_query($conexion, $consulta);
        $data = $resultado->fetch_assoc(MYSQLI_ASSOC);
        
        break;


    case 3:
        $SQL = "DELETE FROM categorias WHERE codigo_categoria='$codigo'";
        $resultado = mysqli_query($conexion, $SQL);


        break;
}


print json_encode($data, JSON_UNESCAPED_UNICODE);
