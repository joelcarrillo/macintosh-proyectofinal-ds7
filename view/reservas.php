<?php
@session_start(); // Comienzo de la sesión

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
                                            <th>Fecha solicitada</th>
                                            <th>Hora Solicitada</th>
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
                                        <tr>
                                            <td>1</td>
                                            <td>16/10/2022</td>
                                            <td>4:00 P.M</td>
                                            <td>3</td>
                                            <td>301</td>
                                            <td>Juanito Gómez</td>
                                            <td>vamos a jugar furbo 😎</td>
                                            <td>Esperando Confirmacion</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>2</td>
                                            <td>16/10/2022</td>
                                            <td>6:40 P.M</td>
                                            <td>3</td>
                                            <td>309</td>
                                            <td>Pablo Lizana</td>
                                            <td>dar una clase a mis compañeros</td>
                                            <td>Esperando Confirmacion</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>3</td>
                                            <td>16/10/2022</td>    
                                            <td>7:10 P.M</td>
                                            <td>3</td>
                                            <td>304</td>
                                            <td>Lucas Teruel</td>
                                            <td>Pasar tiempo con los panas</td>
                                            <td>Esperando Confirmacion</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                            <td>16/10/2022</td>    
                                            <td>8:00 P.M</td>
                                            <td>3</td>
                                            <td>303</td>
                                            <td>Jesus Miguel Zapata</td>
                                            <td>Trabajo colaborativo</td>
                                            <td>Esperando Confirmacion</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>5</td>
                                            <td>16/10/2022</td>
                                            <td>10:00 P.M</td>
                                            <td>3</td>
                                            <td>310</td>
                                            <td>Maria Asuncion Duran</td>
                                            <td>Proyecto final de DDS8</td>
                                            <td>Confirmado</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>6</td>
                                            <td>17/10/2022</td>
                                            <td>12:00 A.M.</td>
                                            <td>3</td>
                                            <td>315</td>
                                            <td>Piedad Borrego</td>
                                            <td>Reunion general para SIG</td>
                                            <td>Confirmado</td>
                                            <td>---</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>
                                        <tr>
                                        <td>7</td>
                                            <td>17/10/2022</td>    
                                            <td>3:00 P.M</td>
                                            <td>3</td>
                                            <td>405</td>
                                            <td>Eugenio Nieto</td>
                                            <td>hacer tareas de la universidad</td>
                                            <td>Esperando Confirmacion</td>
                                            <td>3</td>
                                            <td><a href="#!" class="pc-link"><span class=""><i data-feather="check"></i></span></a>
                                            <a href="#!" class="pc-link"><span class="pc-micon"><i data-feather="x"></i></span></a></td>
                                        </tr>     
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