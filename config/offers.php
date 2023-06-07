<?php

    include("config.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $nombre = $_SESSION['usuario'];
    $id = $_SESSION['id'];

    // Verificar si el evento aleatorio ocurre
    if (mt_rand(1, 10) == 1) {
        ?>
        <div class="ofertas-center2">
            <h1>¡Enhorabuena, <?php echo $nombre; ?>!</h1>
            <h2>Has obtenido un descuento del 10% para tu próxima compra.</h2>
            <h2>¿Deseas aplicar este descuento en la próxima compra?</h2>

            <form method="post">
                <input type="submit" class="button" value="Aceptar" name="Aceptar" />
                <input type="submit" class="button-bad" value="Rechazar" name="Rechazar" />
            </form>
        </div>

        <?php

        if (isset($_POST['Aceptar'])) {
            $des = 10;
            $actualizar = mysqli_query($conex, "UPDATE users SET descuento='$des' WHERE Id_User='$id'");

            //echo "Descuento aceptado. Agregado para tu proxima compra!."; //Hacerlo Alerta
        }

        if (isset($_POST['Rechazar'])) {
            //echo "Descuento rechazado."; //Hacerlo Alerta
        }
    } else {
        ?>
        <div class="ofertas-center">
            <h1>¡Casi, <?php echo $nombre; ?>!</h1>
            <h2>No has obtenido ningún descuento en esta ocasión.</h2>
        </div>
        <?php
    }

?>

    
