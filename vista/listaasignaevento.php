<?php

/* 
 * Thelaw 
 */
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select detalle_eventos.codigo_detalle_eventos,eventos.nombre_evento, usuarios.nombre_usuario, detalle_eventos.fecha_inicio_evento, detalle_eventos.fecha_termino_evento
from detalle_eventos
inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario;";

$resultado = mysqli_query($conexion, $SQL);
?>






<div  class="table-wrapper">
    <div class="table-title">



        <div class="row">
            <div class="col-sm-7">
                <h2>Lista de <b>Asigna Eventos</b></h2>
            </div>
            <!-- <div class="col-sm-6">
                 <a href="#agregarCategoria" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Catalogo</span></a>
             </div>-->
        </div>



        <div class="col-sm-6">  
            <a href="#" onclick="javascript:agregarasigevento();" class="btn btn-success">Asigna Evento</a> 
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Codigo Detalle Evento</th>
                    <th>Nombre Evento</th>
                    <th>Nombre Usuario</th>
                    <th>Fecha Inicio Evento</th>
                    <th>Fecha Final Evento</th>
                    <th>Accion</th>
                    
                    
                </tr>
            </thead> 

            <?php
            foreach ($resultado as $row) {

                ?>
                <tbody> 

                    <tr>
                        <td><?php echo $codigo = $row['codigo_detalle_eventos']; ?></td>
                        <td><?php echo $row['nombre_evento']; ?></td>
                        <td><?php echo $row['nombre_usuario']; ?></td>
                        <td><?php echo $row['fecha_inicio_evento']; ?></td>
                        <td><?php echo $row['fecha_termino_evento']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" href="javascript:;" onclick="editasigevento(<?php echo $codigo;?>);">Editar</button>
                            <button type="button" class="btn btn-danger" href="javascript:;" onclick="eliminaasigevento(<?php echo $codigo;?>);">Eliminar</button>
                        </td>
                    </tr>           					 
                </tbody>
            <?php } ?>
        </table>
    </div>  
</div>