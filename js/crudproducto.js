$(document).ready(function(){
//    TablaCategoria = $("#TablaCategoria").DataTable({
//       "columnDefs":[{
//        "targets": -1,
//        "data":null,
//        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
//       }],
//        
//    "language": {
//            "lengthMenu": "Mostrar _MENU_ registros",
//            "zeroRecords": "No se encontraron resultados",
//            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
//            "sSearch": "Buscar:",
//            "oPaginate": {
//                "sFirst": "Primero",
//                "sLast":"Último",
//                "sNext":"Siguiente",
//                "sPrevious": "Anterior"
//             },
//             "sProcessing":"Procesando...",
//        }
//    });









$("#btnNuevo").click(function(){
    $("#formularioCategoria").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Categoria");            
    $("#modalCRUD").modal("show");
    
    id=null;
    opcion = 1; //alta
}); 



var fila;

$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    opcion = 2;
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Categoria");            
    $("#modalCRUD").modal("show");  
    
});


//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "../controlador/ModificarCategoria.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                TablaCategoria.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});


$("#actualizar_categoria").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val()); 
    $.ajax({
        url: "../controlador/ModificarCategoria.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, descripcion:descripcion, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            if(opcion == 1){TablaCategoria.row.add([id,nombre,descripcion]).draw();}
            else{TablaCategoria.row(fila).data([id,nombre,descripcion]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
  
});