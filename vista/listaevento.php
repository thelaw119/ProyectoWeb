<!DOCTYPE html>

<?php
session_start();
require_once '../conexion/Conexion.php';

if (!isset($_SESSION["nick_usuario"])) {
    header("Location: login.php");
}

$SQL = "select * from detalle_eventos";
$resultado = mysqli_query($conexion, $SQL);
?>


<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Inbox</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="buscar envento">
                    <div class="input-group-append">
                        <div class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                    1-50/200
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    <tbody>
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Codigo</th>
                            <th>Codigo de evento</th>
                            <th>Codigo de Usuarios</th>
                            <th>Descripcion</th>
                            <th>fecha inicio</th>
                            <th>fecha termino</th>
                        </tr>
                    </thead>
                    <?php foreach ($resultado as $row) { ?>
                        <tr>
                            <td>
                                <div class = "icheck-primary">
                                    <input type = "checkbox" value = "" id = "check1">
                                    <label for = "check1"></label>
                                </div>
                            </td>
                            <td class = "mailbox-subject"><b><?php echo $row['codigo_detalle_eventos']; ?></b></td>
                            <td class = "mailbox-subject"><b><?php echo $row['codigo_evento']; ?></b></td>
                            <td class = "mailbox-subject"><b><?php echo $row['codigo_usuario']; ?><b></td>
                                        <td class = "mailbox-subject"><b><?php echo $row['descripcion_evento']; ?></b></td>
                                        <td class = "mailbox-subject"><b><?php echo $row['fecha_inicio_evento']; ?><b></td>
                                                    <td class = "mailbox-subject"><b><?php echo $row['fecha_termino_evento']; ?><b></td>
                                                                </tr>
                                                                                <!--<td class = "mailbox-star"><a href = "#"><i class = "fas fa-star text-warning"></i></a></td>-->

                                                            <?php } ?>
                                                            </tbody>
                                                            </table>
                                                            <!--/.table -->
                                                            </div>
                                                            <!--/.mail-box-messages -->
                                                            </div>
                                                            <!--/.card-body -->
                                                            <div class = "card-footer p-0">
                                                                <div class = "mailbox-controls">
                                                                    <!--Check all button -->
                                                                    <button type = "button" class = "btn btn-default btn-sm checkbox-toggle"><i class = "far fa-square"></i>
                                                                    </button>
                                                                    <div class = "btn-group">
                                                                        <button type = "button" class = "btn btn-default btn-sm"><i class = "far fa-trash-alt"></i></button>
                                                                        <button type = "button" class = "btn btn-default btn-sm"><i class = "fas fa-reply"></i></button>
                                                                        <button type = "button" class = "btn btn-default btn-sm"><i class = "fas fa-share"></i></button>
                                                                    </div>
                                                                    <!--/.btn-group -->
                                                                    <button type = "button" class = "btn btn-default btn-sm"><i class = "fas fa-sync-alt"></i></button>
                                                                    <div class = "float-right">
                                                                        1-50/200
                                                                        <div class = "btn-group">
                                                                            <button type = "button" class = "btn btn-default btn-sm"><i class = "fas fa-chevron-left"></i></button>
                                                                            <button type = "button" class = "btn btn-default btn-sm"><i class = "fas fa-chevron-right"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            <aside class = "control-sidebar control-sidebar-dark">
                                                                <!--Control sidebar content goes here -->
                                                            </aside>

                                                            <script src = "../../plugins/jquery/jquery.min.js"></script>
                                                            <!-- Bootstrap 4 -->
                                                            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                                                            <!-- AdminLTE App -->
                                                            <script src="../../dist/js/adminlte.min.js"></script>
                                                            <!-- Page Script -->
                                                            <script>
                                                                $(function () {
                                                                    //Enable check and uncheck all functionality
                                                                    $('.checkbox-toggle').click(function () {
                                                                        var clicks = $(this).data('clicks')
                                                                        if (clicks) {
                                                                            //Uncheck all checkboxes
                                                                            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                                                                            $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
                                                                        } else {
                                                                            //Check all checkboxes
                                                                            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                                                                            $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
                                                                        }
                                                                        $(this).data('clicks', !clicks)
                                                                    })

                                                                    //Handle starring for glyphicon and font awesome
                                                                    $('.mailbox-star').click(function (e) {
                                                                        e.preventDefault()
                                                                        //detect type
                                                                        var $this = $(this).find('a > i')
                                                                        var glyph = $this.hasClass('glyphicon')
                                                                        var fa = $this.hasClass('fa')

                                                                        //Switch states
                                                                        if (glyph) {
                                                                            $this.toggleClass('glyphicon-star')
                                                                            $this.toggleClass('glyphicon-star-empty')
                                                                        }

                                                                        if (fa) {
                                                                            $this.toggleClass('fa-star')
                                                                            $this.toggleClass('fa-star-o')
                                                                        }
                                                                    })
                                                                })
                                                            </script>
                                                            <!-- AdminLTE for demo purposes -->
                                                            <script src="../../dist/js/demo.js"></script>
                                                            </body>
