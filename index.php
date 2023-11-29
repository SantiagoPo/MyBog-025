<?php
require_once('./config/init_database.php');
require_once('./config/conexion.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBogotá</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/inicio.css">
</head>

<body>
    <div class="wrapper">
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
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-12 mt-4">
                    <div class="busqueda">
                        <input type="text" id="searchInput" name="searchInput" class="form-control"
                            placeholder="Buscar">
                        <ul id="searchResult"></ul>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="img-container">
                        <img class="img1" src="./Imagenes/Captura.PNG" alt="Imagen de Bogotá">
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <div class="palabra_clave">
                        <p>EN <strong class="strong1"> MYBOG </strong> ENCUENTRAS <br> LOS MEJORES
                            LUGARES <br> PARA
                            VISITAR
                            Y DISFRUTAR <br> DE <strong class="strong2"> BOGOTÁ </strong> DE LA MEJOR
                            <br> MANERA.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('modales_footer.php');
    ?>
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
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script src="./Funcionamiento_por_js/search_index.js"></script>
    <script>
        // Cuando el documento está completamente cargado
        $(document).ready(function () {
            // Manejar el evento keyup en el campo de búsqueda
            $('#searchInput').keyup(function () {
                // Obtener el valor del campo de búsqueda
                var query = $(this).val();

                // Verificar si la longitud de la cadena es mayor que 2 caracteres
                if (query.length > 2) {
                    // Realizar la solicitud AJAX para obtener sugerencias
                    $.ajax({
                        url: 'php/getSuggestions.php', // Ruta al script PHP que obtiene sugerencias
                        method: 'POST',
                        data: { query: query }, // Enviar la consulta como datos al script PHP
                        success: function (data) {
                            // Mostrar las sugerencias en el elemento con id 'searchResult'
                            $('#searchResult').html(data);
                        }
                    });
                } else {
                    // Si la longitud de la cadena es menor o igual a 2, vaciar las sugerencias
                    $('#searchResult').html('');
                }
            });
        });

    </script>
    
</body>

</html>