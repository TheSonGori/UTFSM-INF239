<?php
    include("config.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id = $_SESSION['id'];

    // Eliminar el usuario de la base de datos
    $eliminar = mysqli_query($conex, "DELETE FROM users WHERE Id_User='$id'");

    if ($eliminar) {
        // Eliminar la información de la sesión
        session_unset();
        session_destroy();
        
        // Redirigir al usuario a la página de confirmación
        header("Location: ../index.php");
        exit;
    } else {
        echo '
            <script>
                alert("Error al eliminar el usuario.");
                window.location = "../menu.php";
            </script>
        ';
    }
?>
