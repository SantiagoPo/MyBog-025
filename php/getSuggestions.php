<?php
$q = $_POST['query'];

// Incluye el archivo de conexión a la base de datos
include_once('../config/conexion.php');

// Verifica si la conexión se estableció correctamente

$sql = "SELECT Nombres_de_centros_comerciales as nombre FROM centros_comerciales WHERE Nombres_de_centros_comerciales LIKE '$q%'
        UNION
        SELECT Nombre_de_parques as nombre FROM parques WHERE Nombre_de_parques LIKE '$q%'
        UNION
        SELECT Nombres_de_discotecas as nombre FROM discotecas WHERE Nombres_de_discotecas LIKE '$q%'
        UNION
        SELECT Nombres_de_estadios as nombre FROM estadios WHERE Nombres_de_estadios LIKE '$q%'";

$result = mysqli_query($conexion, $sql); // Utiliza mysqli_query y pasa $conn como primer parámetro

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href='#'>" . $row['nombre'] . "</a>";
    }
} else {
    echo "Sin resultados";
}


?>
