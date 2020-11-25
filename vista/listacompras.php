<?php

/* 
 * Thelaw
 */

session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select usuarios.nombre_usuario, productos.nombre_producto, 
    carro_compra.cantidad_compra, carro_compra.precio_compra, 
    detalle_compra.monto_total, detalle_compra.codigo_factura 
    from detalle_compra
inner join carro_compra on detalle_compra.codigo_compra = carro_compra.codigo_compra
inner join usuarios on carro_compra.codigo_usuario = usuarios.codigo_usuario 
inner join productos on detalle_compra.codigo_producto = productos.codigo_producto";

$resultado = mysqli_query($conexion, $SQL);
?>






<div  class="table-wrapper">
    <div class="table-title">



        <div class="row">
            <div class="col-sm-7">
                <h2>Lista de <b> Compras de Usuarios</b></h2>
            </div>
            <!-- <div class="col-sm-6">
                 <a href="#agregarCategoria" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Catalogo</span></a>
             </div>-->
        </div>



<!--        <div class="col-sm-6">  
            <a href="#" onclick="javascript:agregarcategoria();" class="btn btn-success">Agregar Categoria</a>
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Añadir</button>    
        </div>-->

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre Usuario</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad Producto</th>
                    <th>Precio Unitario Compra</th>
                    <th>Monto Total</th>
                    <th>Codigo Factura</th>
                    
                    
                </tr>
            </thead> 

            <?php
            foreach ($resultado as $row) {

                ?>
                <tbody> 

                    <tr>
                        <td><?php echo $codigo = $row['nombre_usuario']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['cantidad_compra']; ?></td>
                        <td><?php echo $row['precio_compra']; ?></td>
                        <td><?php echo $row['monto_total']; ?></td>
                        <td><?php echo $row['codigo_factura']; ?></td>
                        <td>
                            
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>  
</div> 
