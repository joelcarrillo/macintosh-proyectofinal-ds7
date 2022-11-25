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
    <link href="public/css/inicio_sesion.css" rel="stylesheet">
</head>

<body class="text-center">

    <form name="formulario" class="form-signin" method="POST" action="./?op=creacion" onSubmit="return ComprobarClave()">
        <div class="cuerpo">

            <div class="section one">

                <center>
                    <h2 style="color: #4C2F6A;">Crear Nuevo Usuario</h2>
                </center>
                <br>
                <p class="<?php if (isset($_GET['msg'])) echo $_GET['t']; ?>"> <?php if (isset($_GET['msg'])) echo $_GET['msg']; ?> </p>

                <div style="display:flex">
                    <div class="form-group" style="margin:5px">
                        <input type="text" class="form-control item" id="nombre" placeholder="Nombre" name="nombre" required>
                    </div>
                    <br>
                    <div class="form-group" style="margin:5px">
                        <input type="text" class="form-control item" id="apellido" placeholder="Apellido" name="apellido" required>
                    </div>

                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control item" id="correo" placeholder="Email" name="correo" required autofocus>
                </div>

                <br>
                <div class="form-group">
                    <input type="text" class="form-control item" id="telefono" placeholder="telefono" name="telefono" required autofocus>
                </div>
                <br>

                <div style="display: flex;">
                    <div class="form-group" style="margin:5px">
                        <input type="password" class="form-control item" id="password1" placeholder="Password" name="password1" required>
                    </div>
                    <br>
                    <div class="form-group" style="margin:2px">
                        <input type="password" class="form-control item" id="password2" placeholder="Password Nuevamente" name="password2" required>
                    </div>
                </div>
                <br>

                <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="comprobarClave()">Registrarse</button>



                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        ¿Ya tiene cuenta? - <a href="./" class="ml-2">Acceder al Sistema</a>
                    </div>

                </div>
            </div>

            <div class="section two">
                <img src="public/images/utp.svg" alt="">
            </div>

        </div>
    </form>

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