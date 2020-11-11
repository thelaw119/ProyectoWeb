<?php

session_start();
require_once '../conexion/Conexion.php';

$nombre_pila = $_POST["nombre_usuario"];
$apellido_usuario = $_POST["apellido_usuario"];
$direccion_usuario = $_POST["direccion_usuario"];
$email_usuario = $_POST["email_usuario"];
$clave_usuario = $_POST["clave_usuario"];
$codigo_usuario = $_POST["codigo_usuario"];

if ($nombre_pila == '' || $apellido_usuario == ''|| $direccion_usuario == '' || $email_usuario == ''|| $clave_usuario == '') {

    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
//    die();
} else {

//    $SQL = "insert into categorias(`nombre_categoria`,`descripcion_categoria`) values('$nombre','$descripcion')";
    
   $SQL = "UPDATE usuarios SET nombre_usuario='$nombre_pila',apellido_usuario= '$apellido_usuario',direccion_usuario='$direccion_usuario',email_usuario ='$email_usuario',clave_usuario='$clave_usuario' WHERE usuarios.codigo_usuario = '$codigo_usuario'";

    
    $resultado = mysqli_query($conexion, $SQL);

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

