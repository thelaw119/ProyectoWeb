
function modificarusuario(nombre, apellido, direccion, email, clave, codigo) {

    var datos = {"nombre": nombre,
        "apellido": apellido,
        "direccion": direccion,
        "email": email,
        "clave": clave,
        "codigo":codigo
    };


    $.ajax({
        data: datos,
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

