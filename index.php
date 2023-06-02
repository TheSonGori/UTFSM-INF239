<?php
  session_start();

  if(isset($_SESSION['usuario'])){
    header("location: menu.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href=".css/index.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>PrestigeTravels</title>

  </head>

  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <img src=".imagenes/index/logo.png" alt="PrestigeTravels">
        <button class="button" id="form-open">Inicia Sesión</button>
      </nav>
    </header>

    <!-- Home -->
    <section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>

        <!-- Login.php -->
        <div class="form login_form">
          <form action="config/login.php" method="post">
            <h2>Inicia Sesión</h2>

            <div class="input_box">
              <input name="cuenta_email" type="email" placeholder="Correo"/>
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input name="cuenta_contrasena" class="move" type="password" placeholder="Contraseña"/>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Recuerdame</label>
              </span>
              <a href="#" class="forgot_pw">Ayuda</a>
            </div>

            <button class="button">Enviar</button>

            <div class="login_signup">¿No tienes cuenta? <a href="#" id="signup">Registrate</a></div>
          </form>

        </div>

        <!-- Register.php -->
        <div class="form signup_form">
          <form method="post">
            <h2>Registrate</h2>

            <div class="input_box">
              <input type="text" name="name" placeholder="Nombre y Apellido" required/>
              <i class="uil uil-user"></i>
            </div>

            <div class="input_box">
              <input name="email" type="email" placeholder="Correo" required/>
              <i class="uil uil-envelope-alt email"></i>
            </div>

            <div class="input_box">
              <input name="password" class="move" type="password" placeholder="Contraseña" required/>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="input_box">
              <input class="form-control" type="date" name="dateofbirthday" nameplaceholder="Fecha de Nacimiento" required/>
              <i class="uil uil-calender"></i>
            </div>

            <input class="button" type="submit" name="register" value="Enviar"/>

            <div class="login_signup">¿Ya tienes cuenta? <a href="#" id="login">Inicia sesión</a></div>
          </form>
          <?php include("config/register.php"); ?>

        </div>
      </div>

    </section>

    <!--Body-->
    <div class="overlay">
      <header class="bodyheader">
        <div class="menu-btn"></div>
        <div class="navigation">
          <div class="navigation-items">
          </div>
        </div>
      </header>
  
      <section class="bodyhome">
        <video class="video-slide active" src="1.mp4" autoplay muted loop></video>
        <video class="video-slide" src="2.mp4" autoplay muted loop></video>
        <video class="video-slide" src="3.mp4" autoplay muted loop></video>
        <video class="video-slide" src="4.mp4" autoplay muted loop></video>
        <video class="video-slide" src="5.mp4" autoplay muted loop></video>
        <div class="content active">
          <h1>Prestige.<br><span>Travels</span></h1>
          <p>Encontrar el alojamiento o el vuelo perfecto para tus próximas vacaciones nunca ha sido tan fácil. En PrestigeTravels, te ofrecemos una amplia selección de opciones y los mejores precios en hoteles y vuelos. Con solo unos clics, puedes comparar precios en tiempo real y encontrar ofertas exclusivas y descuentos especiales.</p>
          
        </div>
        <div class="content">
          <h1>Reserva.<br><span>con confianza y seguridad</span></h1>
          <p>Descubre los destinos más fascinantes y reserva tu escapada ideal con PrestigeTravels Encuentra los precios más competitivos en hoteles y vuelos, y reserva con total comodidad y seguridad.</p>
       
        </div>
        <div class="content">
          <h1>Aventuras.<br><span>Todo terreno</span></h1>
          <p>Explora el mundo con las mejores ofertas de Trivago.com y Despegar.com. Encuentra el hotel ideal para tu próxima aventura o el vuelo perfecto para tus vacaciones soñadas. Con nuestra comparación de precios en tiempo real, puedes estar seguro de obtener la mejor oferta disponible. Reserva de manera rápida y sencilla, y cuenta con nuestro equipo de atención al cliente las 24 horas para resolver cualquier duda o inconveniente. ¡Empieza a planificar tu viaje ahora y déjate llevar por la emoción de descubrir nuevos destinos!</p>
          
        </div>
        <div class="content">
          <h1>Viajemos.<br><span>Juntos</span></h1>
          <p>Te acercamos al viaje de tus sueños. Descubre una amplia gama de opciones de alojamiento y vuelos, con precios competitivos y descuentos exclusivos. Nuestro objetivo es facilitar tu experiencia de reserva, brindándote un proceso rápido y seguro. Confía en nuestras recomendaciones y opiniones de otros viajeros para tomar la mejor decisión. Siempre estamos aquí para ayudarte, con un equipo de atención al cliente disponible las 24 horas. ¡Prepárate para vivir una aventura inolvidable con nosotros!</p>
         
        </div>
        
        <div class="slider-navigation">
          <div class="nav-btn active"></div>
          <div class="nav-btn"></div>
          <div class="nav-btn"></div>
          <div class="nav-btn"></div>
        </div>
      </section>
      <script src=".js/body.js"></script>
    </div>

    <!--Footer-->
    <footer class="pie-pagina">
      <div class="grupo-1">
          <div class="box">
              <figure>
                  <a href="#">
                      <img src=".imagenes/index/FOOT.png" alt="PrestigeTravels">
                  </a>
              </figure>
          </div>
          <div class="box">

              <h2>SOBRE NOSOTROS</h2>
              <p>
                PrestigeTravels es una plataforma líder en viajes que ofrece servicios de reserva de vuelos, hoteles y paquetes turísticos. 
              </p>
              <p>
                Con una amplia variedad de opciones y una interfaz fácil de usar, PrestigeTravels ayuda a los usuarios a encontrar y reservar sus viajes de manera rápida y conveniente.
              </p>
          </div>
          <div class="box">
              <h2>SIGUENOS</h2>
              <div class="red-social">
                  <a href="#" class="fa fa-facebook"></a>
                  <a href="#" class="fa fa-instagram"></a>
                  <a href="#" class="fa fa-twitter"></a>
                  <a href="#" class="fa fa-youtube"></a>
              </div>
          </div>
      </div>
      <div class="grupo-2">
          <small>&copy; 2023 <b>PrestigeTravels</b> - Todos los Derechos Reservados.</small>
      </div>
    </footer>

    <script src=".js/login.js"></script>
    <script src=".js/register.js"></script>
    <script src=".js/index.js"></script>
  </body>
</html>
