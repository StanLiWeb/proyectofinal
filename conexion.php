<?php
$bd_host = "localhost";
$bd_usuario = "root";
$bd_pass = "";
$bd_base = "proyecto";

$conexion = new mysqli($bd_host, $bd_usuario, $bd_pass, $bd_base);

if ($conexion->connect_error) {
    die("Error en la conexión: ");
}
?>
