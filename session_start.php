<?php
session_start();

// sin no existe un usuario vuelve a la pagina de login
if (!isset($_SESSION["email"], $_SESSION["clave"])) {
    header("Location: login.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
}
?>