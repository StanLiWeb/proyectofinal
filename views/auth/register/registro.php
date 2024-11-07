<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="registro.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Registro</title>
</head>

<body>
    <div class="auth-container">
        <h2 class="form-title">Registro 📝</h2>
        <form class="auth-form" id="registroForm">
            <!-- Nombre de Usuario -->
            <div class="login__box">
                <div class="login__input">
                    <i class="ri-user-3-line login__icon"></i>
                    <input type="text" id="username" name="username" placeholder="" required autofocus> 
                    <label for="username">Nombre de usuario</label>
                </div>
            </div>
            <!-- Correo electrónico -->
            <div class="login__box">
                <div class="login__input">
                    <i class="ri-mail-line login__icon"></i>
                    <input type="email" id="email" name="email" placeholder="" required>
                    <label for="email">Correo electrónico</label>
                </div>
            </div>
            <!-- Contraseña -->
            <div class="login__box">
                <div class="login__input">
                    <i class="ri-lock-line login__icon"></i>
                    <input type="password" id="password" name="password" placeholder="" required>
                    <label for="password">Contraseña</label>
                    <i class="ri-eye-line icon__eye"></i>
                </div>
            </div>
            <!-- Confirmación de Contraseña -->
            <div class="login__box">
                <div class="login__input">
                    <i class="ri-key-line login__icon"></i>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="" required>
                    <label for="confirm_password">Repetir contraseña</label>
                </div>
            </div>
            <input class="login__button" type="submit" value="Registrar">
        </form>

        <div class="auth-links">
            <a href="../login/login.php">Iniciar sesión</a>
        </div>
        <div id="mensaje_error_registro"></div>
        <div id="mensaje_exito_registro"></div>
    </div>

    <script>
        document.getElementById('registroForm').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío del formulario y recarga de la página

            // Obtener valores de los campos
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            // Validación de campos

            if (username == '') {
                document.getElementById('mensaje_error_registro').innerHTML = '<center>Ingrese el usuario</center>';
            }
            if (password == '') {
                document.getElementById('mensaje_error_registro').innerHTML = '<center>Ingrese la contrase\u00F1a</center>';
            }
            if (password != confirmPassword) {
                document.getElementById('mensaje_error_registro').innerHTML = '<center> Las contrasenas no son iguales</center>';
            } else {
                var parametros = {
                    registrarUsuario: 1,
                    email: email,
                    username: username,
                    password: password
                };

                $.ajax({
                    url: "../../../controllers/controllerUser.php",
                    type: "POST",
                    data: parametros,
                    dataType: "html",
                    success: function(datos) {
                        if (datos == 'SI') {
                            document.getElementById('mensaje_exito_registro').innerHTML = '<center >El correo electrónico o el nombre de usuario ya están en uso</center>';
                            document.getElementById('username').value = '';
                            document.getElementById('email').value = '';
                            document.getElementById('password').value = '';
                            document.getElementById('confirm_password').value = '';
                        } else {
                            document.getElementById('mensaje_error_registro').innerHTML = '<center>Registro exitoso</center>';
                        }
                    }
                });

            }
        };

    
    </script>
</body>

</html>