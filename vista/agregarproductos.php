<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from categorias";
$resultado = mysqli_query($conexion, $SQL);
?>



<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Agregar Productos</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        <form  role="form">
            
                    
                    <div class="form-group">
                        <label>Categorias</label>
                        <select id="categoria" name="categoria" class="form-control">

                            <?php
                            $html = "<option id='cat' name='cat' value='0'>Seleccionar Categoria</option>";

                            while ($valores = mysqli_fetch_array($resultado)) {
                                
                                $html .= "<option value='" . $valores['codigo_categoria'] . "'>" . $valores['nombre_categoria'] . "</option>";
                            }
                            echo $html;
                            ?>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Nombre Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre Producto">
                    </div>

                    <div class="form-group">
                        <label>Descripcion Producto</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Producto"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Precio Producto</label>
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="Agregar Precio" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="addproducto($('#categoria').val(), $('#nombre').val(), $('#descripcion').val(), $('#precio').val());return false;">Agregar</button>
                    </div>
                    
                
          

        </form>
    
</div>
</div>

<div id="resultado"></div>