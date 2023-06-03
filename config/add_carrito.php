<?php

require_once "config.php";


$idProducto = $_POST['id'];

$query = "SELECT * FROM bodega WHERE id = $idProducto";
$return = mysqli_query($conex, $query);
$producto = mysql_fetch_assoc($return);

if ($producto) {
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }//QUITAR

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Agregar el producto al carrito
    $_SESSION['carrito'][] = $producto;

    echo "¡Paquete agregado a carrito!";
} else {
    echo "Error";
}
?>