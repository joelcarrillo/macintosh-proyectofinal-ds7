<?php

session_start();// Comienzo de la sesión

//clase FPDF 
require 'public/fpdf/fpdf.php';

//Librería para enviar email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'public/phpmailer/src/Exception.php';
require 'public/phpmailer/src/PHPMailer.php';
require 'public/phpmailer/src/SMTP.php';
//------------------------------------------




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
            header('Location: ?op=login&msg=Su contraseña o usuario está incorrecto&t=text-danger');
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

        header('Location: ?op=misReservas&msg='.$this->resp);


    }

    public function MisReservas(){

        $id_usuario = $_SESSION["id"];
        $MisSolicitudes = new Reservas();
        $MisSolicitudes = $this->modeloReservas->ObtenerSolicitudesUser($id_usuario);

        require("view/misReservas.php");

    }
    
    public function SolicitudesReservas(){

        $MisSolicitudes = new Reservas();
        $MisSolicitudes = $this->modeloReservas->ObtenerReservasActivas();

        require("view/reservas.php");

    }

    public function ConfirmarSolicitudReservada(){

        $correo = $_GET['a'];
        $cod_salon = $_GET['b'];
        $fecha_reserva = $_GET['c'];
        $tiempo_inicio = $_GET['d'];
        $tiempo_final = $_GET['e'];
        $estado = $_GET['f'];
        $cod_Reserva = $_GET['g'];
        
        $CambiarEstado = new Reservas();
        $CambiarEstado = $this->modeloReservas->CambiarEstadoReserva($estado,$cod_Reserva);


        if($estado == 3){
            $estado = "Confirmada";
            $confirmed = "color: rgb(10, 150, 0)";
            $mensajeHTML = '
         <body style="margin: 0 2%;">
         <div style="width: auto; height: 40px; background-color: #2a2438; border-bottom: 2px black solid;"></div>
         <div
             style="background-color: #ffffff; height: auto; width: auto; border-left: 1px black solid; border-right: 1px black solid;">
             <div style="margin-bottom: 25px; text-align: center;">
                 <img style="margin-top: 40px;" src="https://i.imgur.com/02Tsyqi.png" width="125px" height="125px">
             </div>
             <h1
                 style="margin: 0; color: #000000; direction: ltr; font-size: 36px; font-weight: 500; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 15px;">
                 <strong>Confirmacion para reserva de aula</strong>
             </h1>
             <div style="font-family: Arial, sans-serif">
                 <p style="margin: 0; text-align: center;"><span style="font-size:18px;color:#393d47;">Su reserva del dia
                         <b>'.$fecha_reserva.'</b> en el salon <b>'.$cod_salon.'</b> de <b>'.$tiempo_inicio.'</b> a <b>'.$tiempo_final.'</b></span></p>
                 <p style="margin-bottom: 25px; text-align: center;"><span
                         style="font-size:18px;color:#393d47;padding-bottom: 25px;">
                         ha sido <b><span style="font-size: 22px;'.$confirmed.'">'.$estado.'</b></span></span></p>
                 <p style="margin-bottom: 15px; text-align: center;"><span
                         style="font-size:14px; color:#393d47; padding-bottom: 25px;">
                         favor, si de percibir algun error o inconveniente comunicarse con el administrador</span></p>
                 <div style="padding-bottom: 20px;">
                     <div style="text-align: center;">
                         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-right: 5px;"
                                 src="https://i.imgur.com/sRnL0im.png" alt="" width="40px" height="40px"></a>
                         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-left: 5px;"
                                 src="https://i.imgur.com/9xRA1h4.png" alt="" width="40px" height="40px"></a>
                     </div>
                 </div>
             </div>
             <p style="text-align: center; font-size: 9px; padding-bottom: 20px;">UTP © 2022 - Macintosh Projects</p>
         </div>
         <div style="width: auto; height: 40px; background-color: #2a2438; border-top: 2px black solid;">
         </div>
     </body>
         ';
        }else{
            $estado = "Rechazada";
            $rechazao = "color: rgb(255, 32, 32);";
            $mensajeHTML = '
         <body style="margin: 0 2%;">
         <div style="width: auto; height: 40px; background-color: #2a2438; border-bottom: 2px black solid;"></div>
         <div
             style="background-color: #ffffff; height: auto; width: auto; border-left: 1px black solid; border-right: 1px black solid;">
             <div style="margin-bottom: 25px; text-align: center;">
                 <img style="margin-top: 40px;" src="https://i.imgur.com/02Tsyqi.png" width="125px" height="125px">
             </div>
             <h1
                 style="margin: 0; color: #000000; direction: ltr; font-size: 36px; font-weight: 500; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 15px;">
                 <strong>Confirmacion para reserva de aula</strong>
             </h1>
             <div style="font-family: Arial, sans-serif">
                 <p style="margin: 0; text-align: center;"><span style="font-size:18px;color:#393d47;">Su reserva del dia
                         <b>'.$fecha_reserva.'</b> en el salon <b>'.$cod_salon.'</b> de <b>'.$tiempo_inicio.'</b> a <b>'.$tiempo_final.'</b></span></p>
                 <p style="margin-bottom: 25px; text-align: center;"><span
                         style="font-size:18px;color:#393d47;padding-bottom: 25px;">
                         ha sido <b><span style="font-size: 22px;'.$rechazao.'">'.$estado.'</b></span></span></p>
                 <p style="margin-bottom: 15px; text-align: center;"><span
                         style="font-size:14px; color:#393d47; padding-bottom: 25px;">
                         favor, si de percibir algun error o inconveniente comunicarse con el administrador</span></p>
                 <div style="padding-bottom: 20px;">
                     <div style="text-align: center;">
                         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-right: 5px;"
                                 src="https://i.imgur.com/sRnL0im.png" alt="" width="40px" height="40px"></a>
                         <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-left: 5px;"
                                 src="https://i.imgur.com/9xRA1h4.png" alt="" width="40px" height="40px"></a>
                     </div>
                 </div>
             </div>
             <p style="text-align: center; font-size: 9px; padding-bottom: 20px;">UTP © 2022 - Macintosh Projects</p>
         </div>
         <div style="width: auto; height: 40px; background-color: #2a2438; border-top: 2px black solid;">
         </div>
     </body>
         ';
        }

         //Enviar email
         $mail = new PHPMailer(true);
         $mail->SMTPDebug = 0;                      //Enable verbose debug output
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = constant('CORREO_REMITENTE');                     //SMTP username
         $mail->Password   = constant('CORREO_PASS');                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
         $mail->Port       = 465;

         //Recipients
         $mail->setFrom(constant('CORREO_REMITENTE'), 'UTP-RESERVAS-SALONES-DS7');
         $mail->addAddress($correo);
         //plantilla HTML

         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'UTP-RESERVAS SALON '.$cod_salon;
         $mail->Body    = $mensajeHTML;
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         $mail->send();
         echo '<meta http-equiv="refresh" content="0;url=?op=solicitudesReservas&msg=Se ha enviado correctamente un correo electrónico para restablecer la contraseña&t=text-success">';
    }

    public function RechazarSolicitudReservada(){

        

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


    /* RECUPERAR CONTRASEÑA MEDIANTE CORREO ELECTRONICO */


    public function CambiarPass()
    {

        $consultarEmail = new Usuario();
        if ($consultarEmail = $this->model->ConsultarEmail($_REQUEST['correo'])) {
            $restablecer = new Usuario();
            $restablecer->restablecer = md5(rand(1, 1000));
            $restablecer->correo = $_REQUEST['correo'];
            $this->resp = $this->model2->IncluirHash($restablecer);
            //Enviar email
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = constant('CORREO_REMITENTE');                     //SMTP username
            $mail->Password   = constant('CORREO_PASS');                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom(constant('CORREO_REMITENTE'), 'UTP-RESERVAS-SALONES-DS7');
            $mail->addAddress($restablecer->correo);
            //plantilla HTML

            $mensajeHTML = '
            <body style="margin: 0 2%;">
            <div style="width: auto; height: 40px; background-color: #2a2438; border-bottom: 2px black solid;"></div>
            <div
                style="background-color: #ffffff; height: auto; width: auto; border-left: 1px black solid; border-right: 1px black solid;">
                <div style="margin-bottom: 25px; text-align: center;">
                    <img style="margin-top: 40px;" src="https://i.imgur.com/02Tsyqi.png" width="125px" height="125px">
                </div>
                <h1
                    style="margin: 0; color: #000000; direction: ltr; font-size: 28px; font-weight: 400; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 15px;">
                    <strong>Se le olvido su contrasenia?</strong>
                </h1>
                <div style="font-family: Arial, sans-serif">
                    <p style="margin: 0; text-align: center;"><span style="font-size:16px;color:#393d47;">Hemos recibido una
                            solicitud para recuperar contrasenia.</span></p>
                    <p style="margin-bottom: 15px; text-align: center;"><span
                            style="font-size:16px;color:#393d47; border-bottom: 1px solid #2a2438; padding-bottom: 25px;">Si
                            usted no ha hecho esta solicitud, simplemente ignore este email.</span></p>
                    <br>
                    <p style="margin-bottom: 30px; text-align: center;"><span style="font-size:18px;color:#000000;"><b>Haga
                                click a
                                este boton: </b></span></p>
                    <p style="margin-top: 40px; text-align: center;">
                        <a style="padding: 15px; border-radius: 15px; background-color: #2a2438; color: white; border: 1px #000000 solid; text-decoration: none;"
                            href="http://localhost/macintosh-proyectofinal-ds7/?op=validarHash&e=' . $restablecer->correo . '&h=' . $restablecer->restablecer . '">Cambiar
                            mi contrasenia</a></button>
                    </p>
                    <div style="padding-bottom: 40px;">
                        <div style="margin-top: 45px; text-align: center;">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-right: 5px;" src="https://i.imgur.com/sRnL0im.png" alt="" width="40px"
                                    height="40px"></a>
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img style="margin-left: 5px;" src="https://i.imgur.com/9xRA1h4.png" alt="" width="40px"
                                    height="40px"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: auto; height: 40px; background-color: #2a2438; border-top: 2px black solid;">
            </div>
            </body>
            ';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'UTP-RESERVAS-SALONES RECUPERAR CONTRASENIA';
            $mail->Body    = $mensajeHTML;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo '<meta http-equiv="refresh" content="0;url=?op=restablecerContra&msg=Se ha enviado correctamente un correo electrónico para restablecer la contraseña&t=text-success">';
            //header('Location:?op=restablecer&msg=Se ha enviado un correo electrónico para restablecer la contraseña&t=text-success');
        } else {
            header('Location: ?op=restablecerContra&msg=El Email no está registrado, deberá crear una cuenta&t=text-danger');
        }
    }

    /* FIN DE RECUPERAR CONTRASEÑA MEDIANTE CORREO ELECTRONICO */

    public function RestablecerPass()
    {
        require("view/restablecerContrasenia.php");
    }

    //se valida que el hash sea el mismo de ese correo y le da el privilegio de poder cambiar la contraseña

    public function ValidarHash(){
        $emailsazo = $_GET['e'];
        $hashsazo = $_GET['h'];

        if ($resultado = $this->model->ConsultarHash($emailsazo, $hashsazo)) {
            require("view/cambiarContra.php");
        } else {
            header('Location: ?op=login');
        }
    }
 

    //se cambia la contraseña

    public function CambiarContrasenia()
    {
        try{
            $usuario = new Usuario();
            $usuario->correo = $_GET['e'];
            $usuario->pass = md5($_POST['password1']);
            $this->resp = $this->model->ActualizarContra($usuario);
            header('Location: ?op=login&msg='.$this->resp);
        } catch(Exception $e) {
			header('Location: ?op=login&msg='.$this->resp);
		}
       
    }


   
}
