function eliminarevento(detalle_evento) {

    dato = {
        "codigo": detalle_evento
    };

    var respuesta = confirm("¿Está seguro de borrar el registro "+detalle_evento+"?");

    if (respuesta == true){

    $.ajax({
        data: dato,
        url:'../controlador/EliminarEvento.php',
        type:'POST',
        
        
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            
                $("#contenido").load('../vista/listaevento.php');
       
       }
        
    });
    
   }else{
       
   }
}
function agregarevento() {
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