<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login</title>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/recuperarContra.css">

  </head>
  <body class="text-center">
    
<div class="container">
  <form method="POST" action="./?op=verificaremail" >
    <img class="logo_texto" src="public/images/utp.svg" alt="">
    <h1 class="fw-normal mb-2">Restablecer Contraseña</h1>
    <p class="<?php if (isset ($_GET['msg'])) echo $_GET['t'];?>"> <?php if (isset ($_GET['msg'])) echo $_GET['msg'];?> </p> 
    <div class="w-75">
      <input type="email" class="form-control mb-3" id="floatingInput" name="correo" placeholder="name@example.com" required>
      <label for="floatingInput">Ingrese su correo electronico</label>
    </div>

</br>
    <button class="btn btn-primary btn-lg w-75" type="submit">Mandar mensaje a mi correo electronico</button>
    <div class="">
    <div class="links">
       ¿Ya tiene cuenta?<a href="./" class="btn btn-link">Acceder al Sistema</a>
    </div>
  </form>
</div>


    
  </body>
</html>
