/*
 * @autor: Thelaw
 */
function agregarcategoria() {
    var detener = 2500;
    $.ajax({
        type: "get",
        url: "../vista/agregarcategoria.php",
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

function addcategoria(nombre, descripcion) {
    var detener = 2500;
    let datos = {

        
        "nombre": nombre,
        "descripcion": descripcion

    };
    $.ajax({
        data: datos,
        url: '../controlador/AgregarCategoria.php',
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


//function editproducto(codigo) {
//    var detener = 2500;
//    $.ajax({
//        type: "post",
//        data: 'codigo=' + codigo,
//        url: "../vista/editarproducto.php",
//        beforeSend: function () {
//            $('#contenido').html('<div class="loading" align="center"><img src="../img/loading/cargando.gif" alt="loading" /><br/>Un momento, por favor...</div>');
//        },
//        success: function (data) {
//            setTimeout(function () {
//                $('#contenido').html(data);
//            }, detener
//                    );
//        }
//    });
//}

function editcategoria(codigo) {
    var detener = 2500;
    $.ajax({
        type: "post",
        data: 'codigo=' + codigo,
        url: "../vista/editarcategoria.php",
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


function updatecategoria(nombre, descripcion, codigo_categoria) {
    
    var detener = 2500;
    let datos = {

        "nombre": nombre,
        "descripcion": descripcion,
        "codigo_categoria": codigo_categoria
    };
    $.ajax({
        data: datos,
        url: '../controlador/UpdateCategoria.php',
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

function deletecategoria(codigo) {

    dato = {
        "codigo": codigo
    };

    var respuesta = confirm("¿Está seguro de borrar el registro "+codigo+"?");

    if (respuesta == true){

    $.ajax({
        data: dato,
        url:'../controlador/EliminaCategoria.php',
        type:'POST',
        
        
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            
                $("#contenido").load('../vista/gestioncategoria.php');
       
        }
        
    });
    
   }else{
       
   }
}




////$(document).ready(function() {
//var id, opcion;
//opcion = 4;
//    
//tablaUsuarios = $('#TablaCategoria').DataTable({  
//    "ajax":{            
//        "url": "../controlador/ModificarCategoria.php", 
//        "method": 'POST', //usamos el metodo POST
//        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
//        "dataSrc":""
//    },
//    "columns":[
//        {"data": "codigo_categoria"},
//        {"data": "nombre_categoria"},
//        {"data": "descripcion_categoria"},
//        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
//    ]
//});     
//
//var fila; //captura la fila, para editar o eliminar
////submit para el Alta y Actualización
//$('#categoria').submit(function(e){                         
//    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
//    username = $.trim($('#username').val());    
//    first_name = $.trim($('#first_name').val());
//    last_name = $.trim($('#last_name').val());    
//    gender = $.trim($('#gender').val());    
//    password = $.trim($('#password').val());
//    status = $.trim($('#status').val());                            
//        $.ajax({
//          url: "bd/crud.php",
//          type: "POST",
//          datatype:"json",    
//          data:  {user_id:user_id, username:username, first_name:first_name, last_name:last_name, gender:gender, password:password ,status:status ,opcion:opcion},    
//          success: function(data) {
//            tablaUsuarios.ajax.reload(null, false);
//           }
//        });			        
//    $('#modalCRUD').modal('hide');											     			
//});
//        
// 
//
////para limpiar los campos antes de dar de Alta una Persona
//$("#btnNuevo").click(function(){
//    opcion = 1; //alta           
//    id=null;
//    $("#categoria").trigger("reset");
//    $(".modal-header").css( "background-color", "#17a2b8");
//    $(".modal-header").css( "color", "white" );
//    $(".modal-title").text("Alta de Usuario");
//    $('#modalCRUD').modal('show');	    
//});
//
////Editar        
//$(document).on("click", ".btnEditar", function(){		        
//    opcion = 2;//editar
//    fila = $(this).closest("tr");	        
//    user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
//    username = fila.find('td:eq(1)').text();
//    first_name = fila.find('td:eq(2)').text();
//    last_name = fila.find('td:eq(3)').text();
//    gender = fila.find('td:eq(4)').text();
//    password = fila.find('td:eq(5)').text();
//    status = fila.find('td:eq(6)').text();
//    $("#username").val(username);
//    $("#first_name").val(first_name);
//    $("#last_name").val(last_name);
//    $("#gender").val(gender);
//    $("#password").val(password);
//    $("#status").val(status);
//    $(".modal-header").css("background-color", "#007bff");
//    $(".modal-header").css("color", "white" );
//    $(".modal-title").text("Editar Usuario");		
//    $('#modalCRUD').modal('show');		   
//});
//
////Borrar
//$(document).on("click", ".btnBorrar", function(){
//    fila = $(this);           
//    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
//    opcion = 3; //eliminar        
//    var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
//    if (respuesta) {            
//        $.ajax({
//          url: "bd/crud.php",
//          type: "POST",
//          datatype:"json",    
//          data:  {opcion:opcion, user_id:user_id},    
//          success: function() {
//              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
//           }
//        });	
//    }
// });
//     
//});    