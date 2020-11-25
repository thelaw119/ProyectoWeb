<?php
session_start();
require_once '../conexion/Conexion.php';
/*
 * @autor: Seiko
 */
if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from eventos";
$resultado = mysqli_query($conexion, $SQL);
?>



<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Asignar Evento</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form  role="form">



            <div class="form-group">
                <label>Evento</label>
                <select id="evento" name="evento" class="form-control">

                    <?php
                    $html = "<option value='0'>Seleccionar Evento</option>";

                    while ($valores = mysqli_fetch_array($resultado)) {

                        $html .= "<option value='" . $valores['codigo_evento'] . "'>" . $valores['nombre_evento'] . "</option>";
                    }
                    echo $html;
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label>Usuario</label>
                <select id="usuario" name="usuario" class="form-control">

                    <?php
                    $SQL = "select * from usuarios where codigo_perfil = 2";
                    $resultado = mysqli_query($conexion, $SQL);

                    $html = "<option value='0'>Seleccionar Usuario</option>";

                    while ($valores = mysqli_fetch_array($resultado)) {

                        $html .= "<option value='" . $valores['codigo_usuario'] . "'>" . $valores['nombre_usuario'] . "</option>";
                    }
                    echo $html;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Fecha Inicio</label>
                <input class="form-control" type="date" value="" id="fecha_inicio">

            </div>

            <div class="form-group">
                <label >Fecha Termino</label>
                <input class="form-control" type="date" value="" id="fecha_termino">

            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-success" href="javascript:;" onclick="addasigevento($('#evento').val(), $('#usuario').val(), $('#fecha_inicio').val(), $('#fecha_termino').val());return false;">Ingresar</button>
            </div>



        </form>
    </div>
</div>

<div id="resultado"></div>