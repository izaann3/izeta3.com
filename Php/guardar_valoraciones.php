<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

$servername = "127.0.0.1";
$username = "izeta3php";
$password = "Camello@33";
$dbname = "valoraciones_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (!empty($_POST['nombre_usuario']) && !empty($_POST['comentario']) &&
!empty($_POST['puntuacion'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $comentario = $_POST['comentario'];
    $puntuacion = $_POST['puntuacion'];

    $stmt = $conn->prepare("INSERT INTO valoraciones (nombre, comentario, puntuacion) VALUES (?, ?, ?)");

    if ($stmt) {
    $stmt->bind_param("ssi",$nombre_usuario,$comentario,$puntuacion);

    if ($stmt->execute()) {
        echo "La valoración ha sido guardada. ";
    } else {
        echo "Error al guardar la valoración: " .$stmt->error;
    }

    $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: ".$conn->error;
    }
} else {
    echo "Todos los campos son obligatorios. ";
}

mysqli_close($conn);    
?>
