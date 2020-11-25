<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from categorias";
$resultado = mysqli_query($conexion, $SQL);

$codigo_usuario = $_POST['codigo'];
?>

<!-- Iniciamos el segmento de codigo javascript -->
<script type="text/javascript">
    $(document).ready(function () {
        var discos = $('#productos');
//        var disco_sel = $('#disco_sel');

        //Ejecutar accion al cambiar de opcion en el select de las bandas
        $('#categoria').change(function () {
            var banda_id = $(this).val(); //obtener el id seleccionado

            if (banda_id !== '') { //verificar haber seleccionado una opcion valida

                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {banda_id: banda_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'obtengoproducto_ajax.php' //url que recibe las variables
                }).done(function (data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion             

                    discos.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                    discos.prop('disabled', false); //habilitar el select
                });
                /*fin de llamada ajax*/

            } else { //en caso de seleccionar una opcion no valida
                discos.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
                discos.prop('disabled', true); //deshabilitar el select
            }
        });


        //mostrar una leyenda con el disco seleccionado
//        $('#productos').change(function(){
//          $('#disco_sel').html($(this).val() + ' - ' + $('#productos option:selected').text());
//        });

    });
</script> 

<script type="text/javascript">
    $(document).ready(function () {
        var discos = $('#precios');
//        var disco_sel = $('#disco_sel');

        //Ejecutar accion al cambiar de opcion en el select de las bandas
        $('#categoria').change(function () {
            var banda_id = $(this).val(); //obtener el id seleccionado

            if (banda_id !== '') { //verificar haber seleccionado una opcion valida

                /*Inicio de llamada ajax*/
                $.ajax({
                    data: {banda_id: banda_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
                    dataType: 'html', //tipo de datos que esperamos de regreso
                    type: 'POST', //mandar variables como post o get
                    url: 'obtengoproductoprecio_ajax.php' //url que recibe las variables
                }).done(function (data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion             

                    discos.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
                    discos.prop('disabled', false); //habilitar el select
                });
                /*fin de llamada ajax*/

            } else { //en caso de seleccionar una opcion no valida
                discos.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
                discos.prop('disabled', true); //deshabilitar el select
            }
        });


        //mostrar una leyenda con el disco seleccionado
//        $('#productos').change(function(){
//          $('#disco_sel').html($(this).val() + ' - ' + $('#productos option:selected').text());
//        });

    });
</script> 

<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">Comprar Producto</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form role="form">


            <label>Categorias</label>
            <select id="categoria" name="categoria" class="form-control">

                <option value="">- Seleccione Categorias -</option>
                <?php foreach ($resultado as $op): //llenar las opciones del primer select  ?>
                    <option value="<?= $op['codigo_categoria'] ?>"><?= $op['nombre_categoria'] ?></option>  
                <?php endforeach; ?>

            </select>


            <br/><br/>
            <label>Productos</label>
            <select id="productos"name="productos" disabled="" class="form-control">
                <option value="">- Seleccione Productos-</option>
            </select>

            <br/><br/>
            <label>Cantidad</label>
            <select id="cantidad" name="cantidad" class="form-control">
                <option value="">- Seleccione Cantidad-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <br/><br/>
            <!--            <label>Productos</label>
                        <select id="precios" disabled="" class="form-control">
                            <option value="">- Precio-</option>
                        </select>
            
                        <br/><br/>-->

            <label>Forma Pago</label>

            <?php
            $SQL = "select * from metodo_pago";
            $resultado = mysqli_query($conexion, $SQL);
            ?>

            <select id="pago" name="pago" class="form-control">

                <option value="">- Seleccione Categorias -</option>
                <?php foreach ($resultado as $op): //llenar las opciones del primer select   ?>
                    <option value="<?= $op['codigo_metodo_pago'] ?>"><?= $op['nombre_metodo_pago'] ?></option>  
                <?php endforeach; ?>

            </select>

            <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo_usuario; ?>">
            <br/><br/><br/><br/>
            <div class="form-group">
                <button type="submit" class="btn btn-success" href="javascript:;" onclick="addcarrito($('#codigo').val(), $('#cantidad').val(), $('#productos').val(), $('#pago').val());return false;">Comprar</button>
            </div>

        </form>

    </div>
</div>


<div id="resultado"></div>


