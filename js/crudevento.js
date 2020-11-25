/*
 * @autor: Seiko
 */

function eliminarevento(codigo) {

    dato = {
        "codigo": codigo
    };

    var respuesta = confirm("¿Está seguro de borrar el registro " + codigo + "?");

    if (respuesta == true) {

        $.ajax({
            data: dato,
            url: '../controlador/EliminarEvento.php',
            type: 'POST',

            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

                $("#contenido").load('../vista/listaevento.php');

            }

        });

    } else {

    }
}
function agregarevento() {
    var detener = 2500;
    $.ajax({
        type: "get",
        url: "../vista/agregarevento.php",
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
function addevento(nombre, descripcion) {
    var detener = 2500;
    let datos = {

        "nombre": nombre,
        "descripcion": descripcion

    };
    $.ajax({
        data: datos,
        url: '../controlador/AgregarEvento.php',
        type: 'POST',
        beforeSend: function () {
            $('#resultado').html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            setTimeout(function () {
                $("#resultado").html(response);

                $('#nombre').val('');
                $('#descripcion').val('');

            }, detener
                    );
        }
    });
}

function updateevento(nombre, descripcion,codigo_evento) {

    var detener = 2500;
    let datos = {

        "nombre": nombre,
        "descripcion": descripcion,
        "codigo_evento": codigo_evento
    };
    $.ajax({
        data: datos,
        url: '../controlador/UpdateEvento.php',
        type: 'POST',
        beforeSend: function () {
            $('#resultado').html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            setTimeout(function () {
                $("#resultado").html(response);

//                $('#nombre').val('');
//                $('#descripcion').val('');

            }, detener
                    );
        }
    });
}
function editarevento(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/editarevento.php",
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