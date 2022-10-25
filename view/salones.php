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
                                <li class="breadcrumb-item">Salones</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
             

                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-4">
                    <div class="card text-left">
                        <div class="card-body">
                        
                            <h5 class="card-title">Salon 1</h5>
                            
                            
                            <div class="card-descripcion">
                                <div class="card-text">Codigo:</div> <span>12NK3N3</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Edificio:</div> <span>uno</span>
                            </div>
                            <div class="card-descripcion">
                                <div class="card-text">Piso:</div> <span>tercero (3°)</span>
                            </div>
                            <br>
                            <a href="?op=horarios" class="btn btn-primary btn-lg btn-block">Ver Horario</a>
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