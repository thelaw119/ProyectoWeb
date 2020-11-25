<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ingreso Fun Games</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script src="../js/acceso_registro_recupera.js"></script>
        <script>

            function comprobar(obj)
            {
                if (obj.checked) {

                    document.getElementById('boton').style.display = "";
                } else {

                    document.getElementById('boton').style.display = "none";
                }
            }

        </script>

    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href=""><b>FUN</b>GAMES</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Registrarse</p>

                    <!--                    <form action="../controlador/Registrar.php" method="post">-->
                    <form name="registrar">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-hotel"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nick" name="nick" placeholder="Nombre Usuario" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Password"  >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!--<div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Repetir password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" onChange="comprobar(this);">
                                    <label for="agreeTerms">
                                        <a href="#">Termino y Condiciones</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <!--                                <button type="submit" class="btn btn-primary btn-block">Registrar</button>-->
                                <button type="submit" class="btn btn-primary" href="javascript:;" onclick="registrar_usuario($('#nombre').val(), $('#apellido').val(), $('#direccion').val(), $('#email').val(), $('#nick').val(), $('#clave').val());return false;" id="boton" readonly style="display:none">Registrar</button>
                            </div>                
                            <!--<button type="submit" class="btn btn-success" href="javascript:;" onclick="addasigevento($('#evento').val(), $('#usuario').val(), $('#fecha_inicio').val(), $('#fecha_termino').val());return false;">Ingresar</button>-->

                            <!-- /.col -->
                        </div>
                    </form>


                    <a href="login.php" class="text-center">Ya estoy registrado</a>
                </div>

                <div class="content-header" id="resultado">

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../js/adminlte.min.js"></script>
    </body>
</html>
