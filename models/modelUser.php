<?php

session_start();
function iniciarSesion($parametro)
{
    include '../conexion.php';
    $email = $parametro['email'];
    $password = md5($parametro['password']);
    // consulta para verificar si el usuario existe
    $consulta = "SELECT username, password FROM usuarios WHERE email = '$email' AND password = '$password'";


    $ejecutar = $conexion->query($consulta);
    if ($ejecutar->num_rows > 0) {
        // Si el usuario existe
        $usuario = $ejecutar->fetch_assoc();
        $_SESSION['usuario'] = $usuario['username']; // Almacena el username en la sesión
        echo 'SI';
    } else {
        echo 'NO';
    }
}
function registrarUsuario($parametro)
{
    include '../conexion.php';
    $username = $parametro['username'];
    $email = $parametro['email'];
    $password = md5($parametro['password']);

    // Validar si ya existe el usuario
    $consulta_validar = "SELECT username FROM usuarios WHERE username ='$username'";
    $ejecutar = $conexion->query($consulta_validar);

    if ($ejecutar->num_rows > 0) {
        echo 'Existe';
    } else {
        $consulta = "INSERT INTO usuarios (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conexion->query($consulta) === TRUE) {
            echo 'Registro exitoso';
        } else {
            echo 'Error al registrar: ' . $conexion->error;
        }
    }
}
