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

    echo "<script>
                window.alert('Debe rellenar campos!');
               
    window.location.href='http://localhost/ProyectoWeb/vista/registrar.php';
    </script>";
   
} else {
    $SQL = "INSERT INTO Usuarios(`nombre_cliente`,`apellido_cliente`,`direccion_cliente`,`email_cliente`,`nick_cliente`,`clave_cliente`,`codigo_perfil`) values('$nombre','$apellido','$direccion','$email','$nick','$clave',2)";
    $resultado = mysqli_query($conexion, $SQL);
    if ($resultado) {

        echo "<script>
                window.alert('Ya estas registrado!');
               
    window.location.href='http://localhost/ProyectoWeb/vista/login.php';
    </script>";
        
    } else {
        //
    }
}
?>