
function modificarusuario(nombre, apellido, direccion, email, clave,codigo) {

    var dato = {"nombre": nombre,
        "apellido": apellido,
        "direccion": direccion,
        "email": email,
        "clave": clave,
        "codigo":codigo
    };


    $.ajax({
        data: dato,
        url: '../controlador/ModificarUsuario.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").text("procesando.. espere por favor");
        },
        success: function (response) {
            
            $("#resultado").html(response);
        }

    });
}