<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

?>



<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Agregar Categoria</h3>
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        <form  role="form">
            <div class="row">
                <div class="col-sm-6">
                    
   
                    <div class="form-group">
                        <label>Nombre Categoria</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Categoria" >
                    </div>

                    <div class="form-group">
                        <label>Descripcion Categoria</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingrese Descripcion Categoria" ></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" href="javascript:;" onclick="addcategoria($('#nombre').val(), $('#descripcion').val());return false;">Agregar</button>
                    </div>
                    
                </div>
            </div>

        </form>
    </div>
</div>

<div id="resultado"></div>