<?php
session_start();
require_once '../conexion/Conexion.php';


$nick = $_POST["nick"];
$clave = $_POST["clave"];

//var_dump($nick,$clave);
//die();
//$_SESSION['nick'] = $nick;
//if($nick == "" || $clave == ""){
//    echo "<div class='alert alert-warning alert-dismissible'>
//                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
//                  <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
//                  Debe Completar datos!.
//                </div>";
//} 

$SQL = "select usuarios.codigo_usuario,usuarios.nick_usuario,usuarios.clave_usuario, usuarios.nombre_usuario,usuarios.apellido_usuario,usuarios.direccion_usuario,usuarios.email_usuario,usuarios.clave_usuario, perfiles.codigo_perfil, perfiles.nombre_perfil from Usuarios inner join perfiles on perfiles.codigo_perfil = usuarios.codigo_perfil where nick_usuario = '$nick' and clave_usuario = '$clave'";

//var_dump($SQL);
//die();

$consulta = mysqli_query($conexion, $SQL);
/*Recordad que en la base de datos cambiar los campos cliente por usuario*/
if($consulta->num_rows > 0){
    //$row = $consulta->fetch_assoc(MYSQLI_ASSOC);
    $row = $consulta->fetch_assoc();
    $codigo_usuario = $row['codigo_usuario'];
    $nombre_usuario = $row['nick_usuario'];
    $codigo_perfil = $row['codigo_perfil'];
    $nombre_perfil = $row['nombre_perfil'];
    $nombre_pila = $row['nombre_usuario'];
    $apellido_usuario = $row['apellido_usuario'];
    $direccion_usuario = $row['direccion_usuario'];
    $email_usuario = $row['email_usuario'];
    $clave_usuario = $row['clave_usuario'];
    
//    var_dump($codigo_usuario);
//    die();
//    var_dump($nombre_usuario,$nombre_perfil);
    
    if($codigo_perfil== 1){
        $_SESSION['nick_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        header("Location:http://localhost/ProyectoWeb/vista/Panel_administrador.php");
    }else{
        $_SESSION['codigo_usuario'] = $codigo_usuario;
        $_SESSION['nick_usuario'] = $nombre_usuario;
        $_SESSION['nombre_perfil'] = $nombre_perfil;
        $_SESSION['nombre_usuario'] = $nombre_pila;
        $_SESSION['apellido_usuario'] = $apellido_usuario;
        $_SESSION['direccion_usuario'] = $direccion_usuario;
        $_SESSION['email_usuario'] = $email_usuario;
        $_SESSION['clave_usuario'] = $clave_usuario;
        header("Location:http://localhost/ProyectoWeb/vista/panel.php");
    } 
    
}else{
//    echo "<div class='alert alert-warning alert-dismissible'>
//                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
//                  <h5><i class='icon fas fa-info'></i> Advertencia!</h5>
//                  Usuario o contraseña incorrectas!.
//                </div>";
    header("Location:http://localhost/ProyectoWeb/vista/login.php");
    
    
}


//$filas = mysqli_num_rows($consulta);

//$row = ·$filas->fetch_array(MYSQLI_ASSOC);

//var_dump($c);


//die();
//if($filas){
//    
//    $_SESSION['nick'] = $nick;
//    header("Location:http://localhost/ProyectoWeb/vista/panel.php");
//   
//}else{
//    
//    header("Location:http://localhost/ProyectoWeb/vista/login.php");
//    
//}
//    
   

mysqli_free_result($consulta);
mysqli_close($conexion);

 ?>