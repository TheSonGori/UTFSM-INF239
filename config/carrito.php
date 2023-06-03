
<html>
    <head>

    <title>
        Carrito
    </title>

    </head>

    <body style="text-align:center;">
        <h1 style="color:green;">
            Carrito de compras
        </h1>

        <h4>

        <?php

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }//QUITAR

            if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){

                foreach ($_SESSION['carrito'] as $producto) {
                    echo "<h2>".$producto['titulo']."<h2>";
                    echo "<p>Valor: ".$producto['precio']."</p>";
                    echo "<hr>";
                }
            }
            else echo "El carrito esta vacio";
        ?>

        </h4>
    <form method="post">
    <input type="submit" name="Comprar"
            class="button" value="Comprar" />
        
    </form>


    </body>
</html>
<?php

if (array_key_exists('Comprar', $_POST)){
    Comprar();
}
function Comprar(){
    echo "¡Compra realizada!";
}

?>

