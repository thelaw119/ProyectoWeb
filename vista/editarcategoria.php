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





$SQL = "select * from categorias where codigo_categoria = '$codigo'";
$result = mysqli_query($conexion, $SQL);


foreach ($result as $row) {
    //$row['nombre_producto'];
}
$nombre = $row['nombre_categoria'];
$descripcion = $row['descripcion_categoria'];

?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Categoria</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form  role="form">
            <div class="row">
                <div class="col-sm-6">

                   
                    <div class="form-group">
                        <label>Nombre Categoria </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                    </div>


                    <div class="form-group">
                        <label>Descripcion Categoria</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Producto"><?php echo $descripcion; ?></textarea>
                        <input type="hidden" id="codigo_categoria" name="codigo_categoria" value="<?php echo $codigo; ?>" >
                    </div>


                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="updatecategoria($('#nombre').val(), $('#descripcion').val(), $('#codigo_categoria').val());return false;">Actualizar</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

<div id="resultado"></div>