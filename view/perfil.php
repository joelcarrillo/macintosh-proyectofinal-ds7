<?php
@session_start();// Comienzo de la sesión

if ($_SESSION["acceso"] != true)
{
    header('Location: ?op=error');
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>UTP Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">
    <!-- Custom CSS -->
    <link href="public/css/style.min.css" rel="stylesheet">

</head>



<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
<script>
var arrayIdDistrito = new Array();
var arrayNomDistrito = new Array();
var arrayIdProvincia = new Array();
var i = 1;
// Inicializamos 3 arreglos con los datos de los Ids de las provincias y distritos; ademas, del nombre de los distritos
<?php
$n=0;
foreach ($distritos as $d)  {
    echo "arrayIdDistrito[$n]=$d->id_distrito;";
    echo "arrayNomDistrito[$n]='$d->nom_distrito';";
    echo "arrayIdProvincia[$n]=$d->id_provincia;";
    $n++;
    }
 ?>
var n = "<?php echo $n; ?>"; //total de registros

function SelectDistritos() {
    var indice = 0;
    var valor = 0;
    //asignamos a la variable valor el valor de la lista de menú seleccionado
    valor = document.formulario_profile.provincia.value;
    document.formulario_profile.distrito.length = 0; //Limpiamos la lista de menu distrito
    for (x = 0; x < n; x++) {

        if (valor == arrayIdProvincia[x]) {
            //asigna a la lista de menú sub_areas los nuevos valores segun la selección del menú areas
            document.formulario_profile.distrito[indice] = new Option(arrayNomDistrito[x], arrayIdDistrito[x]);
            indice = indice + 1;
        }
    }

}
</script>

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
                                <li class="breadcrumb-item">Mi Perfil</li>
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
                        <!--
                        <div class="card-header">
                            <h5>Mi Perfil</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i
                                                        class="feather icon-maximize"></i> maximize</span><span
                                                    style="display:none"><i class="feather icon-minimize"></i>
                                                    Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                        class="feather icon-minus"></i> collapse</span><span
                                                    style="display:none"><i class="feather icon-plus"></i>
                                                    expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#!"><i
                                                    class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#!"><i
                                                    class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
    -->

                        <div class="card-body">
                            <div class="container">
                                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                                    <div class="profile-tab-nav border-right">
                                        <div class="p-4">
                                            <div class="img-circle text-center mb-3">
                                             <img src="public/images/users/<?php echo $_SESSION["foto"]; ?>" class="shadow">
                           
                                            </div>
                                            <h4 class="text-center"><?php echo $usuario->nombre; echo " ";echo $usuario->apellido ?></h4>
                                        </div>
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active" id="account-tab" data-toggle="pill"
                                                href="#account" role="tab" aria-controls="account" aria-selected="true">
                                                <i class="fa fa-home text-center mr-1"></i>
                                                Editar Datos
                                            </a>
                                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password"
                                                role="tab" aria-controls="password" aria-selected="false">
                                                <i class="fa fa-key text-center mr-1"></i>
                                                Cambiar Contraseña
                                            </a>
                                            <a class="nav-link" id="security-tab" data-toggle="pill" href="#security"
                                                role="tab" aria-controls="security" aria-selected="false">
                                                <i class="fa fa-user text-center mr-1"></i>
                                                Security
                                            </a>
                                            <a class="nav-link" id="application-tab" data-toggle="pill"
                                                href="#application" role="tab" aria-controls="application"
                                                aria-selected="false">
                                                <i class="fa fa-tv text-center mr-1"></i>
                                                Application
                                            </a>
                                            <a class="nav-link" id="notification-tab" data-toggle="pill"
                                                href="#notification" role="tab" aria-controls="notification"
                                                aria-selected="false">
                                                <i class="fa fa-bell text-center mr-1"></i>
                                                Notification
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

                                        <!--EDITAR DATOS-->
                                        <div class="tab-pane fade show active" id="account" role="tabpanel"
                                            aria-labelledby="account-tab">

                                            <form action="./?op=actualizar" method="POST" name="formulario_profile"  enctype="multipart/form-data">
                                            <div class="titulo_perfil">
                                                <h3 class="mb-4">Editar Datos</h3>
                                                <button class="btn btn-primary" type="submit">Actualizar</button>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="nombre"
                                                            value="<?php echo $usuario->nombre; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Apellido</label>
                                                        <input type="text" class="form-control" name="apellido"
                                                            value="<?php echo $usuario->apellido; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Correo</label>
                                                        <input type="text" class="form-control" name="correo"
                                                            value="<?php echo $usuario->email; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Provincia</label>
                                                        <select class="form-control" name="provincia" id="provincia"
                                                            onchange="SelectDistritos()">
                                                            <?php foreach ($provincia as $p){ ?>
                                                            <option value="<?php echo $p->id_provincia; ?>">
                                                                <?php echo $p->nom_provincia; ?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Distrito</label>
                                                        <select name="distrito" id="distrito" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cambiar Foto</label>
                                                        <input accept="image/*" type="file" class="form-control p-0 border-0"
                                                name="foto" id="foto">
                                                    </div>
                                                </div>

                      

                                            </div>
                                            </form>
                                        </div>

                                        <!--CAMBIAR CONTRASEÑA-->
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                            aria-labelledby="password-tab">
                                            <div class="titulo_perfil">
                                                <h3 class="mb-4">Cambiar contraseña</h3>
                                                <button class="btn btn-primary">Actualizar</button>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Old password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Confirm new password</label>
                                                        <input type="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="tab-pane fade" id="security" role="tabpanel"
                                            aria-labelledby="security-tab">
                                            <div class="titulo_perfil">
                                                <h3 class="mb-4">Security Settings</h3>
                                                <button class="btn btn-primary">Actualizar</button>
                                            </div>
                                            <h3 class="mb-4"></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Two-factor auth</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="recovery">
                                                            <label class="form-check-label" for="recovery">
                                                                Recovery
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="tab-pane fade" id="application" role="tabpanel"
                                            aria-labelledby="application-tab">
                                            <div class="titulo_perfil">
                                                <h3 class="mb-4">Application Settings</h3>
                                                <button class="btn btn-primary">Actualizar</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="app-check">
                                                            <label class="form-check-label" for="app-check">
                                                                App check
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="defaultCheck2">
                                                            <label class="form-check-label" for="defaultCheck2">
                                                                Lorem ipsum dolor sit.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    </div>
    
    
    
                        <script src="public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="public/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/js/custom.js"></script>

     <!-- Required Js -->
     <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="assets/js/plugins/clipboard.min.js"></script>
    <script src="assets/js/uikit.min.js"></script>

    <script src="assets/js/plugins/apexcharts.min.js"></script>
</body>

</html>