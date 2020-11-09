/* 
 * Autor: TheLae
 */


function perfilusuario() {
    var detener = 2500;
   
    $.ajax({
        type: "get",
        url: "../vista/perfil_usuario.php",
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