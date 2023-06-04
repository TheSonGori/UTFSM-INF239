<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
  }


  require_once "db.php";

  $carrito = $_SESSION["carrito"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href=".css/Navegator.css">
  <link rel="stylesheet" href=".css/carrito.css">

  <title>Carrito</title>

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
            <span class="text">Paquetes</span>
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
  
        <li class="list active">
          <a href="carrito.php">
            <span class="icon">
              <ion-icon name="cart-outline"></ion-icon>
            </span>
            <span class="text">Carrito</span>
          </a>
        </li>
  
        <li class="list">
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


<div class="center-rectangle">

<?php

require_once "db.php";

$carrito = $_SESSION["carrito"];
?>

<html>

<body style="text-align:center;">
  
        <?php
        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            foreach ($carrito as $producto_id => $cantidad) {
                
                $query = "SELECT * FROM bodega WHERE id = $producto_id";
                $resultado = $conexion->query($query);
                if ($resultado->num_rows > 0) {
                    $producto = $resultado->fetch_assoc();
                    
                    echo "<h2>".$producto['titulo']."<h2>";
                    echo "<p>Valor: ".$producto['precio']."</p>";
                    echo "<hr>";
                    
                }
            }
        }
        else echo "El carrito esta vacio";

        ?>
    <form method="post">
        <input type="submit" name="comprar" value="Comprar">
    </form>
</body>
</html>

<?php

if (isset($_POST["comprar"])){
    echo "Compra realizada";
    unset($_SESSION["carrito"]);
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



