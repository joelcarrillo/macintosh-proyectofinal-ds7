<?php

session_start();// Comienzo de la sesión

require_once 'model/usuario.php';
require_once 'model/ubicacion.php';

class Controller
{
    private $model;
    private $model2;
    private $model3;
    private $model4;
    private $resp;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->model2 = new Ubicacion();
        $this->model3 = new Ubicacion();
        $this->model4 = new Usuario();
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

        $provincia =new Ubicacion();
        $provincia= $this->model2->ConsultarProvincia();

        $distritos =new Ubicacion();
        $distritos= $this->model3->ConsultarDistrito();


        //Le paso los datos a la vista
        require("view/perfil.php");

    }

    public function Facultades(){

        //Le paso los datos a la vista
        require("view/facultades.php");

    }

    public function Salones(){

        //Le paso los datos a la vista
        require("view/salones.php");

    }


    public function Horarios(){

        //Le paso los datos a la vista
        require("view/horarios.php");

    }

    
    

    public function CrearUsuario(){

        require("view/creacionUser.php");

    }

    public function IngresarPanel(){

        require("view/panel.php");
        
     
    }

    public function Guardar(){
        $usuario = new Usuario();
        
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido = $_POST['apellido'];
        $usuario->email = $_POST['correo'];  
        $usuario->pass = md5($_POST['password1']);    
      
        $this->resp= $this->model->Registrar($usuario);

        header('Location: ?op=crear&msg='.$this->resp);
    }

    public function Ingresar(){
        $ingresarUsuario = new Usuario();
        
        $ingresarUsuario->email = $_REQUEST['correo'];  
        $ingresarUsuario->pass = md5($_REQUEST['password']);    

        //Verificamos si existe en la base de datos
        if ($resultado= $this->model->Consultar($ingresarUsuario))
        {
            $_SESSION["acceso"] = true;
            $_SESSION["user"] = $resultado->nombre." ".$resultado->apellido;
            $_SESSION["foto"] = $resultado->foto;
            $_SESSION["id"] = $resultado->id;
            
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
        $usuario->id_distrito= $_REQUEST['distrito'];
        $usuario->id=$_SESSION["id"];


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

        //Le paso los datos a la vista
        require("view/panel.php");

    }

    public function ReservasActivas(){

        //Le paso los datos a la vista
        require("view/reservas.php");

    }
    
    public function IngresarAdmin(){

        $listaUsuario = new Usuario();
        $listaUsuario = $this->model4->ObtenerTodosLosUsuarios();

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
        $usuario->email = $_POST['correo'];  
        $usuario->pass = md5($_POST['password1']);    
      
        $this->resp= $this->model->Registrar($usuario);

        header('Location: ?op=admin');
    }

   
}
