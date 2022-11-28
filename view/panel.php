<?php
@session_start(); // Comienzo de la sesión

if ($_SESSION["acceso"] != true) {
    header('Location: ?op=error');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Dashboard - UTP</title>

        <?php
        include('layouts/styles.php')
        ?>
        <link href='./public/css/main.css' rel='stylesheet' />
        <script src='./public/js/main.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');


                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    initialDate: '2022-11-12',
                    navLinks: false, // can click day/week names to navigate views
                    selectable: false,
                    selectMirror: false,
                    select: function(arg) {
                        var title = prompt('Event Title:');
                        if (title) {
                            calendar.addEvent({
                                title: title,
                                start: arg.start,
                                end: arg.end,
                                allDay: arg.allDay
                                

                            })
                        }
                        calendar.unselect()
                    },
                    eventClick: function(arg) {

                        mostrarDetalles(arg.event.title.substr(0, 7, arg.event.title.lenght), arg.event.start, arg.event.end, arg.event.title.substr(7));


                    },
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: [


                        <?php

                        if ($_REQUEST['salon'] != null) {
                            foreach ($calendario as $calendario) {
                        ?> {        
                                   
                                    title: ' <?php echo $calendario->cod_salon." ". $calendario->Nombre?>',
                                    start: '<?php echo $calendario->fecha_reserva . "T" . $calendario->tiempo_inicio ?>',
                                    end: '<?php echo $calendario->fecha_reserva . "T" . $calendario->tiempo_final ?>'
                                    
                                },
                        <?php


                            }
                        }
                        ?>
                    ]
                });

                calendar.render();
            });
        </script>
        <style>
            body {
                margin: 0 0;
                padding: 0;
                font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
                font-size: 14px;
            }

            #calendar {
                max-width: 1100px;
                margin: 0 auto;
            }
        </style>

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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <br><br><br>
                <div id='calendar'></div>
                <!-- [ Main Content ] end -->
                <form name="formulario" action="?op=permitido" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="facultad">Facultad</label>

                            <select onchange="DesplegarSalones()" id="facultad" name="facultad" class="form-control" required>


                                <option>-Seleccione Facultad-</option>
                                <?php
                                foreach ($facultades as $facultades) {
                                ?>
                                    <option value="<?php echo $facultades->cod_facultad; ?>"><?php echo $facultades->nombre ?></option>
                                <?php
                                }
                                ?>



                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="salon">Aula</label>
                            <select id="salon" name="salon" class="form-control" required>



                            </select>

                        </div>
                    </div>
                    <button type="submit" class="btn  btn-success" data-toggle="modal" data-target="#CrearTratamientoModal">
                        <i class="feather icon-search-plus"></i>Cargar</button><button type="submit"></input>
                </form>
            </div>
            <button id="boton" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

            <div class="modal" id="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detalles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Solicitante</label>
                                        <input value="" type="text" class="form-control" name="usuario" id="usuario" required disabled>
                                    </div>
                                </div>
                        

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salon</label>
                                        <input value="" type="text" class="form-control" name="salon" id="SalonInput" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input value="" type="text" class="form-control" name="fecha" id="fecha" required disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>inicio</label>
                                        <input value="" type="text" class="form-control" name="inicio" id="inicio" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>final</label>
                                        <input value="" type="text" class="form-control" name="final" id="final" required disabled>
                                    </div>
                                </div>
                            </div>





                        </div>
                        <div class="modal-footer">
                            <button onclick="closeModal()" type="button" class="btn  btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--  Modal -->

        </div>

        <br><br><br><br><br>

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
        <?php include('layouts/scripts.php') ?>

        <script>
            var arrayIdSalon = new Array();
            var arrayNomSalon = new Array();
            var arrayIdFacultad = new Array();
            var i = 1;


            <?php
            $n = 0;
            foreach ($salones as $s) {
                echo "arrayIdSalon[$n]=$s->cod_salon;";
                echo "arrayNomSalon[$n]='$s->cod_salon';";
                echo "arrayIdFacultad[$n]=$s->cod_facultad;";
                $n++;

            }
            ?>
            var n = "<?php echo $n; ?>";

            function DesplegarSalones() {

                var indice = 0;
                var valor = 0;
                var facultadSeleccionada = document.getElementById('facultad');

                valor = facultadSeleccionada.options[facultadSeleccionada.selectedIndex].value;
                document.formulario.salon.lenght = 0;
                for (x = 0; x < n; x++) {

                    if (valor == arrayIdFacultad[x]) {

                        //asigna a la lista de menú sub_areas los nuevos valores segun la selección del menú areas
                        document.formulario.salon[indice] = new Option(arrayNomSalon[x], arrayNomSalon[x]);

                        indice = indice + 1;
                    }

                }
            }


            var m = document.getElementById('modal');

            function closeModal() {
                m.style = "none";
            }

       

            function mostrarDetalles(salon, inicio, fin, user) {
                console.log(salon)

              
                if (m.style.display == "block") {
                    m.style.display = "none"
                } else {
                    m.style.display = "block"
                   
                    document.getElementById('usuario').value = user;
                    document.getElementById("SalonInput").value = salon;
                    document.getElementById("fecha").value = inicio.getDate() + '-' + ( inicio.getMonth() + 1 ) + '-' + inicio.getFullYear();;

                    document.getElementById("inicio").value = inicio.getHours() + ':' + inicio.getMinutes() + ':' + inicio.getSeconds();
                    document.getElementById("final").value = fin.getHours() + ':' + fin.getMinutes() + ':' + fin.getSeconds();

                }

            }
        </script>

    </body>


    </html>

<?php


}
?>