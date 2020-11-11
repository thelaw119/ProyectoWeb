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

<script src="../js/crudproducto.js"></script>

<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-7">
                <h2>Gestor de <b>Productos</b></h2>
            </div>

            <div class="col-sm-6">            
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Añadir</button>    
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


    <!--Editar Categoria-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="actualizar_producto">    
                    <div class="modal-body">
                        <div class="form-group">
                            <?php 
                            
                            $SQL = "select * from categorias";
                            $resultado = mysqli_query($conexion, $SQL);
                            
                            ?>
                            
                            <label for="nombre" class="col-form-label">Categoria:</label>
                            
                            
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Producto:</label>
                            <input type="text" class="form-control" id="producto">
                        </div>
                        <div class="form-group">
                            <label for="pais" class="col-form-label">Descripcion:</label>
                            <input type="textarea" class="form-control" id="descripcion">
                        </div>    
                        <div class="form-group">
                            <label for="pais" class="col-form-label">Precio:</label>
                            <input type="textarea" class="form-control" id="precio">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div> 