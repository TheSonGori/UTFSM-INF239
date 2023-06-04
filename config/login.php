<?php
    include("config.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $correo = $_POST['cuenta_email'];
    $contra = $_POST['cuenta_contrasena'];

    $validar = mysqli_query($conex, "SELECT * FROM users WHERE 
    email='$correo' AND passwordd='$contra'");

    if(mysqli_num_rows($validar) > 0){

        $usuario = mysqli_fetch_assoc($validar);

        $id = $usuario['Id_User'];
        $nombre = $usuario['username'];
        $birthday = $usuario['birthday'];

        $_SESSION['id'] = $id;
        $_SESSION['email'] = $correo;
        $_SESSION['usuario'] = $nombre;
        $_SESSION['birthday'] = $birthday;

        header("location: ../menu.php");
        exit;

    }else{
        echo '
            <script>
                alert("Usuario no existe, porfavor verifique los datos.");
                window.location = "../index.php";
            </script>    
            ';
        exit;
    }

?>