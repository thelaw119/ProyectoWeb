function gestionproducto() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/gestionproductos.php",
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

function gestioncategoria() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/gestioncategoria.php",
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

function generarevento() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/listaevento.php",
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

function vercompras() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/listacompras.php",
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

function verusuarios() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/listausuario.php",
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


function asignaevento() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/listaasignaevento.php",
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