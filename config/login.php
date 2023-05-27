<?php
include("config.php");

session_start();

if (isset($_POST['login'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        // Verificar si las credenciales son correctas
        $consulta = "SELECT * FROM users WHERE email='$email' AND passwordd='$password'";
        $resultado = mysqli_query($conex, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            // Inicio de sesión exitoso
            $_SESSION['email'] = $email;
            
            header("Location: ../home.php");
            exit();
        } else {
            ?>
                <h3 class="error">Credenciales inválidas</h3>
            <?php
        }
    } else {
        ?>
            <h3 class="error">Por favor, ingresa tu email y contraseña</h3>
        <?php
    }
}
?>




