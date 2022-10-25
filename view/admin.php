<?php


if ($_SESSION["acceso"] != true)
{
    header('Location: ?op=error');
} else {	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin - UTP</title>

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
                                <li class="breadcrumb-item">Configuración</li>
                                <li class="breadcrumb-item">Usuarios</li>
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
                            <h5>Lista de Usuarios</h5>



                            <div class="card-header-right">
                                

                                <button type="button"
                                        class="btn  btn-success" data-toggle="modal" data-target="#AddUserModal">
                                        <i class="feather icon-user-plus"></i> Crear Usuario</button>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nombre</th>
                                            <th class="border-top-0">Apellido</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Tipo</th>
                                            <th class="border-top-0">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $n=1;
                                    foreach ($listaUsuario as $lista) {
                                    ?>
                                        <tr>
                                            <td><?php echo $n; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->nombre; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->apellido; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->email; ?></td>
                                            <td><span class="text-success"><?php ?></span></td>
                                            <td class="txt-oflo"> 

                                                <button type="button"
                                                        class="btn  btn-danger" data-toggle="modal"
                                                        data-target="#DeleteUserModal"><i
                                                            class="feather icon-trash"></i></button>

                                                            <a href="?op=admin&id_u=<?php echo $lista->id;?>"><button type="button" class="btn  btn-primary" href=""
                                                        data-toggle="modal" data-target="#EditUserModal"><i
                                                            class="feather icon-edit"></i></button></a>

                                                
                                            </td>
                                        </tr>
                                        <?php
                                        $n++;
                                    }
                                    ?>

                                    </tbody>
                                </table>
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

    <!-- [ Crear Nuevo Usuario -modal ] start -->
    <div class="col-xl-4 col-md-6">
        <div class="card">
        
            <div class="card-body">
                <div id="AddUserModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Crear Nuevo Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                
                            
                            <form  action="./?op=creacionU" method="POST" name="formulario"  enctype="multipart/form-data">
                                            <div class="titulo_perfil">
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="nombre">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Apellido</label>
                                                        <input type="text" class="form-control" name="apellido">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Correo</label>
                                                        <input type="text" class="form-control" name="correo">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input type="text"  class="form-control" name="password1">
                                                    </div>
                                                </div>

                                               

                      

                                            </div>
                                            


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button class="btn  btn-success" type="submit">Añadir Usuario</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- [ Editar Usuario -modal ] start -->
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Vertically Centered 1</h5>
            </div>
            <div class="card-body">
                <div id="EditUserModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                
                            
                            <form action="./?op=actualizar" method="POST" name="formulario"  enctype="multipart/form-data">
                                            <div class="titulo_perfil">
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?php foreach ($listaUsuario as $lista => $lista->id){
                                                            echo $lista->nombre;
                                                        };?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" value="<?php echo $lista->apellido;?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Correo</label>
                                                        <input type="text" class="form-control" name="correo" value="<?php echo $lista->email;?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input type="text" class="form-control" name="contraseña">
                                                    </div>
                                                </div>

                                               

                      

                                            </div>
                                            


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn  btn-primary">Actualizar Usuario</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

 <!-- [ Borrar/Eliminar Usuario -modal ] start -->
    
    <div id="DeleteUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLiveLabel">Borrar Usuario</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<p>Estas seguro que quieres borrar el usuario <strong><?php echo $lista->nombre;?></strong>!</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
										<a href="?op=borrar&id_u=<?php echo $lista->id;?>"><button type="button" class="btn  btn-danger">Eliminar</button></a>
									</div>
								</div>
							</div>
						</div>

    <!-- Required Js -->

    <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
    </script>
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