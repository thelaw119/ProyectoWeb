/*
 * @autor: Thelaw
 */
function agregarproducto() {
    var detener = 2500;
    $.ajax({
        type: "get",
        url: "../vista/agregarproductos.php",
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

function addproducto(categoria, nombre, descripcion, precio) {
    var detener = 2500;
    let datos = {

        "categoria": categoria,
        "nombre": nombre,
        "descripcion": descripcion,
        "precio": precio
    };
    $.ajax({
        data: datos,
        url: '../controlador/AgregarProductos.php',
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


function editproducto(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/editarproducto.php",
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

function editproducto(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/editarproducto.php",
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


function updateproducto(categoria, nombre, descripcion, precio, codigo_producto) {
    var detener = 2500;
    let datos = {

        "categoria": categoria,
        "nombre": nombre,
        "descripcion": descripcion,
        "precio": precio,
        "codigo_producto": codigo_producto
    };
    $.ajax({
        data: datos,
        url: '../controlador/UpdateProductos.php',
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

function deleteproducto(codigo) {

    dato = {
        "codigo": codigo
    };

    var respuesta = confirm("¿Está seguro de borrar el registro "+codigo+"?");

    if (respuesta == true){

    $.ajax({
        data: dato,
        url:'../controlador/EliminarProducto.php',
        type:'POST',
        
        
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            
                $("#contenido").load('../vista/gestionproductos.php');
       
        }
        
    });
    
   }else{
       
   }
}













//    var respuesta = confirm("¿Está seguro de borrar el registro "+codigo+"?");
//    
//    if (respuesta == true){
//        
//        
//        
//        
//        
//        
//        
//        
//        
//        
//    }else{
//        alert("Invalido");
//    }


//    var detener = 2500;
//   
//    $.ajax({
//        type: "post",
//        data: 'codigo='+codigo,
//        url: "../controlador/editarproducto.php",
//        beforeSend: function () {
//            $('#contenido').html('<div class="loading" align="center"><img src="../img/loading/cargando.gif" alt="loading" /><br/>Un momento, por favor...</div>');
//            
//        },
//
//        success: function (data) {
//            setTimeout(function () {
//                $('#contenido').html(data);
//                
//            }, detener
//                    );
//        }
//    });
//}