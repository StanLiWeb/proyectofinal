<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="login.css">
    <title>Inicio de Sesión</title>
</head>

<body>
    <div class="auth-container">
        <h3 class="form-title">Bienvenido👋</h3>
        <p>Ingresa tus credenciales para continuar</p>
        <form class="auth-form" id="loginForm">
            <div class="login__box">
                <div class="login__input">
                    <i class="ri-user-3-line login__icon"></i>
                    <input type="text" id="email" name="email" placeholder="">
                    <label for="email">Correo electrónico</label>
                </div>
            </div>

            <div class="login__box">
                <div class="login__input">
                    <i class="ri-lock-line login__icon"></i>
                    <input type="password" id="password" name="password" placeholder="">
                    <label for="password">Contraseña</label>
                    <i class="ri-eye-line login__eye icon__eye"></i>
                </div>
            </div>

            <input class="login__button" type="submit" value="Iniciar Sesión">
        </form>
        <div class="auth-links">
            <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
            <a href="../register/registro.php">¿Deseas crear un nuevo usuario?</a>
        </div>
        <div id="mensaje_error"></div>
        <div id="mensaje_login_exito"></div>
    </div>

    <script>
      document.getElementById('loginForm').onsubmit = function(event) {
        event.preventDefault(); // Evita el envío del formulario y recarga de la página

        // Obtener valores de los campos
        var email = document.getElementById('email').value; // Cambiado a "email"
        var password = document.getElementById('password').value;

        // Validación de campos vacíos
        if (email == '') {
            document.getElementById('mensaje_error').innerHTML = '<center style="color: red;">Ingrese el correo electrónico</center>';
            return;
        }
        if (password == '') {
            document.getElementById('mensaje_error').innerHTML = '<center style="color: red;">Ingrese la contraseña</center>';
            return;
        }

        // Parámetros para la solicitud AJAX
        var parametros = {
            iniciarSesion: 1,
            email: email,
            password: password
        };

        $.ajax({
            url: "../../../controllers/controllerUser.php",
            type: "POST",
            data: parametros,
            dataType: "html",
            success: function (datos)
           {
            console.log(datos);
            if(datos=='SI')
                {
                    window.location.href= "../../dashboard/dashboard.php";
                }
                else
                {
                    document.getElementById('mensaje_error').innerHTML = '<center style="color: red;">Correo electrónico o contraseña incorrectos</center>';
                }
			}
        });
    };
    </script>
</body>

</html>
