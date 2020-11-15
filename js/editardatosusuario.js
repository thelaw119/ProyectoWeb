

function modificarusuario(nombre, apellido, direccion, email, clave, codigo) {
    let parametros = {
        "nombre": nombre,
        "apellido": apellido,
        "direccion": direccion,
        "email": email,
        "clave": clave,
        "codigo": codigo
    };
    $.ajax({
        data: parametros, //datos que se envian a traves de ajax
        url: '../controlador/ModificarUsuario.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#resultado").html(response);
        }
    });
}













//function modificarusuario(nombre, apellido, direccion, email, clave, codigo) {
//
//
//alert("LLEGO");
////    var datos = {"nombre": nombre,
////        "apellido": apellido,
////        "direccion": direccion,
////        "email": email,
////        "clave": clave,
////        "codigo":codigo
////    };
////
////
////    $.ajax({
////        data: datos,
////        url: '../controlador/ModificarUsuario.php',
////        type: 'POST',
////        beforeSend: function () {
////            $("#resultado").text("procesando.. espere por favor");
////        },
////        success: function (response) {
////            
////            $("#resultado").html(response);
////            $("")
////        }
//
//    };
