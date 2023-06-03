document.querySelector('.Navigation').addEventListener('click', function(event) {
  event.preventDefault(); // Evita la redirección predeterminada

  var enlace = event.target.closest('a');
  if (!enlace) return; // Si el clic no ocurre en un enlace, no hagas nada

  var elementosLi = Array.from(document.querySelectorAll('.Navigation ul li'));
  var indiceActivo = elementosLi.findIndex(function(li) {
    return li.classList.contains('active');
  });

  if (indiceActivo !== -1) {
    elementosLi[indiceActivo].classList.remove('active');
  }

  enlace.parentElement.classList.add('active');
  enlace.classList.add('animacion-inicio');

  var indicador = document.querySelector('.indicator');
  indicador.style.transform = `translateX(calc(70px * ${indiceActivo}))`;
  indicador.style.transition = 'transform 0.5s'; // Ajusta la duración de la transición

  setTimeout(function() {
    window.location.href = enlace.href; // Redirige al destino después del retraso
  }, 1000); // 500 milisegundos = 0.5 segundos
});