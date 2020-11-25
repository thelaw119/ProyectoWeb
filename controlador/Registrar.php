<?php

require_once '../conexion/Conexion.php';


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];
$nick = $_POST["nick"];
$clave = $_POST["clave"];

//var_dump($nombre,$apellido,$direccion,$email,$nick,$clave);
//die();

if ($nombre == '' || $apellido == '' || $direccion == '' || $email == '' || $nick == '' || $clave == '') {

//    echo "<script>
//                window.alert('Debe rellenar campos!');
//               
//    window.location.href='http://localhost/ProyectoWeb/vista/registrar.php';
//    </script>";


    echo"<div class='alert alert-warning alert-dismissible'>
                      <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                      <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                      Debe completar los datos.
                    </div>";
} else {

    $SQLCONSULTA = "select * from usuarios where email_usuario = '$email';";
    $resultado_consulta = mysqli_query($conexion, $SQLCONSULTA);

    if ($resultado_consulta->num_rows > 0) {

        echo"<div class='alert alert-warning alert-dismissible'>
                      <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                      <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                      Correo ya en USO!.
                    </div>";
    }else{

    $SQL = "INSERT INTO Usuarios(nombre_usuario,apellido_usuario,direccion_usuario,email_usuario,nick_usuario,clave_usuario,codigo_perfil) values('$nombre','$apellido','$direccion','$email','$nick','$clave',2)";
    $resultado = mysqli_query($conexion, $SQL);
    if ($resultado) {






        $to = "$email";
        $subject = "NUEVO USUARIO";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message = "
                <html>
                <head>
                <title>NUEVO USUARIO</title>
                </head>
                <body>
                <h1>Tus datos Son:</h1>
                <p></p>
                <p>Nombre Completo: " . $nombre . " ". $apellido . "</p>
                <p>Direccion: " . $direccion . "</p>
                <p>Email: " . $email . "</p>
                <p>Nick: " . $nick . "</p>
                <p>Clave: " . $clave . "</p>
                </body>
                </html>";

        mail($to, $subject, $message, $headers);




        echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Registrado Exitosamente</h5>
                  <p>Sus datos fueron enviado a su correo electronico.</p>
                  <div>
                <a class=alert alert-light role=alert href=http://localhost/ProyectoWeb/vista/login.php class=alert-link>Volver</a></div>
                </div>";


//        echo "<script>
//                window.alert('Ya estas registrado!');
//               
//    window.location.href='http://localhost/ProyectoWeb/vista/login.php';
//    </script>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> ERROR!</h5>
                  Problemas al Registrar tus datos.
                </div>";
    }
}}
?>