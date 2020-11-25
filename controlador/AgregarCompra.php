<?php

session_start();
require_once '../conexion/Conexion.php';

$productos = $_POST['productos'];

//var_dump($codigo,$cantidad,$productos,$pago);

/* Busco el precio del producto */

$SQLPRODUCTO = "Select precio_producto from Productos where codigo_producto = '$productos'";
$resultado = mysqli_query($conexion, $SQLPRODUCTO);


if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $precio_producto = $row['precio_producto'];
}

//var_dump($precio_producto);


$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$precio_producto;
$pago = $_POST['pago'];

if($productos == '' || $cantidad == '' || $precio_producto == '' || $pago == '' ){
    echo "<div class='alert alert-warning alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-exclamation-triangle'></i> Advertencia!</h5>
                  Debe completar los datos.
                </div>";
}else{
    
    /* Ahora insertamos Carro Compra */

$SQLINSERTCARROCOMPRA = "INSERT INTO carro_compra(`codigo_usuario`,`cantidad_compra`,`precio_compra`,`estado_compra`,`codigo_metodo_pago`)
VALUES('$codigo','$cantidad','$precio_producto',1,'$pago');";
$resultado = mysqli_query($conexion, $SQLINSERTCARROCOMPRA);

/* Consultamos el ultimo ingreso de la compra */
/* SE DEBE CREAR UN WHERE PARA HACER EL LIMIT 1 CON EL USUARIO CORRESPONDIENTE ESO FALTA ACA*/
$SQLCONSULTAULTIMACOMPRA = "select codigo_compra from carro_compra order by codigo_compra  desc limit 1;";
$resultado = mysqli_query($conexion, $SQLCONSULTAULTIMACOMPRA);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $codigo_compra = $row['codigo_compra'];
}



/* Guardamos en el detalle compra el producto comprado */
$total_pagado = $cantidad * $precio_producto;

$SQLINSERTDETALLECOMPRA = "INSERT INTO detalle_compra(`codigo_compra`,`codigo_producto`,`monto_total`,`fecha_transaccion`)
VALUES('$codigo_compra','$productos','$total_pagado',now());";
$resultado = mysqli_query($conexion, $SQLINSERTDETALLECOMPRA);

echo "<div class='alert alert-success alert-dismissible'>
                  <button type=button class='close data-dismiss=alert aria-hidden=true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Comprado!</h5>
                  Comprado tu juego, Puedes revisar en MIS COMPRAS.
                </div>";
    
    
}



