/*
 * @autor: Seiko
 */

function detallecompras(factura) {
    var detener = 2500;
    
//    var datos = {
//        
//        "factura" : factura,
//        "codigo" : codigo
//   
//    };
    
    
    
    $.ajax({
        type: "post",
        data: 'factura=' + factura,
//        data: datos,
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



