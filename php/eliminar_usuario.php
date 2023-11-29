<?php
include_once('config/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userIdToDelete = $_POST['user_id'];

    // Lógica para eliminar el usuario (eliminar de la base de datos)
    $sqlEliminarUsuario = "DELETE FROM cuentas WHERE Id_Usuario = $userIdToDelete";

    if ($conexion->query($sqlEliminarUsuario) === TRUE) {
        // Éxito
        $response = array('success' => true, 'message' => 'Usuario eliminado correctamente');
        header('Location: admin.php'); // Redirige a la página de administración después de la eliminación
        exit;
    } else {
        // Error en la eliminación
        $response = array('success' => false, 'message' => 'Error al eliminar el usuario: ' . $conexion->error);
        header('Location: admin.php'); // Puedes redirigir a una página de error si lo deseas
        exit;
    }
}
?>
