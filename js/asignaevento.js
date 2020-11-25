/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function agregarasigevento() {
    var detener = 2500;
    $.ajax({
        type: "get",
        url: "../vista/agregaasigevento.php",
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


function addasigevento(evento, usuario, fecha_inicio, fecha_termino) {
    var detener = 2500;
    let datos = {

        "evento": evento,
        "usuario": usuario,
        "fecha_inicio": fecha_inicio,
        "fecha_termino": fecha_termino

    };
    $.ajax({
        data: datos,
        url: '../controlador/AgregarAsigEvento.php',
        type: 'POST',
        beforeSend: function () {
            $('#resultado').html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            setTimeout(function () {
                $("#resultado").html(response);

                $('#nombre').val('');
                $('#descripcion').val('');

            }, detener
                    );
        }
    });
}



function editasigevento(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/editaasigevento.php",
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


function updateevento(evento, usuario, fecha_inicio, fecha_termino, codigo) {

    var detener = 2500;
    let datos = {

        "evento": evento,
        "usuario": usuario,
        "fecha_inicio": fecha_inicio,
        "fecha_termino": fecha_termino,
        "codigo": codigo
    };
    $.ajax({
        data: datos,
        url: '../controlador/UpdateAsigEvento.php',
        type: 'POST',
        beforeSend: function () {
            $('#resultado').html('<center><img  src="../img/loading/carga.svg" alt="carga" /></center>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            setTimeout(function () {
                $("#resultado").html(response);

                $('#nombre').val('');
                $('#descripcion').val('');

            }, detener
                    );
        }
    });
}


function eliminaasigevento(codigo) {

    dato = {
        "codigo": codigo
    };

    var respuesta = confirm("¿Está seguro de borrar el registro "+codigo+"?");

    if (respuesta == true){

    $.ajax({
        data: dato,
        url:'../controlador/Eliminaasigevento.php',
        type:'POST',
        
        
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            
                $("#contenido").load('../vista/listaasignaevento.php');
       
        }
        
    });
    
   }else{
       
   }
}