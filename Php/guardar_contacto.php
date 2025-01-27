<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para poder enviar un mensaje.";
    exit();
}

$token = $_POST['token'] ?? ''; 
$user_id = $_SESSION['usuario_id'] ?? null; 

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
    $_SESSION['error'] = "Token inválido o expirado.";
    header("Location: ../Html/contacto.php");
    exit();
}

$token_data = $result_token_check->fetch_assoc();
$current_time = date('Y-m-d H:i:s');

if ($token_data['expiracion'] <= $current_time) {
    $_SESSION['error'] = "El token ha expirado.";
    header("Location: ../Html/contacto.php");
    exit();
}

if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['mensaje'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $stmt = $conn->prepare("INSERT INTO contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $nombre, $correo, $mensaje);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Tu petición de <strong>contacto</strong> ha sido enviada correctamente.";
            header("Location: ../Html/contacto.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al enviar tu petición de <strong>contacto</strong>. Intentelo de nuevo.</strong>. " . $stmt->error;
            header("Location: ../Html/contacto.php");
            exit();
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
