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