<?php
    include("config.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $id = $_SESSION['id'];

    if (isset($_POST['Actualizar'])) {
        // Obtener los datos enviados por el formulario
        $name = trim($_POST['name']);
        $correo = trim($_POST['email']);
        $password = trim($_POST['password']);
        $date = date('Y-m-d', strtotime($_POST['dateofbirthday']));

        // Actualizar los datos del usuario en la base de datos
        $actualizar = mysqli_query($conex, "UPDATE users SET username='$name', email='$correo', passwordd='$password', birthday='$date' WHERE Id_User='$id'");

        if ($actualizar) {
            $_SESSION['email'] = $correo;
            $_SESSION['usuario'] = $name;
            $_SESSION['birthday'] = $date;
        } 
    }

    //Redirigir a perfil
    header("location: ../perfil.php");
?>