<!DOCTYPE html>

<?php
require_once('./config/conexion.php');


// Cierra la conexión a la base de datos
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Olvido su contraseña</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/HeaderFooter.css">
  <link rel="stylesheet" type="text/css" href="style/informacion.css">
  <style>
    .card {
      border-radius: 10px;
      background-color: #f9f9f9;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 15px 5px 18px rgba(0, 0, 0, 0.1);
      /* Agregado: Sombra para las tarjetas */
    }

    .card h3 {
      font-size: 24px;
    }

    .card .parrafo {
      max-height: 200px;
      overflow: hidden;
      margin-bottom: 10px;
    }

    .card h5 {
      font-size: 24px;
    }

    .card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }

    .card .card-body {
      padding: 15px;
    }

    #searchInput {
      margin-bottom: 20px;
    }

    .card-deck .card {
      margin-bottom: 20px;
      width: 300px;
      /* Ajustado el ancho de la tarjeta */
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination button {
      color: black;
      background-color: #f9f9f9;
      border: none;
      margin: 0 5px;
      cursor: pointer;
    }

    .pagination button:hover {
      background-color: yellow;
      color: #ff0000;
      border-radius: 5px;
      box-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0202, 0 0 20px #ff0000;
    }
  </style>


</head>

<body>
  <div class="wrapper">
    <div class="content">
      <!-- Barra de navegación -->
      <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
        <div class="container-fluid" id="header">
          <!-- Logo -->
          <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
          <!-- Botón para colapsar la barra de navegación en dispositivos pequeños -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Enlaces de navegación -->
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
                                            <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">Registra tu establecimiento</a>
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

      <!-- Contenido principal -->
      <div class="inicio">
        <!-- Barra de búsqueda -->
        <input type="text" id="searchInput" placeholder="Buscar tarjetas">


        <!-- Sección de tarjetas -->
        <div id="mundo_aventura">
          <div class="container">
            <div class="card-deck">
              <?php
              // Verifica si la localidad está presente en la URL
              $localidad = isset($_GET['localidad']) ? $_GET['localidad'] : '';

              // Construye la consulta SQL con la condición de localidad
              $consulta = "SELECT * FROM parques WHERE localidad = '$localidad'";

              // Ejecuta la consulta
              $resultado = $conexion->query($consulta);

              // Verifica si hay resultados
              if ($resultado->num_rows > 0) {
                // Almacena los resultados en un array
                $parques = $resultado->fetch_all(MYSQLI_ASSOC);

                // Tu bucle de tarjetas de parques
                foreach ($parques as $parque):
                  ?>
                  <!-- Tarjeta de parque -->
                  <div class="col-md-4">
                    <div class="card">
                      <!-- Imagen de la tarjeta -->
                      <?php
                      $imagenNombre = rawurlencode($parque['Nombre_de_parques']);
                      $imagenUrl = "./Imagenes/parques/{$imagenNombre}.jpg"; // Ajusta la extensión según el formato de tus imágenes
                      ?>
                      <img class="card-img-top" src="<?php echo $imagenUrl; ?>"
                        alt="<?php echo htmlspecialchars($parque['Nombre_de_parques']); ?>">

                      <!-- Contenido de la tarjeta -->
                      <div class="card-body">
                        <!-- Títulos -->
                        <h5 class="card-title">
                          <?php echo htmlspecialchars($parque['Nombre_de_parques']); ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                          <?php echo htmlspecialchars($parque['Ubicacion_de_parques']); ?>
                        </h6>

                        <!-- Puedes agregar más detalles según tu estructura de base de datos -->

                        <!-- Botón para abrir más información en informacion.php -->
                        <a href="resultado.php?tabla=parques&nombre=<?php echo urlencode($parque['Nombre_de_parques']); ?>"
                          class="btn btn-primary">Más información</a>


                      </div>
                    </div>
                  </div>
                  <?php
                endforeach;
              } else {
                echo '<p>No se encontraron parques para la localidad seleccionada.</p>';
              }
              ?>
            </div>
          </div>
          <!-- Botones de paginación y marcador de página -->


          <!-- Pie de página -->
          <footer class="footer">
            <nav>
              <ul>
                <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de privacidad</a>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y condiciones</a>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
                <?php
                if (isset($_SESSION['user_id'])) {
                  echo '';
                } else {
                  echo '<li><a data-toggle="modal" data-target="#myModal" href="#">¿Deseas registrar tu establecimiento?</a></li>';
                }
                ?>
              </ul>

              <!-- Modal de mensaje -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
              <p>©
                <?php echo date("Y"); ?> MyBog. Todos los derechos reservados.
              </p>
            </nav>
          </footer>


          <!-- Scripts -->
          <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
          <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
          <script>
            // Obtén todas las tarjetas
            const cards = document.querySelectorAll('.card');

            // Inicializa la página actual
            let currentPage = 1;

            // Función para mostrar u ocultar las tarjetas según la página
            function showCards() {
              cards.forEach((card, index) => {
                if (index >= (currentPage - 1) * <?php echo $cardsPerPage; ?> && index < currentPage * <?php echo $cardsPerPage; ?>) {
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
              const totalPages = Math.ceil(<?php echo $count; ?> / <?php echo $cardsPerPage; ?>);
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

</body>

</html>