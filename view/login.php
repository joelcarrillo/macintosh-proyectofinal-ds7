<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    <link href="public/css/bootstrap.min.css" rel="stylesheet">




    <!-- Custom styles for this template -->
    <link href="public/css/inicio_sesion.css" type="text/css" rel="stylesheet">

</head>

<body>
<form method="POST" action="./?op=acceder" >
    <div class="cuerpo">
        
            <div class="section one">
                <center>
                    <h1 style="color: #4C2F6A;">Iniciar Sesión </h1>
                </center>
                <p class="text-danger"> <?php if (isset ($_GET['msg'])) echo $_GET['msg'];?> </p> 


                <div class="tit_osc">Ingrese su usuario</div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <input type="text" class="form-control" name="correo" placeholder="Usuario" aria-label="Username"
                        aria-describedby="basic-addon1" required>
                </div>

                <div class="tit_osc">Ingrese su contraseña</div>
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">*</span>
                    </div>
                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Username"
                        aria-describedby="basic-addon1" name="password" required>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

                <div style="margin-top: 15px;" class="d-flex justify-content-center links">
                    <a href="#">¿Olvido su contraseña?</a>
                              </div>

                              <div class="d-flex justify-content-center links">
      ¿Aún no tiene cuenta? -  <a href="?op=crear" class="ml-2"> Regístrese aquí </a>
    </div>
     
    </div>
    </form>
    <div class="section two">
        <img src="public/images/utp.svg" alt="">
    </div>

    </div>
  
</body>

</html>

