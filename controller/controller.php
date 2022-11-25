<?php

session_start();// Comienzo de la sesión

require_once 'model/usuario.php';
require_once 'model/salones.php';
require_once 'model/reservas.php';

class Controller
{
    private $model;
    private $model2;
    private $modeloSalones;
    private $modeloReservas;
    private $resp;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->model2 = new Usuario();
        $this->modeloReservas = new Reservas();
        $this->modeloSalones = new Salones();
    }

    public function Index(){

        //Le paso los datos a la vista
        require("view/login.php");

    }

    public function Logout(){

        //Le paso los datos a la vista
        require("view/login.php");
	    session_destroy();

    }

    public function Perfil(){

        $usuario = new Usuario();
        $usuario = $this->model->Obtener($_SESSION['id']);

        //Le paso los datos a la vista
        require("view/perfil.php");

    }

    public function Facultades(){

        //Le paso los datos a la vista
        require("view/facultades.php");

    }

    public function Salones(){

        $idFac = $_GET['id_facultad'];

        $nombreFacultad = new Salones();
        $nombreFacultad = $this->modeloSalones->nombreFacultad($idFac);

        $referenciaSalones = new Salones();
        $referenciaSalones = $this->modeloSalones->ObtenerSalonesFacultad($idFac);
        
        //Le paso los datos a la vista
        require("view/elegirSalon.php");

    }


    public function Horarios(){

        $cod_salon = $_GET['cod_salon'];

        $listaHorasGenerales = new Usuario();
        $listaHorasGenerales = $this->modeloSalones->ObtenerHorasGenerales();

        
        $listaHorarioSalones = new Usuario();
        $listaHorarioSalones = $this->modeloSalones->ObtenerHorariosSalones($cod_salon);

        $listaDiasSemana = new Usuario();
        $listaDiasSemana = $this->modeloSalones->ObtenerDiasSemana();
        //Le paso los datos a la vista
        require("view/horarios.php");

    }

    public function CrearUsuario(){

        require("view/creacionUser.php");

    }

    public function IngresarPanel(){

        require("view/panel.php");
    }

    public function CrearSalon(){
        require("view/crearSalon.php");
    }
    public function Guardar(){
        $usuario = new Usuario();
        
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido = $_POST['apellido'];
        $usuario->correo = $_POST['correo'];  
        $usuario->telefono = $_POST['telefono'];  
        $usuario->pass = md5($_POST['password1']);    
      
        $this->resp= $this->model->Registrar($usuario);

        header('Location: ?op=crear&msg='.$this->resp);
    }

    public function Ingresar(){
        $ingresarUsuario = new Usuario();
        
        $ingresarUsuario->correo = $_REQUEST['correo'];  
        $ingresarUsuario->pass = md5($_REQUEST['password']);    

        //Verificamos si existe en la base de datos
        if ($resultado= $this->model->Consultar($ingresarUsuario))
        {
            $_SESSION["acceso"] = true;
            $_SESSION["foto"] = $resultado->foto;
            $_SESSION["user"] = $resultado->nombre." ".$resultado->apellido;
            $_SESSION["id"] = $resultado->id_usuario;
            $_SESSION["dni"] = $resultado->dni;
            
            header('Location: ?op=permitido');
        }
        else
        {
            header('Location: ?&msg=Su contraseña o usuario está incorrecto');
        }
    }

    public function ActualizarDatos(){
        
        $usuario = new Usuario();
        $usuario->nombre = $_REQUEST['nombre'];
        $usuario->apellido = $_REQUEST['apellido'];
        $usuario->telefono = $_REQUEST['telefono'];  
        $usuario->id_usuario = $_SESSION["id"];


        if (isset($_FILES['foto']))
        {
            move_uploaded_file($_FILES['foto']['tmp_name'], "./public/images/users/".$_SESSION["id"].".jpg");
            
            $usuario->foto = $_SESSION["id"].".jpg";

            $_SESSION["foto"]=$_SESSION["id"].".jpg";
        }
        else
        {
            $usuario->foto = $_SESSION["foto"];
        }
         
        
        $this->resp= $this->model->Actualizar($usuario);
       $_SESSION["user"] = $usuario->nombre." ".$usuario->apellido;
       $_SESSION["foto"] = $usuario->foto;


        header('Location: ?op=perfil&msg='.$this->resp);
    }

    public function Reservar(){

        
        $idFac = $_GET['idFac'];
        $cod_salon = $_GET['cod_salon'];

        $nombreFacultad = new Salones();
        $nombreFacultad = $this->modeloSalones->nombreFacultad($idFac);

        $referenciaSalones = new Salones();
        $referenciaSalones = $this->modeloSalones->ObtenerSalonesFacultad($idFac);

        $listaHorasGenerales = new Usuario();
        $listaHorasGenerales = $this->modeloSalones->ObtenerHorasGenerales();

        
        $listaHorarioSalones = new Usuario();
        $listaHorarioSalones = $this->modeloSalones->ObtenerHorariosSalones($cod_salon);

        //Le paso los datos a la vista
        require("view/crearReserva.php");

    }

    public function CrearReserva(){

        $reserva = new Reservas();
        
        $reserva->id_usuario = $_POST['id_usuario'];
        $reserva->cod_salon = $_POST['cod_salon'];
        $reserva->fecha_reserva = $_POST['fecha_reserva'];  
        $reserva->tiempo_inicio = $_POST['tiempo_inicio'];  
        $reserva->tiempo_final = $_POST['tiempo_final'];  
        $reserva->descripcion_reserva = $_POST['descripcion_reserva'];  
        $reserva->cantidad_reserva = $_POST['cantidad_reserva'];  
        
        $this->resp= $this->modeloReservas->GuardarReserva($reserva);

        header('Location: ?op=reservasActivas&msg='.$this->resp);


    }

    public function ReservasActivas(){

        $consultarReservas = new Reservas();
        $consultarReservas = $this->modeloReservas->ObtenerReservasActivas();

        require("view/reservas.php");

    }
    
    public function IngresarAdmin(){

        $listaUsuario = new Usuario();
        $listaUsuario = $this->model2->ObtenerTodosLosUsuarios();

        require("view/admin.php");
        
     
    }

    public function BorrarUser(){

        $usuario = new Usuario();
        $usuario->id = $_GET['id_u'];

        $this->resp= $this->model->BorrarUsuario($usuario);
        
        header('Location: ?op=admin&msg='.$this->resp);
    }

    public function GuardarU(){
        $usuario = new Usuario();
        
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido = $_POST['apellido'];
        $usuario->correo = $_POST['correo'];  
        $usuario->telefono = $_POST['telefono'];  
        $usuario->pass = md5($_POST['password1']);    
      
        $this->resp= $this->model->Registrar($usuario);

        header('Location: ?op=admin');
    }



   
}
