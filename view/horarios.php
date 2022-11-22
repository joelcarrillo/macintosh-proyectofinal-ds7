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
</head>

<body class="">


    <?php
  include('layouts/styles.php');
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

            <div class="bg-gray-200">
                <div class="container mx-auto mt-10">
                    <div class="wrapper bg-white rounded shadow w-full ">
                        <div class="header flex justify-between border-b p-2">
                            <span class="text-lg font-bold">
                                Horario - Salon (1LS131)
                            </span>

                        </div>

                        <div class="container p-2 mx-auto rounded-md sm:p-4 dark:text-gray-100 dark:bg-gray-900">

                            <div class="overflow-x-auto">
                                <table class="min-w-full text-xs border-separate">
                                    <thead class=" bg-neutral-300 rounded-t-lg ">
                                        <tr class="text-center border ">
                                            <th class="bg-blue-400 text-white p-3 text-center border text-sm" >Hora</th>
                                            <th class="p-3 text-center border text-sm">Lunes</th>
                                            <th class="p-3 text-center border text-sm">Martes</th>
                                            <th class="p-3 text-center border text-sm">Miercoles</th>
                                            <th class="p-3 text-center border text-sm">Jueves</th>
                                            <th class="p-3 text-center border text-sm">Viernes</th>
                                            <th class="p-3 text-center border text-sm">Sabado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listaHorasGenerales as $listHoras){?>
                                        <tr
                                            class="text-right border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-800">

                                            <td class="bg-blue-400 px-3 py-2 text-center border ">
                                                <span
                                                    class="event bg-blue-400 text-white rounded p-1 text-sm mb-1"><?php echo $listHoras->descripcion?></span>
                                            </td>

                                            <?php foreach($listaDiasSemana as $listDiaSemana){ ?>
                                            <td class="px-3 py-2 text-center border">
                                                <?php foreach($listaHorarioSalones as $listHorarioSalon){ 
                                                if($listHorarioSalon->dia_semana == $listDiaSemana->id AND $listHorarioSalon->id_hora_general==$listHoras->id ){?>
                                                <span class="event bg-green-600 text-white rounded p-1 text-sm mb-1"><?php echo "Reservado"?></span>
                                                <?php } } ?>
                                            </td>
                                            <?php }?>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Required Js -->
    <?php
  include('layouts/scripts.php');

?>


</body>


</html>

<?php
  }
?>