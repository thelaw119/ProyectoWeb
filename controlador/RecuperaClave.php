<?php

/*
 * autor: Thelaw
 */

session_start();
require_once '../conexion/Conexion.php';

$email = $_POST["email"];
//var_dump($email);
//die();
//var_dump($nombre_pila,$apellido_usuario,$direccion_usuario,$email_usuario,$clave_usuario,$codigo_usuario);



if ($email == '') {

    echo"<div class='alert alert-warning alert-dismissible'>
                      <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                      <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
                      Debe completar los datos.
                    </div>";
} else {

    $SQL = "select * from usuarios where email_usuario = '$email' and codigo_perfil = 2";
    $resultado = mysqli_query($conexion, $SQL);


    if ($resultado->num_rows > 0) {

        $row = $resultado->fetch_assoc();

        $nick = $row['nick_usuario'];
        $clave = $row['clave_usuario'];
        $correo = $row['email_usuario'];

//        var_dump($nick,$clave,$correo);

        $to = "$correo";
        $subject = "Envio de Nombre de usuario y clave";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = "
                <html>
                <head>
                <title>RECUPERACION DE DATOS</title>
                </head>
                <body>
                <h1>Tus datos Son:</h1>
                <p></p>
                <p>Nick: " . $nick . "</p>
                <p>Clave: " . $clave . "</p>
                </body>
                </html>";

        mail($to, $subject, $message, $headers);




        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Datos Consultados Exitosamente</h5>
                  <p>Sus datos fueron enviado a su correo electronico.</p>
                  <div>
                <a class=alert alert-light role=alert href=http://localhost/ProyectoWeb/vista/login.php class=alert-link>Volver</a></div>
                </div>";
    } else {
        echo"<div class='alert alert-warning alert-dismissible'>
                      <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                      <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
                      No Existe el correo.
                    </div>";
    }















//
//        $nick = $row['nick_usuario'];
//        $clave = $row['clave_usuario'];
//        $correo = $row['email_usuario'];
//        var_dump($row);
//        die();
//        $to = "$correo";
//        $subject = "Envio de Nombre de usuario y clave";
//        $headers = "MIME-Version: 1.0" . "\r\n";
//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//
//        $message = "
//                <html>
//                <head>
//                <title>HTML</title>
//                </head>
//                <body>
//                <h1>Tus nuevos datos Son:</h1>
//                <p></p>
//                <p>Nick: " . $nick . "</p>
//                <p>Clave: " . $clave . "</p>
//                <p>Correo: " . $correo . "</p>
//                </body>
//                </html>";
//
//        mail($to, $subject, $message, $headers);
//
//
//
//
//        echo "<div class='alert alert-success alert-dismissible'>
//                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
//                  <h5><i class='icon fas fa-ban'></i> Datos Consultados Exitosamente</h5>
//                  <p>Sus datos fueron enviado a su correo electronico.</p>
//                  <div>
//                <a class=alert alert-light role=alert href=http://localhost/ProyectoWeb/vista/login.php class=alert-link>Volver</a></div>
//                </div>";
//    } else {
//
//        echo "<div class='alert alert-danger alert-dismissible'>
//                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
//                  <h5><i class='icon fas fa-check'></i> Error!</h5>
//                  Problemas al consultar tus datos.
//                </div>";
//    }
}



