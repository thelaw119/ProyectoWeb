<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from detalle_eventos";
$resultado = mysqli_query($conexion, $SQL);
?>

<script src="../js/crudevento.js"></script>
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
                <h2>Gestor de <b>Eventos</b></h2>
            </div>
            <!-- <div class="col-sm-6">
                 <a href="#agregarCategoria" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Catalogo</span></a>
             </div>-->
        </div>



        <div class="col-sm-6">  
<a href="#" onclick="javascript:agregarevento();" class="btn btn-success">Agregar Evento</a>        </div>

        <table class="table table-bordered table-striped">
            <tbody>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Codigo de evento</th>
                    <th>Codigo de Usuarios</th>
                    <th>Descripcion</th>
                    <th>fecha inicio</th>
                    <th>fecha termino</th>
                </tr>
            </thead>
                    <?php foreach ($resultado as $row) { ?>
                <tr>
                    
                    <td><?php echo $detalle_evento = $row['codigo_detalle_eventos']; ?></td>
                    <td><?php echo $codigo_evento = $row['codigo_evento']; ?></td>
                    <td><?php echo $codigo_usuario = $row['codigo_usuario']; ?></td>
                    <td><?php echo $descripcion_evento = $row['descripcion_evento']; ?></td>
                    <td><?php echo $inicio_evento = $row['fecha_inicio_evento']; ?></td>
                    <td><?php echo $termino_evento = $row['fecha_termino_evento']; ?></td>
                    
                    <td>
                            
                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="editarevento(<?php echo $detalle_evento;?>);">Editar</button>
                            <button type="button" class="btn btn-danger" href="javascript:;" onclick="eliminarevento(<?php echo $detalle_evento;?>);">Eliminar</button>
                    </td>
                    </tr>

                    <?php } ?>
                    </tbody>
            </table>

        </div>  
    </div> 