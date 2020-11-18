
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

$SQL = "select * from  productos join "
        ." detalle_compra on detalle_compra.codigo_producto = productos.codigo_producto "
        ."join carro_compra on  detalle_compra.codigo_compra = carro_compra.codigo_compra"
        ."join usuarios on usuarios.codigo_usuario = carro_compra.codigo_usuario"
        ."where usuarios.codigo_usuario= '$codigo_usuario'";


$resultado = mysqli_query($conexion, $SQL);
$result = $resultado -> fetch();

var_dump($result);
?>

<!--<script src="../js/editarcrud.js"></script>-->
<!--<script src="../js/crudcategoria.js"></script>-->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>





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
            foreach ($resultado as $row) {
                ?>
                <?php $codigo = $row['codigo_usuario'] ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['numero_orden_pedido']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $codigo_producto = $row['codigo_producto']; ?></td>
                        <td>$<?php echo $row['monto_total']; ?></td>
                        <td><?php echo $row['fecha_transaccion']; ?></td>
                        <td>
                            
                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="detallecompras(<?php echo $codigo;?>)">Detalles</button>
                            <!--<a href="#" onclick="javascript:detallecompras();" class="btn btn-success">detalle</a>-->
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>  
</div> 