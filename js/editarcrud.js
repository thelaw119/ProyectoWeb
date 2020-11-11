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


$("#formularioCategoria").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val()); 
    $.ajax({
        url: "../controlador/ModificarCategoria.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, descripcion:descripcion, id:id},
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
    
