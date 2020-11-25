<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
 * @autor: Thelaw
 */

session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$codigo = $_POST['codigo'];


$SQL = "select eventos.nombre_evento, usuarios.nombre_usuario, detalle_eventos.fecha_inicio_evento, detalle_eventos.fecha_termino_evento 
from detalle_eventos 
inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario
where codigo_detalle_eventos = '$codigo'";
$result = mysqli_query($conexion, $SQL);


foreach ($result as $row) {
    //$row['nombre_producto'];
}
$codigo_evento = $row['nombre_evento'];
$codigo_usuario = $row['nombre_usuario'];
$fecha_inicio_evento = $row['fecha_inicio_evento'];
$fecha_termino_evento = $row['fecha_termino_evento'];

//var_dump($codigo_evento,$codigo_usuario,$fecha_inicio_evento,$fecha_termino_evento);
//
//die();
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edita Asignado de Eventos</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form  role="form">

            <div class="form-group">
                <label>Nombre Evento Asignado Actual</label>
                <input type="text" class="form-control"  value="<?php echo $codigo_evento; ?>" disabled="">
            </div>


            <div class="form-group">
                <?php $SQL = "select * from eventos";
                $resultado = mysqli_query($conexion, $SQL);
                ?>
                <label>Evento</label>
                <select id="evento" name="evento" class="form-control">

                    <?php
                    $html = "<option value=''>Seleccionar Evento</option>";

                    while ($valores = mysqli_fetch_array($resultado)) {

                        $html .= "<option value='" . $valores['codigo_evento'] . "'>" . $valores['nombre_evento'] . "</option>";
                    }
                    echo $html;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Usuario Asignado Actual</label>
                <input type="text" class="form-control"  value="<?php echo $codigo_usuario; ?>" disabled="">
            </div>

            <div class="form-group">
                <label>Usuario</label>
                <select id="usuario" name="usuario" class="form-control">

                    <?php
                    $SQL = "select * from usuarios where codigo_perfil = 2";
                    $resultado = mysqli_query($conexion, $SQL);

                    $html = "<option value=''>Seleccionar Usuario</option>";

                    while ($valores = mysqli_fetch_array($resultado)) {

                        $html .= "<option value='" . $valores['codigo_usuario'] . "'>" . $valores['nombre_usuario'] . "</option>";
                    }
                    echo $html;
                    ?>
                </select>
            </div>
            
            
            <div class="form-group">
                <label>Fecha Inicio Asignado Actual</label>
                <input type="text" class="form-control"  value="<?php echo $fecha_inicio_evento; ?>" disabled="">
            </div>
            
            <div class="form-group">
                <label>Fecha Inicio</label>
                <input class="form-control" type="date" value="" id="fecha_inicio">

            </div>
            
            <div class="form-group">
                <label>Fecha Inicio Asignado Actual</label>
                <input type="text" class="form-control"  value="<?php echo $fecha_termino_evento; ?>" disabled="">
            </div>

            <div class="form-group">
                <label >Fecha Termino</label>
                <input class="form-control" type="date" value="" id="fecha_termino">

            </div>

            <input type="hidden" id="codigo" value="<?php echo $codigo;?>">

            <div class="form-group">
                <button type="submit" class="btn btn-success" href="javascript:;" onclick="updateevento($('#evento').val(), $('#usuario').val(), $('#fecha_inicio').val(), $('#fecha_termino').val(), $('#codigo').val());return false;">Ingresar</button>
            </div>



        </form>
    </div>
</div>

<div id="resultado"></div>