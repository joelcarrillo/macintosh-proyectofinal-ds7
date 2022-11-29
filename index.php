<?php

//Incluyo los archivos necesarios
require("./controller/controller.php");

//Instancio el controlador
$controller = new Controller;

//Decido la ruta en función de los elementos del array
if (isset($_GET['op'])){

    $opcion=$_GET['op'];

    if ($opcion=="crear")
    {
    // Nos dirige a la vista de creacion del usuario
    $controller->crearUsuario();
    }

    elseif ($opcion=="acceder")
    {
    // Valida el acceso en el Login si existe o no el usuario 
    $controller->Ingresar();
    }

    elseif ($opcion=="creacion")
    {
    // Guarda los datos del registro de usuario
    $controller->Guardar();
    }

    elseif ($opcion=="permitido")
    {
    // Nos dirige a el Panel Principal
    $controller->IngresarPanel();
    }

    elseif ($opcion=="logout")
    {
    //Para cerrar la sesion
    $controller->Logout();
    }

    elseif ($opcion=="perfil")
    {

    $controller->Perfil();
    }
    elseif ($opcion=="facultades")
    {

    $controller->Facultades();
    }

    elseif ($opcion=="salones")
    {

    $controller->Salones();
    }

    elseif ($opcion=="horarios")
    {

    $controller->Horarios();
    }

    elseif ($opcion=="reservar")
    {

    $controller->Reservar();
    }
    elseif($opcion=="misReservas")
    {
    $controller->MisReservas();   
    }

    elseif($opcion=="solicitudesReservas")
    {
    $controller->SolicitudesReservas();   
    }

    elseif ($opcion=="restablecerContra"){

        //Llamo al método para ver la vista de restablecer la contraseña
        $controller->RestablecerPass();
    }
    elseif ($opcion=="verificaremail"){
        
        $controller->CambiarPass();
    }
    elseif ($opcion=="validarHash"){

        $controller->ValidarHash();
    }
    elseif ($opcion=="cambiarContrasenia"){

        $controller->CambiarContrasenia();
    }


    elseif ($opcion=="admin")
    {
    //Para cerrar la sesion
    $controller->IngresarAdmin();
    }

    
    elseif ($opcion=="borrarUser"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->BorrarUser();
    }

    elseif ($opcion=="creacionU")
    {
    // Guarda los datos del registro de usuario
    $controller->GuardarU();
    }

    elseif ($opcion=="crearUser")
    {
    // Guarda los datos del registro de usuario
    $controller->GuardarUsuario();
    }

    elseif ($opcion=="actualizar"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->ActualizarDatos();
    }

    elseif ($opcion=="actualizarUser"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->ActualizarUsuarios();
    }

    elseif ($opcion=="crearReserva"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->CrearReserva();
    }
    elseif($opcion=="login"){
        
        $controller->index();
    }
    
   // mandar confirmacion por correo
   elseif ($opcion == "confirmarSolicitud") {
    $controller->ConfirmarSolicitudReservada();
}
    
    

}
else{

    // Nos dirige a la pagina principal que en este caso es el Login
    $controller->index();
}