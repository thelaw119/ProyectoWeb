<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select categorias.nombre_categoria, productos.codigo_producto,
productos.nombre_producto,
productos.descripcion_producto,
productos.precio_producto,
productos.codigo_categoria from productos 
inner join categorias on productos.codigo_categoria = categorias.codigo_categoria";
$resultado = mysqli_query($conexion, $SQL);
?>

<script src="../js/contenido.js"></script>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-7">
                <h2>Gestor de <b>Productos</b></h2>
            </div>

            <div class="col-sm-6"> 

                <a href="#" onclick="javascript:agregarproducto();" class="btn btn-success">Agregar Producto</a>
                <!--<button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Añadir</button>-->    
            </div>
        </div>
        <table id="TablaCategoria" class="table table-striped table-hover">
            <thead>
                <tr>

                    <th>Codigo</th>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Accion</th>
                </tr>
            </thead> 

            <?php
            foreach ($resultado as $row) {

                ?>
                <tbody>

                    <tr>
                        <td><?php echo $row['codigo_producto']; ?></td>
                        <td><?php echo $row['nombre_categoria']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['descripcion_producto']; ?></td>
                        <td><?php echo $row['precio_producto']; ?></td>
                        <td>
                            <button class='btn btn-primary btnEditar'>Editar</button>
                            <button class='btn btn-danger btnBorrar'>Borrar</button>
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>
</div>
