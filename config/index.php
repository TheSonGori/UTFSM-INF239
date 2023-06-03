<?php
// Incluir el archivo de conexión a la base de datos
require_once "config.php";

// Consulta para obtener los productos de la base de datos
$query = "SELECT * FROM bodega";
$result = mysqli_query($conex, $query);

// Mostrar los productos
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>".$row['titulo']."</h2>";
    echo "<h3>".$row['datos']."</h3>";
    echo "<h3>Cantidad: ".$row['cantidad']."</h3>";
    echo "<p>Precio: ".$row['precio']."</p>";
    echo "<button onclick='agregarAlCarrito(".$row['id'].")'>Agregar al carrito</button>";
    echo "<hr>";
}
?>

<script>
function agregarAlCarrito(idProducto) {
    fetch('add_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + idProducto
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    });
}
</script>
