<?php

session_start();
require_once '../conexion/Conexion.php';

$nombre_pila = $_POST["nombre"];
$apellido_usuario = $_POST["apellido"];
$direccion_usuario = $_POST["direccion"];
$email_usuario = $_POST["email"];
$clave_usuario = $_POST["clave"];
$codigo_usuario = $_POST["codigo"];


//var_dump($nombre_pila,$apellido_usuario,$direccion_usuario,$email_usuario,$clave_usuario,$codigo_usuario);



if ($nombre_pila == '' || $apellido_usuario == '' || $direccion_usuario == '' || $email_usuario == '' || $clave_usuario == '') {

echo"<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
} else {
$SQL = "UPDATE usuarios SET nombre_usuario='$nombre_pila',apellido_usuario= '$apellido_usuario',direccion_usuario='$direccion_usuario',email_usuario ='$email_usuario',clave_usuario='$clave_usuario' WHERE codigo_usuario = '$codigo_usuario'";
$resultado = mysqli_query($conexion, $SQL);

if ($resultado == true) {


$to = "$email_usuario";
$subject = "Actualizacion de Perfil";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$message = "
                <html>
                <head>
                <title>HTML</title>
                </head>
                <body>
                <h1>Tus nuevos datos Son:</h1>
                <p></p>
                <p>Nombre: " . $nombre_pila . "</p>
                <p>Apellido: " . $apellido_usuario . "</p>
                <p>Direccion: " . $direccion_usuario . "</p>
                <p>Correo: " . $email_usuario . "</p>
                <p>Clave: " . $clave_usuario . "</p>
                </body>
                </html>";

mail($to, $subject, $message, $headers);




echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Datos Guardados Exitosamente</h5>
                  <p>Sus datos nuevos fueron enviado a su correo electronico.</p>
                  <p>Debe Volver a iniciar Sesion.</p>
                  <div>
                <a class=alert alert-light role=alert href=http://localhost/ProyectoWeb/vista/logout.php class=alert-link>Cerrar Sesion</a></div>
                </div>
                ";


    } else {
        echo "<div class = 'alert alert-danger alert-dismissible'>
<button type = button class = 'close data-dismiss=alert aria-hidden=true'>&times;
</button>
<h5><i class = 'icon fas fa-check'></i> Alert!</h5>
Problemas al guardar tus datos.
</div>";
    }
}

