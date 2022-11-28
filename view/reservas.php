<?php
    @session_start(); // Comienzo de la sesión

    if ($_SESSION["acceso"] != true) {
        header('Location: ?op=error');
    } else {
    ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Solicitudes de Reservas - UTP</title>

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
                                        <li class="breadcrumb-item">Solicitudes de Reservas</li>
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
                                <h5>Solicitudes de Reservas</h5>
                                <span class="d-block m-t-5">Se visualizaran todas las reservas que estan activas esperando a que se cumplan</span>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">

                                    <table id="table_solic_reservas" class="table table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>SOLICITANTE</th>
                                            <th>SALON</th>
                                            <th>FECHA RESERVA</th>
                                            <th>DESDE</th>
                                            <th>HASTA</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>CANTIDAD</th>
                                            <th>ESTADO</th>
                                            <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 1;
                                            foreach ($MisSolicitudes as $MisSolicitudes) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $MisSolicitudes->cod_reservacion; ?></td>
                                                    <td><?php echo $MisSolicitudes->nombre; ?></td>
                                                    <td><?php echo $MisSolicitudes->cod_salon; ?></td>
                                                    <td><?php echo $MisSolicitudes->fecha_reserva; ?></td>
                                                    <td><?php echo $MisSolicitudes->tiempo_inicio; ?></td>
                                                    <td><?php echo $MisSolicitudes->tiempo_final; ?></td>
                                                    <td><?php echo $MisSolicitudes->descripcion; ?></td>
                                                    <td> <?php echo $MisSolicitudes->cantidad; ?></td>
                                                    <?php
                                                    $MisSolicitudes->estado;
                                                    if ($MisSolicitudes->estado == 2) {
                                                        $status = "secundary rounded";
                                                        $estado = "En curso";
                                                    } elseif ($MisSolicitudes->estado == 1) {
                                                        $status = "warning rounded";
                                                        $estado = "Pendiente";
                                                    } elseif($MisSolicitudes->estado == 3) {
                                                        $status = "success rounded";
                                                        $estado = "Completado";
                                                    } else {
                                                        $status = "danger rounded";
                                                        $estado = "Rechazado";
                                                    }
                                                    ?>
                                                    <td>
                                                        <div style="padding:8px" class=" text-white align-self-center bg-<?php echo  $status ?>"><?php echo $estado; ?></div>
                                                    </td>
                                                    <td><a href="./?op=confirmarReserva&id_reserva=<?php echo $MisSolicitudes->cod_reservacion; ?>" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                                    <a href="./?op=rechazarReserva&id_reserva=<?php echo $MisSolicitudes->cod_reservacion; ?>" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a>
                                                </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
         <!-- Required Js -->
         <?php 
            include('layouts/scripts.php');?>

<script>
    $(document).ready(function() {
        $('#table_solic_reservas').DataTable({
            searching: true,
            ordering: true,
            dom: 'Bfrtip',
            order: [[8, "desc"]],
            language: {
                search: '<i class="bi bi-search"></i> Buscar',
                zeroRecords: 'No hay registros para mostrar.',
                emptyTable: 'La tabla está vacia.',
                info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
                infoFiltered: "(Filtrados de _MAX_ Registros.)",
                paginate: {
                    first: 'Primero',
                    previous: 'Anterior',
                    next: 'Siguiente',
                    last: 'Último'
                },
    
            }
        });
    });
    </script>

        </body>

        </html>

    <?php
    }
    ?>