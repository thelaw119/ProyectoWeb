function Guardar_categoria(nombre,descripcion){
    
    var datos = {
        "nombre" : nombre,
        "descripcion" : descripcion
    };
    
    $.ajax({
        data: datos,
        url: '../controlador/GuardarCategoria.php',
        type: 'post',
        beforeSend: function(){
            $("#resultado").html("Procesando, espere por favor");
        },
        
        success: function(response){
            $("#resultado").html(response);
        }
    });
    
}

