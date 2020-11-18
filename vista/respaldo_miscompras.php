
<?php
/*
 * @autor: Seiko
 */

session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$codigo_usuario = $_POST['codigo'];

//$SQL = "select * from detalle_compra
//inner join carro_compra on detalle_compra.codigo_compra = carro_compra.codigo_compra
//inner join usuarios on carro_compra.codigo_usuario = usuarios.codigo_usuario 
//inner join productos on detalle_compra.codigo_producto = productos.codigo_producto where usuarios.codigo_usuario = '$codigo_usuario'";


$SQL = "select * from  productos join 
          detalle_compra on detalle_compra.codigo_producto = productos.codigo_producto 
         join carro_compra on  detalle_compra.codigo_compra = carro_compra.codigo_compra
         join usuarios on usuarios.codigo_usuario = carro_compra.codigo_usuario
         where usuarios.codigo_usuario= '$codigo_usuario'";


$resultado = mysqli_query($conexion, $SQL);

//$row = $resultado->fetch_assoc();
//$result = $resultado -> fetch();
//
//var_dump($row);
//die();
?>



<div  class="table-wrapper">
    <div class="table-title">



        <div class="row">
            <div class="col-sm-7">
                <h2>Gestor de <b>Compras</b></h2>
            </div>

        </div>



        <div class="col-sm-6">  
            <!--<a href="#" onclick="javascript:agregarcategoria();" class="btn btn-success">Agregar Categoria</a>-->
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Numero de orden</th>
                    <th>Nombre producto</th>
                    <th>Codigo producto</th>                    
                    <th>Total Monto</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead> 

            <?php
            
            while ($fila = mysqli_fetch_array($resultado)) {
                
                ?>
            
            
                <tbody>
                    <tr>
                        <td><?php echo $fila['numero_orden_pedido']; ?></td>
                        <td><?php echo $fila['nombre_producto']; ?></td>
                        <td><?php echo $fila['codigo_producto']; ?></td>
                        <td>$<?php echo $fila['monto_total']; ?></td>
                        <td><?php echo $fila['fecha_transaccion']; ?></td>
                        <td>

                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="detallecompras(<?php echo $codigo; ?>)">Detalles</button>
                            <!--<a href="#" onclick="javascript:detallecompras();" class="btn btn-success">detalle</a>-->
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>  
</div> 