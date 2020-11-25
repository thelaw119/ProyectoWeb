function addcarrito(codigo, cantidad, productos, pago) {
    var detener = 2500;
    let datos = {

        "codigo": codigo,
        "cantidad": cantidad,
        "productos": productos,
        "pago": pago
    };
    $.ajax({
        data: datos,
        url: '../controlador/AgregarCompra.php',
        type: 'POST',
        beforeSend: function () {
            $('#resultado').html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            setTimeout(function () {
                $("#resultado").html(response);
                $('#categoria').val('');
                $('#nombre').val('');
                $('#descripcion').val('');
                $('#precio').val('');
            }, detener
                    );
        }
    });
}