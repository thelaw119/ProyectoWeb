/*
 * @autor: Seiko
 */

function detallecompras(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/detalleCompras.php",
        beforeSend: function () {
            $('#contenido').html('<div class="loading" align="center">\n\
                <img src="../img/loading/cargando.gif" alt="loading" />\n\
                <br/>Un momento, por favor...</div>');
        },
        success: function (data) {
            setTimeout(function () {
                $('#contenido').html(data);
            }, detener
                    );
        }
    });
}



