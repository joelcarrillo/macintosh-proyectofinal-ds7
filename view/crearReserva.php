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
    <title>Reservar - UTP</title>

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
                                <li class="breadcrumb-item"><a
                                        href="?op=salones&id_facultad=<?php echo $_GET['idFac']?>">Salones</a></li>
                                <li class="breadcrumb-item">Crear Reserva</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Crear Reserva</h5>

                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nombre_usuario">Usuario</label>
                                        <input type="text" class="form-control" id="nombre_usuario"
                                            placeholder="Usuario"
                                            value="<?php echo $_SESSION["user"] ; echo ' ('.$_SESSION["dni"].')';  ?>"
                                            disabled>

                                        <input type="hidden" class="form-control" name="id_usuario"
                                            placeholder="ID USUARIO" value="<?php echo $_SESSION["id"]; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cod_salon">Codigo de Salon</label>
                                        <input type="text" class="form-control" name="cod_salon"
                                            placeholder="CODIGO SALON" value="<?php echo $_GET["cod_salon"]; ?>"
                                            disabled>


                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tiempo_inicio">Fecha de Reserva</label>
                                        <input onchange="obtenerDiaSemana(this)" type="date" class="form-control" name="fecha_reserva" id="fecha_reserva"
                                            placeholder="CODIGO SALON" value="<?php echo $_GET["cod_salon"]; ?>">
                                        <input type="hidden" class="form-control" id="dia_semana_recib">
                                        </div>
                                </div>
                                
                                <div class="form-row"></div>
                                    <div class="form-group col-md-6">
                                        <label for="tiempo_inicio">Hora de Inicio</label>

                                        <select id="tiempo_inicio" class="form-control">
                                            <option>Escoger hora disponible...</option>
                                            <?php foreach($listaHorasGenerales as $listHoraGeneral){ 
                                                ?>
                                            <option><?php echo $listHoraGeneral->descripcion ?></option>
                                            <?php }?>
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tiempo_final">Hora de Fin</label>
                                        <select id="tiempo_final" class="form-control">
                                            <option selected>Escoger...</option>
                                            <?php ?>
                                            <option>...</option>
                                            <?php ?>
                                        </select>
                                    </div>

                                </div>



                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Descripcion de Reserva</label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Descripcion de Reserva">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Cantidad de Participantes</label>
                                        <input type="number" class="form-control" id="cantidad">
                                    </div>


                                </div>

                                <button type="submit" class="btn btn-primary">Reservar</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
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
    function obtenerDiaSemana() {
        
        const fechaComoCadena = document.getElementById("fecha_reserva").value; // día lunes
        const dias = [
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado',
            'Domingo',
        ];
        const numeroDia = new Date(fechaComoCadena).getDay();
        const nombreDia = dias[numeroDia];
        document.getElementById("dia_semana_recib").value=nombreDia;
        console.log("Nombre de día de la semana: ", nombreDia);
    }
    </script>

</body>


</html>

<?php
}
?>