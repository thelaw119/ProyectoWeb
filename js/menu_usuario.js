/* 
 * Autor: seiko
 */


function perfilusuario() {
    var detener = 2500;

    $.ajax({
        type: "POST",
        url: "../vista/perfil_usuario.php",
        beforeSend: function () {
            $('#contenido').html('<div class="loading" align="center"><img src="../img/loading/cargando.gif" alt="loading" /><br/>Un momento, por favor...</div>');

        },

        success: function (data) {
            setTimeout(function () {
                $('#contenido').html(data);
            }, detener
                    );
        }
    });
}

function ccompras(codigo) {

 

    var detener = 2500;

    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/miscompras.php",
        beforeSend: function () {
            $('#contenido').html('<div class="loading" align="center"><img src="../img/loading/cargando.gif" alt="loading" /><br/>Un momento, por favor...</div>');

        },

        success: function (data) {
            setTimeout(function () {
                $('#contenido').html(data);
            }, detener
                    );
        }
    });
}





function Guardar_categoria(nombre, descripcion) {

    var datos = {
        "nombre": nombre,
        "descripcion": descripcion
    };

    $.ajax({
        data: datos,
        url: '../controlador/GuardarCategoria.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor");
        },

        success: function (response) {

            $("#resultado").html(response);

        }
    });

}

function productos(codigo) {
    var detener = 2500;

    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/productos.php",
        beforeSend: function () {
            $('#contenido').html('<div class="loading" align="center"><img src="../img/loading/cargando.gif" alt="loading" /><br/>Un momento, por favor...</div>');

        },

        success: function (data) {
            setTimeout(function () {
                $('#contenido').html(data);
            }, detener
                    );
        }
    });
}
