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


                                <button type="button" class="btn  btn-success" data-toggle="modal"
                                    data-target="#AddUserModal">
                                    <i class="feather icon-user-plus"></i> Crear Usuario</button>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_list_users" class="table no-wrap">
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
                                            <td><?php echo $lista->id_usuario; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->nombre; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->apellido; ?></td>
                                            <td class="txt-oflo"><?php echo $lista->correo; ?></td>
                                            <td><strong class="text-success"><?php if($lista->tipo_usuario==1){echo 'Usuario';}else{echo 'Administrador';}?> </strong></td>
                                            <td class="txt-oflo">

                                                <button type="button" class="btn  btn-danger"
                                                    onclick="borrarUsuario('<?php echo $lista->id_usuario; ?>','<?php echo $lista->nombre.' '.$lista->apellido;  ?>')"
                                                    data-toggle="modal" data-target="#DeleteUserModal"><i
                                                        class="feather icon-trash"></i></button>

                                                <button
                                                        type="button" class="btn  btn-primary"
                                                        onclick="editarUsuario('<?php echo $lista->id_usuario; ?>','<?php echo $lista->nombre ?>','<?php echo $lista->apellido ?>','<?php echo $lista->correo ?>','<?php echo $lista->tipo_usuario ?>')"
                                                        data-toggle="modal" data-target="#EditUserModal" ><i
                                                            class="feather icon-edit"></i></button>


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


                                <form action="./?op=crearUser" method="POST" name="formulario"
                                    enctype="multipart/form-data">
                                    <div class="titulo_perfil">
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" required name="nombre">
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
                                                <input type="text" class="form-control" required name="correo">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input type="text" required class="form-control" name="password1">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo Usuario</label>
                                                <select name="tipo_usuario"
                                                    class="form-control" required>
                                                    <option value="1">Usuario</option>
                                                    <option value="2">Administrador</option>

                                                </select>
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


    <!-- [ Editar Usuario -modal ] start -->
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


                                <form action="./?op=actualizarUser" method="POST" name="formulario"
                                    enctype="multipart/form-data">
                                    <div class="titulo_perfil">
                                    </div>
                                    <div class="row">
                                    <input type="hidden" class="form-control" name="id_user" id="id_user_edit">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre_user_edit">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" class="form-control" name="apellido" id="apellido_user_edit">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="text" class="form-control" name="correo" id="correo_user_edit" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de Usuario</label>
                                                <div id="tipo_usuario_content">
                                                  
                                                </div>
                                               
                                            </div>
                                        </div>

                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn  btn-primary">Actualizar Usuario</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

    

    <!-- [ Borrar/Eliminar Usuario -modal ] start -->
    <div id="DeleteUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="./?op=borrarUser" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Borrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_user_delete" id="id_user_delete">
                        <p>Estas seguro que quieres borrar el usuario <strong><span
                                    id="name_user_delete"></span></strong>!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn  btn-danger">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Required Js -->
    <?php
include('layouts/scripts.php')
    ?>

    <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });
    </script>

    <script>
    function borrarUsuario(id_user, nombre_user) {
        document.getElementById("name_user_delete").innerHTML = nombre_user;
        document.getElementById("id_user_delete").value = id_user;
    }
    
    function editarUsuario(id_user, nombre_user,apellido_user,correo_user,tipo_user) {
        document.getElementById("nombre_user_edit").value = nombre_user;
        document.getElementById("apellido_user_edit").value = apellido_user;
        document.getElementById("correo_user_edit").value = correo_user;
        console.log("tipo_usuario: "+tipo_user);
        if(tipo_user==1){
            document.getElementById("tipo_usuario_content").innerHTML= '<select name="tipo_usuario" class="form-control"><option value="1">Usuario</option><option value="2">Administrador</option></select>';
        }else{
            document.getElementById("tipo_usuario_content").innerHTML= '<select name="tipo_usuario" class="form-control"><option value="2">Administrador</option><option value="1">Usuario</option></select>';
        }
        document.getElementById("id_user_edit").value = id_user;
    }
    </script>

    <script>
    $(document).ready(function() {
        $('#table_list_users').DataTable({
            searching: true,
            ordering: true,
            dom: 'Bfrtip',
            language: {
                search: '<i class="bi bi-search"></i> Buscar',
                zeroRecords: 'No hay registros para mostrar.',
                emptyTable: 'La tabla está vacia.',
                info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
                infoFiltered: "(Filtrados de _MAX_ Registros.)",
                paginate: {
                    first: 'Primero',
                    previous: 'Anterior',
                    next: 'Siguiente',
                    last: 'Último'
                }
            }
        });
    });
    </script>




</body>


</html>

<?php
}
?>