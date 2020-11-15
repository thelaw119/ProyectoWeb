<?php
session_start();

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}
?>

<script src="../js/editardatosusuario.js"></script>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="../img/avatar3.png"
                                 alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $_SESSION["nick_usuario"]; ?></h3>

                        <p class="text-muted text-center"><?php echo $_SESSION["nombre_perfil"]; ?></p>
                    </div>

                    <a href="#" class="btn btn-primary btn-block"><b></b></a>

                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Información</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> <?php
                            echo $_SESSION["nombre_usuario"];
                            echo " ";
                            echo $_SESSION["apellido_usuario"];
                            ?></strong><hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> <?php echo $_SESSION["direccion_usuario"]; ?></strong> <hr>
                        <!--<strong><i class="fas fa-pencil-alt mr-1"></i> </strong>-->
                        <strong><i class="far fa-file-alt mr-1"></i> <?php echo $_SESSION["email_usuario"]; ?></strong> <hr>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">

                    <div class="card-body">
                        <div class="tab-content">

                            <div class="active tab-pane" id="informacion" >

                                <h1><?php echo $_SESSION["nick_usuario"] ?></h1>

                                <div class="table-wrapper">

                                    <div class="tab-pane" id="timeline">
                                        <div class="timeline timeline-inverse">
                                        </div>
                                    </div>
                                    
                                    <form >
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION["nombre_usuario"]; ?>" placeholder="nombre usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">apellidos</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $_SESSION["apellido_usuario"]; ?>"placeholder="apellidos usuario">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">direccion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $_SESSION["direccion_usuario"]; ?>"placeholder="direccion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION["email_usuario"]; ?>"placeholder="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">contraseña</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="clave" name="clave" value="<?php echo $_SESSION["clave_usuario"]; ?>"placeholder="contraseña">
                                                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $_SESSION["codigo_usuario"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger" href="javascript:;" onclick="modificarusuario($('#nombre').val(), $('#apellido').val(), $('#direccion').val(), $('#email').val(), $('#clave').val(), $('#codigo').val());return false;">Modificar</button>
   
                                                </div>

                                            </div>
                                        </form>
                                    <div id="resultado"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

