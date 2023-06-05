<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si el evento aleatorio ocurre
    if (mt_rand(1, 10) == 1) {
    
        $descuento = 0.1; // 10% de descuento

        $_SESSION['descuento'] = $descuento;
        ?>
        <div class="ofertas-center2">
            <h1>¡Enhorabuena!</h1>
            <h2>Has obtenido un descuento del 10% para tu proxima compra.</h2>
            <h2>¿Deseas aplicar este descuento en la proxima compra?</h2>

            <input type="submit" class="button" value="Aceptar"/>
            <input type="submit" class="button-bad" value="Rechazar"/>
        </div>
        <?php
    } else {
        ?>
        <div class="ofertas-center">
        <h1>¡Casi!</h1>
        <h2>No has obtenido ningun descuento en esta ocasión.</h2>
        </div>
        <?php
    }
    
?>
    
