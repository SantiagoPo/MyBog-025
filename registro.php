<?php
require_once('./config/conexion.php');
include('modales_footer.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('./php/procesar_registro.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/registro.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <style>
        .modal {
            background-color: rgba(0, 0, 0, 0.7);
            transition: opacity 0.3s ease-in-out;

        }

        #checkbox label {
            margin-top: 16px;
            margin-left: 16px;
            cursor: pointer;
        }
    </style>
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

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-box">
                        <h2>Crear Cuenta</h2>
                        <form action="registro.php" method="post" onsubmit="return validarFormulario()">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Nombres" name="Nombres" autofocus required
                                  d  maxlength="20" pattern="[a-zA-Z\s]+"
                                    title="Solo se permiten letras y espacios. Máximo 20 caracteres.">
                                <label>Nombre</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="Apellidos" name="Apellidos" required
                                    maxlength="20" pattern="[a-zA-Z\s]+"
                                    title="Solo se permiten letras y espacios. Máximo 20 caracteres.">
                                <label>Apellido</label>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="Email" required maxlength="50"
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                                    title="Ingresa un correo electrónico válido. Máximo 50 caracteres.">
                                <label>Correo</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="Password" required
                                    minlength="8" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
                                    title="Debe contener al menos una mayúscula, una minúscula y un número. Mínimo 8 y máximo 15 caracteres.">
                                <label>Contraseña</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirmPassword" name="ConfirmPassword"
                                    required minlength="8" maxlength="15"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
                                    title="Debe coincidir con la contraseña ingresada anteriormente.">
                                <label>Confirmar Contraseña</label>
                            </div>
                            <div class="form-group" id="checkbox">
                                <input type="checkbox" id="checkboxId" required>
                                <label for="checkboxId">Acepto los Términos y condiciones </label>

                                <div class="modal" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTerminosCondicionesLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTerminosCondicionesLabel">
                                                    Términos y Condiciones</h5>
                                                <span class="close" onclick="cerrarModal()">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Términos y Condiciones de MyBog</h4>
                                                <p>
                                                    Al utilizar el servicio de MyBog, aceptas cumplir con
                                                    nuestros términos y condiciones. Por
                                                    favor, léelos cuidadosamente antes de usar nuestro servicio.
                                                </p>
                                                <p>
                                                    <strong>Uso del Servicio:</strong> Está prohibido el uso
                                                    inapropiado o ilegal de nuestro
                                                    servicio. No toleramos el spam ni la conducta abusiva.
                                                </p>
                                                <p>
                                                    <strong>Contenido del Usuario:</strong> Al publicar
                                                    contenido en MyBog, garantizas que
                                                    tienes los derechos necesarios sobre ese contenido.
                                                </p>
                                                <p>
                                                    <strong>Cancelación de Cuenta:</strong> Puedes cancelar tu
                                                    cuenta en cualquier momento si ya
                                                    no deseas utilizar nuestro servicio.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    onclick="cerrarModal()">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div>
                                <button type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="ciudad" src="./Imagenes/bogota (2).png" alt="ciudad">
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
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000"
        style="position: absolute; top: 100px; right: 0; margin: 15px; display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if ($registroExitoso) {
                    echo "Registro exitoso";
                } else {
                    echo "Error en el registro";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if ($registroExitoso) {
                echo "Serás redireccionado en 1 segundo.";
            } else {
                if ($cuentaexistente) {
                    echo "Ya existe una cuenta con este correo electrónico. Por favor, utiliza otro correo.";
                } else {
                    echo "Hubo un error en el registro. Inténtalo de nuevo.";
                }
            }
            ?>
        </div>
    </div>

    <script>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '$(document).ready(function() { $(".toast").toast("show").css("display", "block"); });';
        }
        ?>
    </script>
    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>

    <script>
        // Obtén una referencia al checkbox y al modal
        const checkbox = document.getElementById("checkboxId");
        const modal = document.getElementById("modal");

        // Cuando se hace clic en el checkbox, muestra u oculta el modal
        checkbox.addEventListener("click", function () {
            if (checkbox.checked) {
                mostrarModal();
            } else {
                cerrarModal();
            }
        });

        // Función para mostrar el modal
        function mostrarModal() {
            modal.style.display = "flex";
            setTimeout(() => {
                modal.style.opacity = 1; // Hacemos que el modal sea visible
            }, 10); // Pequeño retraso para permitir la transición
        }

        // Función para cerrar el modal
        function cerrarModal() {
            modal.style.opacity = 0; // Hacemos que el modal sea invisible
            setTimeout(() => {
                modal.style.display = "none";
            }, 300); // Esperamos a que termine la transición (0.3s)
        }
    </script>

</body>

</html>