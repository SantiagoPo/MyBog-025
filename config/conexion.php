<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Conexión a la base de datos
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_NAME'];
$port = $_ENV['DB_PORT'];

$conexion = mysqli_connect($host, $user, $password, $database, $port);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

