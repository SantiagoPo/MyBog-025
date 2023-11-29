<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
require_once('./config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conexion->close();
    exit;
}

extract($_POST);

// Obtén el ID de usuario del usuario autenticado
$id_usuario = $_SESSION['user_id']; // Asegúrate de que esta variable se obtenga de manera adecuada

$allday = isset($allday);

if (empty($id)) {
    // Utiliza una variable diferente para representar $id_usuario_for
    $id_usuario_for = $id_usuario;
    $sql = "INSERT INTO `schedule_list` (`title`, `description`, `start_datetime`, `end_datetime`, `Id_usuario_for`) VALUES ('$title', '$description', '$start_datetime', '$end_datetime', '$id_usuario_for')";
} else {
    $sql = "UPDATE `schedule_list` SET `title` = '$title', `description` = '$description', `start_datetime` = '$start_datetime', `end_datetime` = '$end_datetime' WHERE `id` = '$id' AND `Id_usuario_for` = '$id_usuario'";
}

$save = $conexion->query($sql);

if ($save) {
    echo '<div class="alert alert-success" role="alert">
        Registro de evento exitoso. Serás redireccionado en 2 segundos.
        </div>';
        echo '<script> setTimeout(function(){ window.location.href = "./calendario.php"; }, 2000); </script>';
} else {
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: " . $conexion->error . "<br>";
    echo "SQL: " . $sql . "<br>";
    echo "</pre>";
}


?>
