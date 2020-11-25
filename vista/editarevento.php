<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
 * @autor: Seiko
 */

session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$codigo = $_POST['codigo'];





$SQL = "select * from eventos where codigo_evento = '$codigo'";
$result = mysqli_query($conexion, $SQL);


foreach ($result as $row) {
    //$row['nombre_producto'];
}
$nombre = $row['nombre_evento'];
$descripcion = $row['descripcion_evento'];

?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Evento</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form  role="form">
           

                   
                    <div class="form-group">
                        <label>Nombre Evento </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre de Evento" value="<?php echo $nombre; ?>">
                    </div>


                    <div class="form-group">
                        <label>Descripcion Evento</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Evento"><?php echo $descripcion; ?></textarea>
                        <input type="hidden" id="codigo_evento" name="codigo_evento" value="<?php echo $codigo; ?>" >
                    </div>


                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="updateevento($('#nombre').val(), $('#descripcion').val(), $('#codigo_evento').val());return false;">Actualizar</button>
                    </div>

          

        </form>
    </div>
</div>

<div id="resultado"></div>