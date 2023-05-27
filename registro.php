<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css/register.css">
    <title>PrestigeTravels</title>
</head>
<body>
    <form method="post">
        <h2>Crear una cuenta</h2>
        <p>Inicia tu regsitro</p>
        <div class="input-wrapper">
            <input type="text" name="name" placeholder="Nombre y Apellido">
            <img class="input-icon" src="Images/Icon/user.png" alt="">
        </div>

        <div class="input-wrapper">
            <input type="email" name="email" placeholder="Correo">
            <img class="input-icon" src="Images/Icon/email.png" alt="">
        </div>   

        <div class="input-wrapper">
            <input type="password" name="password" placeholder="Password">
            <img class="input-icon" src="Images/Icon/password.png" alt="">
        </div>   

        <div class="input-wrapper">
            <input class="form-control" type="date" name="dateofbirthday" placeholder="Fecha de Nacimiento">
            <img class="input-icon" src="Images/Icon/date.png" alt="">
        </div>   

        <input class="btn" type="submit" name="register" value="Enviar">

    </form>

    <?php
        include("config/register.php");
    ?>
</body>
</html>