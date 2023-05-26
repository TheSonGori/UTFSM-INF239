<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PrestigeTravels</title>
    <link rel="stylesheet" href=".css/index.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <header>
        <div class="Logo">
            <img src="Images/LOGO.jpg" alt="Logo PrestigeTravels">
        </div>
        
        <a href="#" class="boton">
            <span id="span1"></span>
            <span id="span2"></span>
            <span id="span3"></span>
            <span id="span4"></span>
            Inicia Sesión
        </a>

    </header>

    <div class = "Body">
      <div class="slider">
        <div class="slides">

          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">

          <div class="slide first">
            <img src="Images/Slider/1.gif" alt="">
          </div>
          <div class="slide">
            <img src="Images/Slider/2.gif" alt="">
          </div>
          <div class="slide">
            <img src="Images/Slider/3.gif" alt="">
          </div>
          <div class="slide">
            <img src="Images/Slider/4.gif" alt="">
          </div>

          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>

        </div>

        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>

      </div>
    </div>

    <footer class="pie-pagina">
      <div class="grupo-1">
          <div class="box">
              <figure>
                  <a href="Buscar.html">
                      <img src="Images/FOOT.png" alt="Logo PrestigeTravels">
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
                  <a href="index.html" class="fa fa-facebook"></a>
                  <a href="index.html" class="fa fa-instagram"></a>
                  <a href="index.html" class="fa fa-twitter"></a>
                  <a href="index.html" class="fa fa-youtube"></a>
              </div>
          </div>
      </div>
      <div class="grupo-2">
          <small>&copy; 2023 <b>PrestigeTravels</b> - Todos los Derechos Reservados.</small>
      </div>
  </footer>

    <script type="text/javascript">
      var counter = 1;
      setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 4){
          counter = 1;
        }
      }, 5000);
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  </body>
</html>
