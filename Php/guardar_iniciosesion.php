<?php
date_default_timezone_set('Europe/Madrid');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'conexion.php';

$identificador = $_POST['identificador'];
$contraseña = $_POST['contraseña'];

$sql_check = "SELECT * FROM usuarios WHERE (usuario = ? OR correo = ?)";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ss", $identificador, $identificador);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($contraseña, $row['contraseña'])) {
        $token = bin2hex(random_bytes(32));
        $expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $sql_token = "INSERT INTO tokens (user_id, token, expiracion) VALUES (?, ?, ?)";
        $stmt_token = $conn->prepare($sql_token);
        $stmt_token->bind_param("iss", $row['id'], $token, $expiracion);

        if ($stmt_token->execute()) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['token'] = $token;
            $_SESSION['usuario_id'] = $row['id'];
            
            header('Location: https://izeta3.com/index.php');
            exit();
        } else {
            $_SESSION['error'] = "Error al generar el token.";
            header("Location: ../Html/inicio_registro.php");
            exit();
        }

    } else {
        $_SESSION['error'] = "La <strong>contraseña</strong> es incorrecta.";
        header("Location: ../Html/inicio_registro.php");
        exit();
    }
} else {
    $_SESSION['error'] = "El <strong>usuario</strong> o <strong>correo</strong> no existe.";
    header("Location: ../Html/inicio_registro.php");
    exit();
}

$conn->close();
?>
