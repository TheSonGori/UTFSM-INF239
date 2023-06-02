<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destruir la sesión y redirigir al usuario a index.php
session_destroy();
header("Location: ../index.php");
exit();
?>
