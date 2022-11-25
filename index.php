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
    elseif($opcion=="reservasActivas")
    {
    $controller->ReservasActivas();   
    }

    elseif ($opcion=="admin")
    {
    //Para cerrar la sesion
    $controller->IngresarAdmin();
    }

    
    elseif ($opcion=="borrar"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->BorrarUser();
    }

    elseif ($opcion=="creacionU")
    {
    // Guarda los datos del registro de usuario
    $controller->GuardarU();
    }
    elseif ($opcion=="actualizar"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->ActualizarDatos();
    }

    elseif ($opcion=="crearReserva"){

        //Llamo al método ver pasándole la clave que me están pidiendo
    
        $controller->CrearReserva();
    }



}
else{

    // Nos dirige a la pagina principal que en este caso es el Login
    $controller->index();
}