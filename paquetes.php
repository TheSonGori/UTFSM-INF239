<?php
  include("config/config.php");

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
  }else{
    $id = $_SESSION['id'];
    $nombre = $_SESSION['usuario'];
    $correo =  $_SESSION['email'];
    $cumple = $_SESSION['birthday'];
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

  <title>Paquetes | PrestigeTravels</title>

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
            <span class="text">Top 10</span>
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
<<<<<<< HEAD

  <div class="paquetes-center">
    <h1>TOP 10 MEJORES RESEÑAS DE HOTELES</h1>
    <?php include("config/hotel.php"); ?>
  </div>

  <div class="paquetes-center" style="display:none">
    <h1>TOP 10 MEJORES RESEÑAS DE PAQUETES</h1>
    <?php include("config/packages.php"); ?>
  </div>
  
=======
 <div class="paquetes-center">


<?php

require_once "db.php";

$query = "SELECT * FROM bodega";
$result = $conexion->query($query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>".$row['titulo']."</h2>";
    echo "<h3>".$row['datos']."</h3>";
    echo "<h3>Cantidad: ".$row['cantidad']."</h3>";
    echo "<h2>Precio: ".$row['precio']."</h2>";
    echo "<h4><a href='add_carrito.php?id=" . $row["id"] . "'>Agregar al carrito</a></h4>";
    echo "<h4><a href='add_wishlist.php?id=" . $row["id"] . "'>Agregar a la wishlist</a></h4>";
    echo "<hr>";
}

?>
</div>
>>>>>>> 92ff3c01955954ec0dda45055027e42839dbd916
  
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
