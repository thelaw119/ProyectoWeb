




















////$(document).ready(function(){
//
//    var id, opcion;
//    opcion =4;
//    
//    TablaCategoria = $('#TablaCategoria').DataTable({  
//    "ajax":{            
//        "url": "../controlador/ModificarCategoria.php", 
//        "method": 'POST', //usamos el metodo POST
//        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
//        "dataSrc":""
//    },
//    "columns":[
//        {"data": "codigo_categoria"},
//        {"data": "nombre_categoria"},
//        {"data": "descripcion_categhoria"},
//        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
//    ]
//}); 
//
//
//
//
//
//
//
//
//});
//
////$("#btnNuevo").click(function(){
////    $("#formularioCategoria").trigger("reset");
////    $(".modal-header").css("background-color", "#1cc88a");
////    $(".modal-header").css("color", "white");
////    $(".modal-title").text("Nueva Categoria");            
////    $("#modalCRUD").modal("show");
////    
////    id=null;
////    opcion = 1; //alta
////}); 
////
////
////
////var fila;
////
////$(document).on("click", ".btnEditar", function(){
////    fila = $(this).closest("tr");
////    id = parseInt(fila.find('td:eq(0)').text());
////    nombre = fila.find('td:eq(1)').text();
////    descripcion = fila.find('td:eq(2)').text();
////    
////    $("#nombre").val(nombre);
////    $("#descripcion").val(descripcion);
////    opcion = 2;
////    
////    $(".modal-header").css("background-color", "#4e73df");
////    $(".modal-header").css("color", "white");
////    $(".modal-title").text("Categoria");            
////    $("#modalCRUD").modal("show");  
////    
////});
////
////
//////botón BORRAR
////$(document).on("click", ".btnBorrar", function(){    
////    fila = $(this);
////    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
////    opcion = 3 //borrar
////    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
////    if(respuesta){
////        $.ajax({
////            url: "../controlador/ModificarCategoria.php",
////            type: "POST",
////            dataType: "json",
////            data: {opcion:opcion, id:id},
////            success: function(){
////                TablaCategoria.row(fila.parents('tr')).remove().draw();
////            }
////        });
////    }   
////});
////
////
////$("#actualizar_categoria").submit(function(e){
////    e.preventDefault();    
////    nombre = $.trim($("#nombre").val());
////    descripcion = $.trim($("#descripcion").val()); 
////    $.ajax({
////        url: "../controlador/ModificarCategoria.php",
////        type: "POST",
////        dataType: "json",
////        data: {nombre:nombre, descripcion:descripcion, id:id, opcion:opcion},
////        success: function(data){  
////            console.log(data);
////            id = data[0].id;            
////            nombre = data[0].nombre;
////            descripcion = data[0].descripcion;
////            if(opcion == 1){TablaCategoria.row.add([id,nombre,descripcion]).draw();}
////            else{TablaCategoria.row(fila).data([id,nombre,descripcion]).draw();} 
////            
////        }        
////    });
////    $("#modalCRUD").modal("hide");    
////    
////});    
////  
////});