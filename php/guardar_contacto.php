<?php
include_once('../config/conexion.php');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        // Validar los datos (puedes agregar más validaciones según tus necesidades)

        // Insertar datos en la tabla
        $sql = "INSERT INTO formulario_contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

        if ($conexion->query($sql)) {
            echo '<div class="alert alert-success" role="alert">
                Formulario enviado
            </div>';
            echo '<script>
            setTimeout(function(){
            window.location.href = "../index.php"; 
            }, 2000);  
            </script>';
        } else {
            throw new Exception();
        }
    } else {
        // Redireccionar si se intenta acceder directamente al archivo sin enviar datos
        header("Location: ./index.php");
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} catch (Exception $e) {
    echo '<div class="alert alert-danger" role="alert">
        Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo.
    </div>';
    echo '<script>
    setTimeout(function() {
      window.location.href = "../main.php";
    }, 2000);
  </script>';

}
?>