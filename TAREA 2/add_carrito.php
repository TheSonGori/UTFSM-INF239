<?php
session_start();

if (isset($_GET["id"])) {
    $producto_id = $_GET["id"];

    // Agrega el producto al carrito
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = array();
    }
    $_SESSION["carrito"][$producto_id] = 1;

    // Redirige de vuelta a la página principal
    header("Location: paquetes.php");
    exit();
}
?>
