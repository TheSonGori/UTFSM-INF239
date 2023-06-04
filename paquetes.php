<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href=".css/Navegator.css">
  <link rel="stylesheet" href=".css/paquetes.css">
  
  <title>Paquetes</title>

</head>
<body>
  <header>
    <div class="Logo">
      <img src=".imagenes/menu/LOGO.jpg" alt="PrestigeTravels">
    </div>

    <div class="Navigation">
      <ul>
        <li class="list">
          <a href="menu.php" >
            <span class="icon">
              <ion-icon name="search-outline"></ion-icon>
            </span>
            <span class="text">Buscar</span>
          </a>
        </li>
  
        <li class="list active">
          <a href="paquetes.php" >
            <span class="icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </span>
            <span class="text">Paquetes</span>
          </a>
        </li>
  
        <li class="list">
          <a href="ofertas.php" >
            <span class="icon">
              <ion-icon name="rocket-outline"></ion-icon>
            </span>
            <span class="text">Ofertas</span>
          </a>
        </li>
  
        <li class="list">
          <a href="carrito.php" >
            <span class="icon">
              <ion-icon name="cart-outline"></ion-icon>
            </span>
            <span class="text">Carrito</span>
          </a>
        </li>
  
        <li class="list">
          <a href="perfil.php">
            <span class="icon">
              <ion-icon name="person-outline"></ion-icon>
            </span>
            <span class="text">Perfil</span>
          </a>
        </li>
        <div class="indicator"></div>
      </ul>
    </div>

  </header>


<div class="center-rectangle">


<?php

require_once "db.php";

$query = "SELECT * FROM bodega";
$result = $conexion->query($query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>".$row['titulo']."</h2>";
    echo "<h3>".$row['datos']."</h3>";
    echo "<h3>Cantidad: ".$row['cantidad']."</h3>";
    echo "<p>Precio: ".$row['precio']."</p>";
    echo "<td><a href='add_carrito.php?id=" . $row["id"] . "'>Agregar al carrito</a></td>";
    echo "<hr>";
}

?>
</div>

  
  <script>
    const list = document.querySelectorAll('.list');
    function activeLink(){
      list.forEach((item) =>
      item.classList.remove('active'));
      this.classList.add('active')
    }
    list.forEach((item) =>
    item.addEventListener('click', activeLink));
  </script>

  <script src=".js/transition.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>