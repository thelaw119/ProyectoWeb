<?php



session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from usuarios where codigo_perfil = 2";
$resultado = mysqli_query($conexion, $SQL);
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
                <h2>Lista de <b>Usuarios</b></h2>
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
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Nick</th>
                    
                </tr>
            </thead> 

            <?php
            foreach ($resultado as $row) {

                ?>
                <tbody>

                    <tr>
                        <td><?php echo $codigo = $row['codigo_usuario']; ?></td>
                        <td><?php echo $row['nombre_usuario']; ?></td>
                        <td><?php echo $row['direccion_usuario']; ?></td>
                        <td><?php echo $row['email_usuario']; ?></td>
                        <td><?php echo $row['nick_usuario']; ?></td>
                        <td>
                            
<!--                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="editcategoria(<?php echo $codigo;?>);">Editar</button>
                            <button type="button" class="btn btn-danger" href="javascript:;" onclick="deletecategoria(<?php echo $codigo;?>);">Eliminar</button>-->
                            
<!--                            <button class='btn btn-primary btnEditar'>Editar</button>
                            <button class='btn btn-danger btnBorrar'>Borrar</button>-->
                            <!--<a href="actualiza_categoria.php<?php //$row['codigo_categoria'];   ?>" data-target="#editarCategoria" class="edit" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>-->
                            <!--<a href="#eliminarCategoria" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>-->

                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>  
</div> 