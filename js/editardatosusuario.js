

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
            $("#resultado").html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
            //$('#contenido').html('<div class="loading" align="center"><img src="../img/loading/12.svg" alt="loading" /><br/>Un momento, por favor...</div>');
            //$('#contenido').html('<div class="loading" align="center"><br/>Un momento, por favor...</div>');
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
