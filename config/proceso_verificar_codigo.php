<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
include_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el código ingresado por el usuario
    $verification_code = $_POST['verification_code'];
    $user_id = $_POST['user_id']; // Obtener el ID de usuario desde el formulario
    
    // Consultar la base de datos para verificar el código
    $sql = "SELECT * FROM verification_codes WHERE user_id = ? AND token = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("is", $user_id, $verification_code);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // El código de verificación es correcto, redirigir al usuario a la página de cambio de contraseña
        header("location: ../change_password.php?user_id=$user_id");
        exit();
    } else {
        // El código de verificación es incorrecto, mostrar un mensaje de error
        echo'<div class="alert alert-danger" >
            Código de verificación incorrecto. Inténtalo de nuevo.
          </div>';
        
    }
} else {
    // Si el usuario intenta acceder directamente a proceso_verificar_codigo.php sin enviar un formulario, redirigir a la página principal
    header("location: ../main.php");
}
?>
