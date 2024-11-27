<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

//Conectar a la base de datos
$servername = "127.0.0.1";
$username = "user";
$password = "@Mvm2016";
$dbname = "valoraciones_db";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir los datos del formulario y escaparlos para evitar errores SQL.
if (!empty($_POST['nombre_usuario']) && !empty($_POST['comentario']) &&
!empty($_POST['puntuacion'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $comentario = $_POST['comentario'];
    $puntuacion = $_POST['puntuacion'];

    // Preparamos la consulta SQL para evitar fugas
    $stmt = $conn->prepare("INSERT INTO valoraciones (nombre, comentario, puntuacion) VALUES (?, ?, ?)");

    if ($stmt) {
    // Ligar los parámetros y ejecutar la consulta
    $stmt->bind_param("ssi",$nombre_usuario,$comentario,$puntuacion);

    if ($stmt->execute()) {
        echo "La valoración ha sido guardada. ";
    } else {
        echo "Error al guardar la valoración: " .$stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: ".$conn->error;
    }
} else {
    echo "Todos los campos son obligatorios. ";
}

// Cerrar la conexión
mysqli_close($conn);    
?>
