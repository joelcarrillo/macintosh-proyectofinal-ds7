<?php
@session_start(); // Comienzo de la sesión

if ($_SESSION["acceso"] != true) {
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
                                    <li class="breadcrumb-item"><a href="?op=salones&id_facultad=<?php echo $_GET['idFac'] ?>">Salones</a></li>
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
                            <form action="./?op=crearReserva" method="POST" id="formulario">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nombre_usuario">Usuario</label>
                                            <input type="text" class="form-control" placeholder="Usuario" value="<?php echo $_SESSION["user"];
                                                                                                                    echo ' (' . $_SESSION["dni"] . ')';  ?>" disabled>

                                            <input type="hidden" class="form-control" name="id_usuario" placeholder="ID USUARIO" value="<?php echo $_SESSION["id"]; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cod_salon">Codigo de Salon</label>
                                            <input type="text" class="form-control" placeholder="CODIGO SALON" value="<?php echo $_GET["cod_salon"]; ?>" disabled>
                                            <input type="hidden" class="form-control" id="cod_salon" name="cod_salon" placeholder="CODIGO SALON" value="<?php echo $_GET["cod_salon"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tiempo_inicio">Fecha de Reserva</label>
                                            <input onchange="DesplegarHorarioDia()" type="date" class="form-control" name="fecha_reserva" id="fecha_reserva" placeholder="CODIGO SALON" value="<?php echo $_GET["cod_salon"]; ?>" min="<?php $fechaActual = date('Y-m-d');
                                                                                                                                                                                                                                        echo $fechaActual; ?>" required>
                                            <!-- <input type="text" id="dia_semana_recib" class="form-control"> -->
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tiempo_inicio">Hora de Inicio</label>

                                            <select onchange="calcularHoraFinal()" id="tiempo_inicio" name="tiempo_inicio" class="form-control" required>


                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tiempo_final">Hora de Fin</label>
                                            <input type="text" class="form-control" id="tiempo_final" placeholder="hora-minuto-segundo" disabled>
                                            <input type="hidden" class="form-control" id="tiempo_final2" placeholder="hora-minuto-segundo" name="tiempo_final">

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="descripcion_reserva">Descripcion de Reserva</label>
                                            <input type="text" class="form-control" id="descripcion_reserva" name="descripcion_reserva" placeholder="Descripcion de Reserva" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cantidad_reserva">Cantidad de Participantes</label>
                                            <input type="number" class="form-control" id="cantidad_reserva" name="cantidad_reserva" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Reservar</button>
                                </div>
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script>
            function calcularHoraFinal() {

                var hora_inicial = document.getElementById("tiempo_inicio");
                var pro = hora_inicial.options[hora_inicial.selectedIndex].text;
                let fecha = new Date();
                fecha.setHours(pro.substring(0, 2))
                fecha.setMinutes(pro.substring(3, 5))
                fecha.setSeconds(pro.substring(6, 8))
                fecha.setMinutes(fecha.getMinutes() + 45)
                document.getElementById('tiempo_final').value = fecha.getHours() + ':' + fecha.getMinutes() + ':' + fecha
                    .getSeconds() + '0';
                document.getElementById('tiempo_final2').value = fecha.getHours() + ':' + fecha.getMinutes() + ':' + fecha
                    .getSeconds() + '0';
            }


            var arrayIdHora = new Array();
            var arrayNomHora = new Array();
            var arrayNomDia = new Array();
            var arrayHorasFijas = new Array();
            var arrayHorasFijas_id = new Array();

            var i = 1;




            function DesplegarHorarioDia() {
                <?php
                $h = 0;
                foreach ($listaHorasGenerales as $horas) {
                    echo "arrayHorasFijas[$h]='$horas->descripcion';";
                    echo "arrayHorasFijas_id[$h]=$horas->id;";

                    $h++;
                }

                $n = 0;
                foreach ($horarios as $s) {
                    echo "arrayIdHora[$n]=$s->id_hora_general;";
                    echo "arrayNomHora[$n]='$s->descripcion';";
                    echo "arrayNomDia[$n]='$s->Dia';";
                    $n++;
                }
                ?>
                var n = "<?php echo $n; ?>";
                var h = "<?php echo $h; ?>";


                var indice = 0;
                var valor = 0;


                valor = obtenerDiaSemana();


                document.getElementById('tiempo_inicio').lenght = 0;

                for (x = 0; x < h; x++) {


                    //asigna a la lista de menú sub_areas los nuevos valores segun la selección del menú areas
                    document.getElementById('tiempo_inicio')[indice] = new Option(arrayHorasFijas[x], arrayHorasFijas[x]);
                    calcularHoraFinal();
                    indice = indice + 1;


                }
                indice = 0;

                for (x = 0; x < n; x++) {
                    if (valor == arrayNomDia[x]) {
                        //asigna a la lista de menú sub_areas los nuevos valores segun la selección del menú areas
                        console.log(arrayNomHora[x])
                        console.log(arrayIdHora[x])
                        for ( i=0; i<document.getElementById('tiempo_inicio').length; i++){
                            if (document.getElementById('tiempo_inicio').options[i].text == arrayNomHora[x]){
                            document.getElementById('tiempo_inicio').remove(i);
                        }
                        }
                        

                        calcularHoraFinal();
                        indice = indice + 1;
                    }

                }
            }


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
                return nombreDia;
            }
        </script>

    </body>


    </html>

<?php
}
?>
