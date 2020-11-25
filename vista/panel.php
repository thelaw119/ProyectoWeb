<!DOCTYPE html>
<?php
session_start();
require_once '../conexion/Conexion.php';
/*
 * @autor: Seiko
 */
if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
} else {
    $codigo = $_SESSION["codigo_usuario"];
}
//if(!isset($_SESSION["nick"]) || $_SESSION["nick"] !== true){
//    header("location: http://localhost/Web/vista/panel.php");
//    exit;
//}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FUN GAMES | Panel</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <script src="../js/menu_usuario.js"></script>
        <script src="../js/editardatosusuario.js"></script>
        <script src="../js/miscompras.js" ></script>
        <script src="../js/crudevento.js"></script>
        <script src="../js/compras.js"></script>
        <link rel="stylesheet" type="text/css" href="../dist/css/loading.css"/>
        <!--<script type="text/javascript" src="../dist/loading-bar.js"></script>-->-->






    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- <a href="index3.html" class="nav-link"></a>-->
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- <a href="#" class="nav-link"></a>-->
                    </li>
                </ul>

                <!--  <!-- SEARCH FORM 
                  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>-->

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <?php
                    $SQLcontador = "select count(*)
                    from detalle_eventos
                    inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
                    inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario
                    where usuarios.codigo_usuario = '$codigo';";
                    $contador = mysqli_query($conexion, $SQLcontador);

                    $SQL = "select eventos.nombre_evento,eventos.descripcion_evento, 
                        detalle_eventos.fecha_inicio_evento, detalle_eventos.fecha_termino_evento, usuarios.codigo_usuario 
                        from detalle_eventos 
                        inner join eventos on detalle_eventos.codigo_evento = eventos.codigo_evento
                        inner join usuarios on detalle_eventos.codigo_usuario = usuarios.codigo_usuario
                        where usuarios.codigo_usuario = '$codigo' order  by  eventos.nombre_evento desc";
                    $resultado = mysqli_query($conexion, $SQL);

                    if ($contador->num_rows > 0) {
                        $row = $contador->fetch_assoc();
                        $total_notificacion = $row['count(*)'];
                    }
//                    var_dump($total_notificacion);
                    ?>


                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge"><?php echo $total_notificacion; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header"><?php echo $total_notificacion; ?> Notificaciones</span>
                            <div class="dropdown-divider"></div>



                            <?php
//                            while($resultado = mysqli_)
                            foreach ($resultado as $row) {
                                ?>


                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> <?php echo $row['nombre_evento']; ?>
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>

                            <?php } ?>
                            <!--                            <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item">
                                                            <i class="fas fa-users mr-2"></i> 8 friend requests
                                                            <span class="float-right text-muted text-sm">12 hours</span>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item">
                                                            <i class="fas fa-file mr-2"></i> 3 new reports
                                                            <span class="float-right text-muted text-sm">2 days</span>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  data-slide="" href="http://localhost/ProyectoWeb/vista/logout.php" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="../img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light"><?php echo $_SESSION["nombre_perfil"]; ?></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $_SESSION["nick_usuario"]; ?></a>
                        </div>
                    </div>    

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview menu-open">
                                <a href="panel.php" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Inicio
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" onclick="javascript:ccompras(<?php echo $codigo; ?>);" class="nav-link active">
                                            <i class="far nav-icon"></i>
                                            <!--<i class="far fa-circle nav-icon"></i> -->
                                            <p>Mis Compras</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">

                                        <a href="#" onclick="javascript:perfilusuario();" class="nav-link active">
                                            <i class="far nav-icon"></i>
                                            <p>Mi Perfil</p>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="#" onclick="javascript:productos(<?php echo $codigo; ?>);"  class="nav-link active">
                                            <i class="far nav-icon"></i>
                                            <p>Productos</p>
                                        </a>
                                    </li>
                                    <!--
                                    <li class="nav-item">
                                      <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                      </a>
                                    </li>-->
                                </ul>
                            </li>
                        </ul>
                    </nav>

                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->

                                <?php
                                $SQL = "SELECT COUNT(*) FROM productos";
                                $resultado = mysqli_query($conexion, $SQL);
                                $data = $resultado->fetch_assoc();
                                foreach ($data as $row) {
                                    ?>


                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php
                                echo $row;
                            }
                                ?></h3>

                                        <p>Productos En Venta</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
<!--                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->

                                <?php
                                $SQL = "select COUNT(*) from carro_compra where codigo_usuario = '$codigo';";
                                $resultado = mysqli_query($conexion, $SQL);
                                $data = $resultado->fetch_assoc();
                                foreach ($data as $row) {
                                    ?>

                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?php
                                echo $row;
                            }
                                ?><sup style="font-size: 20px"></sup></h3>

                                        <p>Mis Compras</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
<!--                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3> </h3>
                                        <br>
                                        <p>Modificar Perfil</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" onclick="javascript:perfilusuario();" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->

                            <!-- ./col -->
                        </div>

                        <div>
                            <div class="content-header" id="contenido">

                            </div>
                        </div> 

                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020 <a href="#">TheLaw</a>.</strong>
                Todo los derechos reservados.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
                                        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="../plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../plugins/moment/moment.min.js"></script>
        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
    </body>
</html>
