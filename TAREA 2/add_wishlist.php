<?php
session_start();

if (isset($_GET["id"])) {
    $producto_id = $_GET["id"];

    // Agrega el producto al carrito
    if (!isset($_SESSION["wishlist"])) {
        $_SESSION["wishlist"] = array();
    }
    $_SESSION["wishlist"][$producto_id] = 1;

    // Redirige de vuelta a la página principal
    header("Location: paquetes.php");
    exit();
}
?>
