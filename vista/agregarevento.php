<?php
session_start();
require_once '../conexion/Conexion.php';
/*
 * @autor: Seiko
 */
if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

?>



<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Agregar Evento</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        <form  role="form">
           
                    
   
                    <div class="form-group">
                        <label>Nombre Evento</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Evento">
                    </div>

                    <div class="form-group">
                        <label>Descripcion Evento</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Evento"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="addevento($('#nombre').val(), $('#descripcion').val());return false;">Agregar</button>
                    </div>
                    
           

        </form>
    </div>
</div>

<div id="resultado"></div>