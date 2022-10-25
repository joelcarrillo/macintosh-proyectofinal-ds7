<?php
@session_start();// Comienzo de la sesión

if ($_SESSION["acceso"] != true)
{
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
                                <li class="breadcrumb-item"><a href="?op=salones">Salones</a></li>
                                <li class="breadcrumb-item">Horario</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
            <br><br><br><br>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Aula : 3-307</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Hora</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miercoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Sábado</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>7:00 AM - 7:45 AM</td>
                                        <td style="color: red">Ocupado</td>
                                    </tr>
                                    <tr>
                                        <td>8:40 AM - 9:25 AM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>
                                    </tr>
                                    <tr>
                                        <td>9:30 AM - 10:15 AM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>10:20 AM - 11:05 AM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>11:10 AM - 11:55 AM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>12:00 PM - 12:45 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                    <tr>
                                        <td>12:50 PM - 1:35 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                    <tr>
                                        <td>1:40 PM - 2:25 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>2:30 PM - 3:15 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                    <tr>
                                        <td>3:20 PM - 4:05 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>4:10 PM - 4:55 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                    <tr>
                                        <td>5:00 PM - 5:45 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>5:50 PM - 6:35 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>6:40 PM - 7:25 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>7:30 PM - 8:15 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>8:20 PM - 9:05 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                    <tr>
                                        <td>9:10 PM - 9:55 PM</td>
                                        <td style="color: red">Ocupado</td>

                                    </tr>
                                    <tr>
                                        <td>10:00 PM - 10:45 PM</td>
                                        <td><Button style="background-color: rgb(60, 131, 60); color:white; border: none; border-radius: 10px;">Reservar ></Button></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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