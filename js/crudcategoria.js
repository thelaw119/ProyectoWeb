$('#prueba').click(function() {
    
    
        });




function Guardar_categoria(nombre, descripcion) {

    var datos = {
        "nombre": nombre,
        "descripcion": descripcion
    };
 
    $.ajax({
        data: datos,
        url: '../controlador/GuardarCategoria.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor");
        },

        success: function (response) {
            
            $("#resultado").html(response);
 
//            setInterval(function(){
//                $("#resultado").load("../vista/gestioncategoria.php");
//            },1000);
            
            

        }
    });

}
        