<?php

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
  }else{
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
  <link rel="stylesheet" href=".css/dashboard.css">

  <title>Perfil | PrestigeTravels</title>

  <!-- Font Awesome -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
  />
  <!-- MDB -->
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
  rel="stylesheet"
  />

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
  
        <li class="list">
          <a href="paquetes.php" >
            <span class="icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </span>
            <span class="text">Top 10</span>
          </a>
        </li>
  
        <li class="list">
          <a href="ofertas.php">
            <span class="icon">
              <ion-icon name="rocket-outline"></ion-icon>
            </span>
            <span class="text">Ofertas</span>
          </a>
        </li>
  
        <li class="list">
          <a href="carrito.php">
            <span class="icon">
              <ion-icon name="cart-outline"></ion-icon>
            </span>
            <span class="text">Carrito</span>
          </a>
        </li>
  
        <li class="list active">
          <a href="perfil.php" >
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

  <div class="dashboard">
    <div class="a-navigation">
        <ul class="ul">
            <li class="li">
                <a class="a-dashboard" href="perfil.php">
                    <span class="a-icon"><ion-icon name="person"></ion-icon></span>
                    <span class="a-title">Mi Perfil</span>
                </a>
            </li>
            <li class="li">
                <a class="a-dashboard" href="perfil/wishlist.php">
                    <span class="a-icon"><ion-icon name="options"></ion-icon></span>
                    <span class="a-title">WishList</span>
                </a>
            </li>
            <li class="li">
                <a class="a-dashboard" href="perfil/reviews.php">
                    <span class="a-icon"><ion-icon name="chatbubble-ellipses"></ion-icon></span>
                    <span class="a-title">Reseñas</span>
                </a>
            </li>
            <li class="li">
                <a class="a-dashboard" href="perfil/shopping.php">
                    <span class="a-icon"><ion-icon name="wallet"></ion-icon></span>
                    <span class="a-title">Historial de Compras</span>
                </a>
            </li>
            <li class="li">
                <a class="a-dashboard" href="perfil/settings.php">
                    <span class="a-icon"><ion-icon name="cog"></ion-icon></span>
                    <span class="a-title">Configuracion</span>
                </a>
            </li>
            <li class="li">
                <a class="a-dashboard" href="config/logout.php">
                    <span class="a-icon"><ion-icon name="person-remove"></ion-icon></span>
                    <span class="a-title">Cerrar Sesion</span>
                </a>
            </li>
        </ul>
        <div class="toggle"></div>
    </div>
    </div>

  <img src=".imagenes/perfil/USER.png" alt="Foto de perfil" class="user-photo">
  <div class="center-rectangle">
    <h1><b><?php echo $nombre; ?></b></h1>
    <h2><b>Correo:</b> <?php echo $correo; ?></h2>
    <h2><b>Cumpleaños (Año - Mes - Día):</b> <?php echo $cumple; ?></h2>
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
  <script src=".js/perfil.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>