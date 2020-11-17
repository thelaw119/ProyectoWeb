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


$SQL = "select * from categorias";
$resultado = mysqli_query($conexion, $SQL);



$pro = "select * from productos where codigo_producto = '$codigo'";
$result = mysqli_query($conexion, $pro);


foreach ($result as $row) {
    //$row['nombre_producto'];
}
$nombre = $row['nombre_producto'];
$descripcion = $row['descripcion_producto'];
$precio = $row['precio_producto'];
$codigo_cat = $row['codigo_categoria'];
//var_dump($row['nombre_producto']);
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar Productos</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form  role="form">
            <div class="row">
                <div class="col-sm-6">

                    <?php
                    $cate = "select * from categorias where codigo_categoria = '$codigo_cat'";
                    $resultcate = mysqli_query($conexion, $cate);


                    foreach ($resultcate as $row) {

                    }
                    $cat = $row['nombre_categoria'];

                    ?>
                    <div class="form-group">
                        <label>Nombre Categoria Actual</label>
                        <input type="text" class="form-control"  value="<?php echo $cat; ?>" disabled="">
                    </div>


                    <div class="form-group">
                        <label>Categorias Editar</label>
                        <select id="categoria" name="categoria" class="form-control">

                                <?php
                                $html = "<option value='0'>Seleccionar Categoria</option>";

                                while ($valores = mysqli_fetch_array($resultado)) {

                                    $html .= "<option value='" . $valores['codigo_categoria'] . "'>" . $valores['nombre_categoria'] . "</option>";
                                }
                                echo $html;
                                ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Nombre Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"  value="<?php echo $nombre; ?>" placeholder="Ingrese Nombre Producto">
                    </div>

                    <div class="form-group">
                        <label>Descripcion Producto</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Producto"><?php echo $descripcion; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Precio Producto</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $precio; ?>" placeholder="Agregar Precio">
                        <input type="hidden" id="codigo_producto" name="codigo_producto" value="<?php echo $codigo; ?>" >
                    </div>

                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="updateproducto($('#categoria').val(), $('#nombre').val(), $('#descripcion').val(), $('#precio').val(), $('#codigo_producto').val());return false;">Actualizar</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

<div id="resultado"></div>