<?php
@session_start(); // Comienzo de la sesiÃ³n

if ($_SESSION["acceso"] != true) {
    header('Location: ?op=error');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Reservas - UTP</title>

        <?php
        include('layouts/styles.php')
        ?>



    </head>

    <body class="">

        <?php

        include('layouts/pc-mob-header.php');
        include('layouts/pc-sidebar.php');
        include('layouts/pc-header.php');
        ?>

        <br>
        <div class="pc-container">
            <div class="pcoded-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">UTP</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?op=permitido">Home</a></li>
                                    <li class="breadcrumb-item">Reservas Activas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- [ stiped-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Reservas Activas</h5>
                            <span class="d-block m-t-5">Se visualizaran todas las reservas que estan activas esperando a que se cumplan</span>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Codigo Reserva</th>
                                            <th>Hora inicial</th>
                                            <th>Hora final</th>
                                            <th>Edificio</th>
                                            <th>Aula</th>
                                            <th>Usuario</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Cantidad</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($consultarReservas as $reservas) {
                                        ?>
                                            <tr>
                                                <td><?php echo $reservas->codigo_reserva ?></td>
                                                <td><?php echo $reservas->tiempo_inicio ?></td>
                                                <td><?php echo $reservas->tiempo_final ?></td>
                                                <td><?php echo $reservas->salon[0] ?></td>
                                                <td><?php echo $reservas->salon ?></td>
                                                <td><?php echo $reservas->usuario ?></td>
                                                <td><?php echo $reservas->breve_descripcion ?></td>
                                                <td>

                                                    <div class="text-center border border-secondary align-self-center bg-<?php if ($reservas->estado == 'pendiente') {
                                                                                                                                echo "secondary rounded";
                                                                                                                            } else if ($reservas->estado == 'en curso') {
                                                                                                                                echo "warning rounded";
                                                                                                                            } else {
                                                                                                                                echo "success rounded";
                                                                                                                            } ?> text-white">
                                                        <?php echo $reservas->estado; ?>
                                                    </div>

                                                </td>

                                                <td><?php echo $reservas->cantidad_equipos ?></td>
                                                <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                                    <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ stiped-table ] end -->
            </div>
        </div>

        <!-- Required Js -->

        <?php
        include('layouts/scripts.php')
        ?>


    </body>

    </html>

<?php
}
?>