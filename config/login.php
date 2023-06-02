<?php
    include("config.php");

    $correo = $_POST['cuenta_email'];
    $contra = $_POST['cuenta_contrasena'];

    $validar = mysqli_query($conex, "SELECT * FROM users WHERE 
    email='$correo' AND passwordd='$contra'");

    if(mysqli_num_rows($validar) > 0){
        $_SESSION['usuario'] = $correo;
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