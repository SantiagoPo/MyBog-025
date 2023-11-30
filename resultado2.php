<?php
require_once('./config/conexion.php');
include('modales_footer.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seleccionado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/registro.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <style>
    .card {
      border-radius: 10px;
      background-color: #f9f9f9;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 15px 5px 18px rgba(0, 0, 0, 0.1);
    }

    .card h5 {
      font-size: 24px;
    }

    .card img {
      width: 100%;
      height: 200px;
      /* Establecer una altura fija para la imagen */
      object-fit: cover;
    }

    .card .card-body {
      padding: 15px;
    }

    .card .parrafo {
      height: 80px;
      /* Establecer una altura fija para el párrafo */
      overflow: hidden;
      margin-bottom: 10px;
    }

    .card .card-title {
      height: 40px;
      /* Establecer una altura fija para el título */
      overflow: hidden;
    }

    .card .card-subtitle {
      height: 30px;
      /* Establecer una altura fija para el subtítulo */
      overflow: hidden;
    }

    .card .btn {
      margin-top: 10px;
    }

    .card-deck .card {
      margin-bottom: 20px;
      width: 370px;
      height: 370px;
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

            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="detalle-establecimiento">
                        <?php
                        // Verifica si los parámetros 'tabla' y 'id' están presentes en la URL
                        if (isset($_GET['tabla']) && isset($_GET['id'])) {
                            $tabla = $_GET['tabla'];
                            $id = $_GET['id'];

                            // Asegúrate de que solo se permitan ciertas tablas (evita posibles ataques)
                            $tablasPermitidas = array('imagenes_establecimiento', 'registro_de_establecimiento');
                            if (in_array($tabla, $tablasPermitidas)) {
                                // Construye la consulta SQL con la tabla y la ID específica
                                $consulta = "SELECT registro_de_establecimiento.*, imagenes_establecimiento.* 
             FROM registro_de_establecimiento
             INNER JOIN imagenes_establecimiento ON registro_de_establecimiento.Id_registro = imagenes_establecimiento.id_establecimiento
             WHERE registro_de_establecimiento.Id_registro = $id";

                                // Ejecuta la consulta
                                $resultado = $conexion->query($consulta);
                                // O la columna correcta de tu base de datos
                        
                                // Verifica si hay resultados
                                if ($resultado->num_rows > 0) {
                                    // Almacena los resultados en un array
                                    $informacion = $resultado->fetch_assoc();

                                    echo ('<center>');
                                    // Muestra la información de manera detallada
                                    echo '<h2>' . htmlspecialchars($informacion['Nombre_del_establecimiento']) . '</h2>';
                                    echo isset($informacion['Direccion_de_establecimiento']) ? '<p>Dirección: ' . str_replace(['~', '¬'], ' ', htmlspecialchars($informacion['Direccion_de_establecimiento'])) . '</p>' : '';
                                    echo isset($informacion['Informacion_adicional']) ? '<p>Descripción: ' . htmlspecialchars($informacion['Informacion_adicional']) . '</p>' : '';
                                    echo isset($informacion['Nit']) ? '<p>Nit del establecimiento: ' . htmlspecialchars($informacion['Nit']) . '</p>' : '';
                                    echo isset($informacion['id_tipo_de_establecimiento']) ? '<p>Tipo del establecimiento: ' . htmlspecialchars($informacion['id_tipo_de_establecimiento']) . '</p>' : '';
                                    echo isset($informacion['Telefono']) ? '<p>Telefono del establecimiento: ' . htmlspecialchars($informacion['Telefono']) . '</p>' : '';
                                    // Muestra la imagen asociada al establecimiento
                                    $imagenNombre = rawurlencode($informacion['nombre_archivo']);
                                    $imagenUrl = "php/Imagen_guardar/{$imagenNombre}"; // Ajusta la ruta según tu estructura
                        
                                    // Agrega una clase CSS para limitar el ancho de la imagen
                                    echo '<img src="' . $imagenUrl . '" alt="' . htmlspecialchars($informacion['Nombre_del_establecimiento']) . '" class="imagen-establecimiento">';
                                    echo ('</center>');

                                    // Puedes seguir mostrando más detalles según la estructura de tu base de datos
                                } else {
                                    echo '<p>No se encontró información para el elemento seleccionado.</p>';
                                }
                            } else {
                                echo '<p>Tabla no permitida.</p>';
                            }
                        } else {
                            echo '<p>No se proporcionaron parámetros válidos.</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- El resto del contenido de la página resultado.php -->




                <!-- Resto del contenido de la página resultado.php -->

                <div class="col-md-6">
                    <!-- Mapa con Mapbox -->
                    <div class="mapa" id="mapbox-map"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('modales_footer.php');
    ?>
    <br><br>
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                        privacidad</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                        condiciones</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '';
                } else {
                    echo '<li><a data-toggle="modal" data-target="#myModal" href="#">¿Deseas registrar tu establecimiento?</a></li>';
                }
                ?>

            </ul>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGZseSIsImEiOiJjbGkwamdrYjcwMmdlM2NvOXgyN2s0aW1xIn0.c1WhoBvGP7nCERKiX-mxbQ';
        var ubicacion = "<?php echo $informacion['Direccion_de_establecimiento']; ?>";
        // Geocodificación con Mapbox
        var geocoding_url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" + encodeURIComponent(ubicacion) + ".json?access_token=" + mapboxgl.accessToken;

        // Realizar la solicitud HTTP
        fetch(geocoding_url)
            .then(response => response.json())
            .then(data => {
                var coordinates = data.features[0].center;
                var latitud = coordinates[1];
                var longitud = coordinates[0];

                var map = new mapboxgl.Map({
                    container: 'mapbox-map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [longitud, latitud],
                    zoom: 15
                });

                // Añade un marcador en la ubicación del establecimiento
                new mapboxgl.Marker().setLngLat([longitud, latitud]).addTo(map);
            })
            .catch(error => {
                console.error('Error en la geocodificación:', error);
            });
    </script>
</body>

</html>