<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para poder enviar valoraciones.";
    exit();
}

$token = $_POST['token'] ?? ''; 
$user_id = $_SESSION['usuario_id'] ?? null; 

echo "Token recibido: " . $token . "<br>";
echo "Usuario ID: " . $user_id . "<br>";

if (empty($token) || empty($user_id)) {
    echo "Token no proporcionado o usuario no autenticado.";
    exit();
}

$sql_token_check = "SELECT * FROM tokens WHERE user_id = ? AND token = ? AND expiracion > NOW()";
$stmt_token_check = $conn->prepare($sql_token_check);
$stmt_token_check->bind_param("is", $user_id, $token);
$stmt_token_check->execute();
$result_token_check = $stmt_token_check->get_result();

if ($result_token_check->num_rows === 0) {
    echo "Token inválido o expirado.<br>";
} else {
    // Aquí obtienes el dato del token
    $token_data = $result_token_check->fetch_assoc();
    
    // Imprimes la fecha de expiración del token
    echo "Token válido. Expiración: " . $token_data['expiracion'] . "<br>";

    // Comparar la fecha de expiración con la fecha actual
    $token_expiration = $token_data['expiracion'];
    $current_time = date('Y-m-d H:i:s');
    echo "Fecha y hora actual: " . $current_time . "<br>";
    
    if ($token_expiration <= $current_time) {
        echo "Token expirado.<br>";
    } else {
        echo "Token válido.<br>";
    }
}

if (!empty($_POST['nombre_usuario']) && !empty($_POST['comentario']) && !empty($_POST['puntuacion'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $comentario = $_POST['comentario'];
    $puntuacion = $_POST['puntuacion'];

    $stmt = $conn->prepare("INSERT INTO valoraciones (nombre, comentario, puntuacion) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssi", $nombre_usuario, $comentario, $puntuacion);

        if ($stmt->execute()) {
            echo "La valoración ha sido guardada.";
        } else {
            echo "Error al guardar la valoración: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

$stmt_token_check->close();
$conn->close();
?>
