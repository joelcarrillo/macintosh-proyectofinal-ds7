<?php
@session_start(); // Comienzo de la sesión

if ($_SESSION["acceso"] != true) {
    header('Location: ?op=error');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Salones - UTP</title>

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

        <!-- [ Contenido Principal ] -->
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
                                    <li class="breadcrumb-item"><a href="?op=facultades">Facultades</a></li>
                                    <li class="breadcrumb-item">Salones de la <?php echo $nombreFacultad->nombre ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <div class="row">

                    <?php
                foreach ($referenciaSalones as $salones) { 
                        ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="card text-left">
                                <div class="card-body">

                                    <h5 class="card-title">Salon <?php echo $salones->salon ?></h5>


                                    <div class="card-descripcion">
                                        <div class="card-text">Codigo:</div>
                                        <span><?php echo $salones->salon ?></span>
                                    </div>
                                    <div class="card-descripcion">
                                        <div class="card-text">Edificio:</div> <span><?php echo $salones->numero_edificio ?></span>
                                    </div>
                                    <div class="card-descripcion">
                                        <div class="card-text">Piso:</div> <span><?php echo $salones->numero_piso ?></span>
                                    </div>
                                    <br>
                                    <a href="?op=horarios&cod_salon=<?php echo $salones->salon ?>&idFac=<?php echo $idFac ?>" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                                    <a href="?op=reservar&cod_salon=<?php echo $salones->salon ?>&idFac=<?php echo $idFac ?>" class="btn btn-success btn-lg btn-block">Crear Reserva</a>
                              
                                </div>
                            </div>
                        </div>

                    <?php
                    } ?>

                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>

        </div>

        <!-- Required Js -->
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/feather.min.js"></script>
        <script src="assets/js/pcoded.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script src="assets/js/plugins/clipboard.min.js"></script>
        <script src="assets/js/uikit.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="assets/js/plugins/apexcharts.min.js"></script>

        <script>
            /*
    window.onload = function(){
        var contenedor = documen.getElementById('contenedor_carga');
        contenedor.style.visibility='hidden';
        contenedor.style.opacity='0';
    }*/
        </script>

    </body>


    </html>

<?php
}
?>