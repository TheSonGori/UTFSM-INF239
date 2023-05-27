<?php 

include("config.php");

if (isset($_POST['register'])) {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['dateofbirthday'])
    ) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $date = date('Y-m-d', strtotime($_POST['dateofbirthday']));
        
        // Verificar si el email ya existe en la base de datos
        $consulta = "SELECT * FROM users WHERE email='$email'";
        $resultado = mysqli_query($conex, $consulta);
        
        if (mysqli_num_rows($resultado) > 0) {
            ?>
                <h3 class="error">El email ya está registrado</h3>
            <?php
        } else {
            // Insertar el nuevo registro
            $consulta = "INSERT INTO users (username, email, passwordd, birthday) 
                VALUES ('$name', '$email', '$password', '$date')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado) {
                ?>
                    <h3 class="success">Tu registro se ha completado</h3>
                <?php
            } else {
                ?>
                    <h3 class="error">Ocurrió un error al registrar</h3>
                <?php
            }
        }
    } else {
        ?>
            <h3 class="error">Llena todos los campos</h3>
        <?php
    }
}
?>