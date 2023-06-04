<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="../.css/index.css"/>
    <script src="../.js/register.js"></script>
  </head>
  <body>
    <ul class="notifications"></ul>

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
                    $alertType = 'info';
                } else {
                    // Insertar el nuevo registro
                    $consulta = "INSERT INTO users (username, email, passwordd, birthday) 
                        VALUES ('$name', '$email', '$password', '$date')";
                    $resultado = mysqli_query($conex, $consulta);

                    if ($resultado) {
                        $alertType = 'success';
                    } else {
                        $alertType = 'error';
                    }
                }
            } else {
                $alertType = 'warning';
            }
        }
    ?>
    <script>
        window.onload = function() {
            createToast('<?php echo $alertType; ?>');
        };
    </script>
  </body>
</html>
