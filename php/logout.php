<?php
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redireccionar al usuario a main.html después de cerrar sesión
header("Location: ../main.php");
exit;
?>
