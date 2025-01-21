<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'include.php';


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
