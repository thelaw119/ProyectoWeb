

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

function addproducto(categoria,nombre,descripcion,precio) {
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