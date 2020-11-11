<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select codigo_categoria,nombre_categoria,descripcion_categoria from categorias";
$resultado = mysqli_query($conexion, $SQL);
?>

<script src="../js/editarcrud.js"></script>

<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-7">
                <h2>Gestor de <b>Categoria</b></h2>
            </div>
           <!-- <div class="col-sm-6">
                <a href="#agregarCategoria" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Catalogo</span></a>
            </div>-->
           
      
            <div class="col-sm-6">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Añadir</button>    
  
        </div>
    </div>
    <table id="TablaCategoria" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
        </thead> 

<?php
 foreach($resultado as $row) {

/*while ($fila = mysqli_fetch_array($resultado)) */
    
//            $datos = $row["codigo_categoria"]."||".
//                    $row["nombre_categoria"]."||".
//                    $row["descripcion_categoria"];
    ?>
            <tbody>

                <tr>
                    <td><?php /*echo $fila[0]; */ echo $row['codigo_categoria']; ?></td>
                    <td><?php /*echo $fila[1]; */ echo $row['nombre_categoria'];  ?></td>
                    <td><?php /*echo $fila[2]; */ echo $row['descripcion_categoria'];  ?></td>
                    <td>
                        <button class='btn btn-primary btnEditar'>Editar</button>
                        <button class='btn btn-danger btnBorrar'>Borrar</button>
                        <!--<a href="<?php //echo $x = $fila[0]; ?>" data-target="#editarCategoria" class="edit" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>-->
                        <!--<a href="#eliminarCategoria" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>-->
                       
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
        <form id="actualizar_categoria">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Categoria:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="pais" class="col-form-label">Descripcion:</label>
                <input type="textarea" class="form-control" id="descripcion">
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










<!-- Agrego la Categoria 
<div id="agregarCategoria" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">           
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">Agregar Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" id="descripcion" class="form-control" required>
                    </div>				
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" href="javascript:;" onclick="Guardar_categoria($('#nombre').val(), $('#descripcion').val());"  class="btn btn-success" value="Agregar">
                </div>

                <div id="resultado"></div>

            </form>
        </div>
    </div>
</div>
 -->


<!-- Edito la Categoria  no funciona
<div id="editarCategoria" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="">
                <div class="modal-header">						
                    <h4 class="modal-title">Editar Categoria</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="ednombre" name="ednombre" value="" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" id="eddescripcion" name="eddescripcion" class="form-control" required>
                    </div>				
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                    <input type="hidden" id="id" name="id">
                </div>
            </form>
        </div>
    </div>
</div>-->

<!-- Delete Modal HTML 
<div id="eliminarCategoria" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
-->
