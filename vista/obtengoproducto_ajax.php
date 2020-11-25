<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}


$banda_id = filter_input(INPUT_POST, 'banda_id'); //obtenemos el parametro que viene de ajax

$SQL = "select codigo_producto, nombre_producto, precio_producto from productos where codigo_categoria = '$banda_id'";
$resultado = mysqli_query($conexion, $SQL);


?>

<option value="">- Seleccione Productos -</option>
<?php foreach ($resultado as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['codigo_producto'] ?>"><?= $op['nombre_producto']." - ".$op['precio_producto']  ?></option>
<?php endforeach; ?>



