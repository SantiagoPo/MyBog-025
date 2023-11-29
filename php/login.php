<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
include_once('../config/conexion.php');

try {
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);

    // Establecer la conexión a la base de datos (asegúrate de que esta parte esté en conexion.php)
    // $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena, $db_nombre);

    // Verificar si la conexión a la base de datos fue exitosa
    if (!$conexion) {
        throw new Exception("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Buscar el hash almacenado en la base de datos para el correo proporcionado
    $sql = "SELECT * FROM cuentas WHERE Email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $hashAlmacenado = $fila['Password'];

        // Obtener los datos del usuario
        $nombresDelUsuario = $fila['Nombres'];
        $apellidosDelUsuario = $fila['Apellidos'];
        $emailDelUsuario = $fila['Email'];

        // Verificar la contraseña utilizando password_verify()
        if (password_verify($password, $hashAlmacenado)) {
            // Aquí se configura correctamente el id_usuario
            $id_usuario = $fila['Id_Usuario'];
            $_SESSION['user_id'] = $id_usuario;
            $_SESSION['id_usuario'] = $id_usuario;
            // Aquí configura el ID de usuario
            $_SESSION['nombres'] = $nombresDelUsuario;
            $_SESSION['apellidos'] = $apellidosDelUsuario;
            $_SESSION['email'] = $emailDelUsuario;
            echo '<div class="alert alert-success" role="alert">
            Inicio de sesión exitoso. Serás redireccionado en 3 segundos.
            </div>';
            echo '<script> setTimeout(function(){ window.location.href = "../index.php"; }, 3000); </script>';
        } else {
            throw new Exception("Credenciales incorrectas. Inténtalo de nuevo.");
        }
    } else {
        throw new Exception("Credenciales incorrectas. Inténtalo de nuevo.");
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger" role="alert">
            Ha ocurrido un error al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.
          </div>';
    echo '<script> setTimeout(function(){ window.location.href = "../main.php"; }, 3000); </script>';
    exit;
}
?>