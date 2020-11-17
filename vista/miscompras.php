
<?php



session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select codigo_categoria,nombre_categoria,descripcion_categoria from detalle_compra";
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
                <h2>Gestor de <b>Categoria</b></h2>
            </div>
          
        </div>



        <div class="col-sm-6">  
            <a href="#" onclick="javascript:agregarcategoria();" class="btn btn-success">Agregar Categoria</a>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Codigo_factura</th>
                    <th>Nombre_producto</th>
                    <th>Descripcion</th>
                    <th>total</th>
                    <th>fecha</th>
                    <th>cod_autorizacion</th>
                </tr>
            </thead> 

            <?php
            foreach ($resultado as $row) {


                ?>
                <tbody>

                    <tr>
                        <td><?php echo $codigo = $row['codigo_categoria']; ?></td>
                        <td><?php echo $row['nombre_categoria']; ?></td>
                        <td><?php echo $row['descripcion_categoria']; ?></td>
                        <td>
                            
                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="editcategoria(<?php echo $codigo;?>);">Editar</button>
                            <button type="button" class="btn btn-danger" href="javascript:;" onclick="deletecategoria(<?php echo $codigo;?>);">Eliminar</button>
                            
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>

    </div>  
</div> 