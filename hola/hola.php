<!DOCTYPE html>
<?php
require_once('./config/conexion.php');



?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olvido su contraseña</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./estilos/HeaderFooter.css">
  <link rel="stylesheet" type="text/css" href="./estilos/informacion.css">
  <style>
    .inicio{
    padding-bottom: 100px;
    margin-top: 50px;
}
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="content">
      <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
        <div class="container-fluid" id="header">
          <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link rojo" id="mapa" href="./mapa.php">Mapa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link amarillo" id="calendario" href="./calendario.php">Calendario</a>
              </li>
              <?php
              if (isset($_SESSION['user_id'])) {
                echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">registra tu establecimiento</a>
                            </li>';
              } else {
                echo '';
              }
              include('modales_usuario.php');
              ?>
            </ul>
          </div>
        </div>
      </nav>

      <div class="inicio">
        <input type="text" id="searchInput" placeholder="Buscar tarjetas">

        <!-- Dividir las tarjetas en dos contenedores separados -->
        <div class="cards" id="page1">
          <!-- ... Tus primeras 8 tarjetas van aquí1 ... -->
          <div class="card" id="card1">
            <img class="card__image" src="./Imagenes/parques/Parque Central Bavaria.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Bavaria
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./mundo_aventura.php" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card " id="card2">
            <img class="card__image" src="./Imagenes/parques/jardin-botanico-de-bogota.jpg" alt="">
            <div class="card__content">
              <h3>
                Jardín Botánico Jose Celestino Mutis
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card3">
            <img class="card__image" src="./Imagenes/parques/Parque 93.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque 93
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card4">
            <img class="card__image" src="./Imagenes/parques/Parque Central Simon Bolivar.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Simon Bolivar
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card5">
            <img class="card__image" src="./Imagenes/parques/parque usaquen.png" alt="">
            <div class="card__content">
              <h3>
                Parque de Usaquen
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card6">
            <img class="card__image" src="./Imagenes/parques/Parque El Virrey.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Virrey
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card7">
            <img class="card__image" src="./Imagenes/parques/Parque El Lago.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Lago
              </h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ducimus id ab tenetur delectus reiciendis
                fugit autem qui at.
              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card8">
            <img class="card__image" src="./Imagenes/parques/Parque de Los Novios.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque de Los Novios
              </h3>
              <p>

              </p>

            </div>

            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
        </div>

        <div class="cards" id="page2">
          <!-- ... Tus siguientes 8 tarjetas van aquí ... -->
          <div class="card" id="card1">
            <img class="card__image" src="./Imagenes/parques/Parque Central Bavaria.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Bavaria
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./mundo_aventura.php" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card " id="card2">
            <img class="card__image" src="./Imagenes/parques/jardin-botanico-de-bogota.jpg" alt="">
            <div class="card__content">
              <h3>
                Jardín Botánico Jose Celestino Mutis
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card3">
            <img class="card__image" src="./Imagenes/parques/Parque 93.jpeg" alt="">
            <div class="card__content">
              <h3>
                Parque 93
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card4">
            <img class="card__image" src="./Imagenes/parques/Parque Central Simon Bolivar.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque Central Simon Bolivar
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card5">
            <img class="card__image" src="./Imagenes/parques/parque usaquen.png" alt="">
            <div class="card__content">
              <h3>
                Parque de Usaquen
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card6">
            <img class="card__image" src="./Imagenes/parques/Parque El Virrey.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Virrey
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card7">
            <img class="card__image" src="./Imagenes/parques/Parque El Lago.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque El Lago
              </h3>
              <p>

              </p>
            </div>
            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>
          </div>
          <div class="card" id="card8">
            <img class="card__image" src="./Imagenes/parques/Parque de Los Novios.jpg" alt="">
            <div class="card__content">
              <h3>
                Parque de Los Novios
              </h3>
              <p>

              </p>

            </div>

            <div class="card__info">
              <div>
                <a href="./" class="card__link">Mas informacion</a>
              </div>
            </div>

          </div>
          <div class="pagination">
            <button id="prevButton">Anterior</button>
            <span id="pageIndicator">Página 1</span>
            <button id="nextButton">Siguiente</button>
          </div>
        </div>
      </div>

      <!-- Botones de paginación y marcador de página -->
      <?php
      include('modales_footer.php');
      ?>
      <footer class="footer">
        <nav>
          <ul>
            <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de privacidad</a></li>
            <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y condiciones</a></li>
            <li><a href="#">Contacto</a></li>
            <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '';
                    } else {
                        echo '<li><a data-toggle="modal" data-target="#myModal" href="#">deseas registrar tu establecimiento</a></li>';
                    }
                    ?>

                </ul>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                Debes estar logeado/Registrado para utilizar este servicio.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
          <br>
          <p>© 2023 MyBog. Todos los derechos reservados.</p>
        </nav>
      </footer>
    </div>
    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script>
      (function () {
        const searchInput = document.getElementById("searchInput");
        const cards = document.querySelectorAll(".card");

        searchInput.addEventListener("input", function () {
          const searchTerm = searchInput.value.toLowerCase();

          cards.forEach(card => {
            const content = card.querySelector(".card__content p").textContent.toLowerCase();
            const title = card.querySelector(".card__content h3").textContent.toLowerCase();

            if (title.includes(searchTerm) || content.includes(searchTerm)) {
              card.style.display = "block";
            } else {
              card.style.display = "none";
            }
          });
        });
      })();
    </script>

    <!-- Bloque de código para la funcionalidad de logout y paginación -->
    <script>
      (function () {
        document.getElementById('logout-form').addEventListener('submit', function (event) {
          event.preventDefault();
          $('#confirmLogoutModal').modal('show');
        });

        document.getElementById('confirm-logout-btn').addEventListener('click', function (event) {
          document.getElementById('logout-form').submit();
        });
      })();
    </script>

    <script>
      // Obtén todas las tarjetas
      const cards = document.querySelectorAll('.card');

      // Define la cantidad de tarjetas por página
      const cardsPerPage = 8;

      // Inicializa la página actual
      let currentPage = 1;

      // Función para mostrar u ocultar las tarjetas según la página
      function showCards() {
        cards.forEach((card, index) => {
          if (index >= (currentPage - 1) * cardsPerPage && index < currentPage * cardsPerPage) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }

      // Función para actualizar la indicación de la página actual
      function updatePageIndicator() {
        const pageIndicator = document.getElementById('pageIndicator');
        pageIndicator.textContent = `Página ${currentPage}`;
      }

      // Función para ir a la página anterior
      function goToPreviousPage() {
        if (currentPage > 1) {
          currentPage--;
          showCards();
          updatePageIndicator();
        }
      }

      // Función para ir a la página siguiente
      function goToNextPage() {
        const totalPages = Math.ceil(cards.length / cardsPerPage);
        if (currentPage < totalPages) {
          currentPage++;
          showCards();
          updatePageIndicator();
        }
      }

      // Agrega event listeners a los botones de paginación
      const prevButton = document.getElementById('prevButton');
      const nextButton = document.getElementById('nextButton');

      prevButton.addEventListener('click', goToPreviousPage);
      nextButton.addEventListener('click', goToNextPage);

      // Mostrar la página inicial
      showCards();
      updatePageIndicator();
    </script>
    <style>
      .pagination {
        padding-left: 1px;
      }

      .pagination button {
        color: black;
        border: none;
        margin-left: 20px;

      }

      .pagination button:hover {
        background-color: yellow;
        background: #ff0000;
        color: #ffcf11;
        border-radius: 5px;
        box-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0202, 0 0 20px #ff0000;
      }

      .pagination button:active,
      .pagination button:focus {
        outline: none;
      }


      #pageIndicator {
        margin-left: 20px;
      }
    </style>





</body>

</html>