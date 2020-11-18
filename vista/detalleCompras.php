<?php
session_start();
require_once '../conexion/Conexion.php';
/*
 * @autor: Seiko
 */
if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$codigo_usuario = $_POST['codigo'];





$SQL = "select * from  productos join 
          detalle_compra on detalle_compra.codigo_producto = productos.codigo_producto 
         join carro_compra on  detalle_compra.codigo_compra = carro_compra.codigo_compra
         join usuarios on usuarios.codigo_usuario = carro_compra.codigo_usuario
         join metodo_pago on metodo_pago.codigo_metodo_pago=carro_compra.codigo_metodo_pago
         where usuarios.codigo_usuario= '$codigo_usuario'";

$resultado = mysqli_query($conexion, $SQL);
?>


<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title ">Detalle Compras</h3>
    </div>
    <!-- /.card-header -->
 
        <div class="card-body col-sm-12">

            <table class="table table-bordered table-striped" >

                <?php
                foreach ($resultado as $row) {
                    ?>

                    
                    <tbody>
                        <tr>
                            <td>Nombre del Producto</td>
                            <td><?php echo $row['nombre_producto']; ?></td>
                        </tr>
                        <tr>
                            <td>Descripción del Producto</td>
                            <td><?php echo $row['descripcion_producto']; ?></td>
                        </tr>
                        <tr>
                            <td>Precio del Producto</td>
                            <td><?php echo $row['precio_producto']; ?></td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><?php echo $row['cantidad_compra']; ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de la compra</td>
                            <td><?php echo $row['fecha_transaccion']; ?></td>
                        </tr>
                        <tr>
                            <td>Metodo de Pago</td>
                            <td><?php echo $row['nombre_metodo_pago']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Precio Final</b></td>
                            <td><b><?php echo $row['monto_total']; ?></b></td>
                        </tr>      

                        </tr>           					 
                    </tbody>
                    <!--<button type="button" class="btn btn-primary" href="javascript:;" onclick="detallecompras(<?php echo $codigo; ?>)">Detalles</button>-->
                    <!--<a href="#" onclick="javascript:detallecompras();" class="btn btn-success">detalle</a>-->

                <?php } ?>
            </table>
            <br>
    <div class="form-group" align="right">
        <!--<a href="panel.php"  class="btn btn-success">Volver</a>-->
        <button type="button" class="btn btn-success" href="javascript:;" onclick="ccompras(<?php echo $codigo_usuario?>)">Volver</button>

    </div>

</div>
</div>

</form>
</div>
</div>

<div id="resultado"></div>