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
    <link rel="stylesheet" href="public/css/cambiarContra.css">
  
</head>

<body class="text-center">

    <div class="container">
        <form name="formulario" method="POST" action="./?op=cambiarContrasenia&e=<?php echo $_GET['e']?>" onSubmit="return ComprobarClave()">
            <img class="logo_texto" src="public/images/utp.svg" alt="">
            <h2 class="fw-normal">Ingrese su nueva contraseña dos veces</h1>
            <div class="w-75">
                <input type="password" class="form-control" id="floatingInput" name="password1" placeholder="nueva contraseña" required>
                <label for="floatingInput">Contraseña</label>
            </div>
            <div class="w-75">
                <input type="password" class="form-control" id="floatingInput" name="password2" placeholder="repita su nueva contraseña" required>
                <label for="floatingInput">Confirmar contraseña</label>
            </div>


            </br>

            <button class="btn btn-primary btn-lg w-75" type="submit" onClick="">Restaurar mi contraseña</button>

            <div class="">
                <div class="links">
                    ¿Ya tiene cuenta?<a href="./" class="btn btn-link">Acceder al Sistema</a>
                </div>
        </form>
    </div>

    <script>
        function ComprobarClave() {
            contra1 = document.formulario.password1.value
            contra2 = document.formulario.password2.value

            if (contra1 != contra2) {
                alert("Las dos claves no son iguales...");
                return false;
            }
        }
    </script>

</body>

</html>