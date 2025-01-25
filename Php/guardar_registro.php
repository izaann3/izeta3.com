<?php
date_default_timezone_set('Europe/Madrid');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require 'conexion.php';

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $contraseña)) {
    $_SESSION['error'] = "La <strong>contraseña</strong> debe tener al menos 8 caracteres, incluir una letra mayúscula, una minúscula, un número y un carácter especial.";
    header("Location: ../Html/registro.php");
    exit();
}

$sql_check = "SELECT * FROM usuarios WHERE usuario = ? OR correo = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ss", $usuario, $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['error'] = "El <strong>usuario</strong> o <strong>correo</strong> ya están registrados.";
    header("Location: ../Html/registro.php");
    exit();
} else {
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $usuario, $correo, $contraseña_hash);

    if ($stmt_insert->execute()) {
        $user_id = $stmt_insert->insert_id;

        $token = bin2hex(random_bytes(32));
        $expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $sql_token = "INSERT INTO tokens (user_id, token, expiracion) VALUES (?, ?, ?)";
        $stmt_token = $conn->prepare($sql_token);
        $stmt_token->bind_param("iss", $user_id, $token, $expiracion);

        if ($stmt_token->execute()) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['correo'] = $correo;
            $_SESSION['token'] = $token;
            $_SESSION['usuario_id'] = $user_id;

            echo json_encode([
                'success' => true,
                'token' => $token,
                'message' => 'Registro e inicio de sesión exitoso'
            ]);
            
            header('Location: https://izeta3.com/index.php');
            exit();
        } else {
            $_SESSION['error'] = "Error al generar el token.";
            header("Location: ../Html/registro.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error al registrar el usuario: " . $stmt_insert->error;
        header("Location: ../Html/registro.php");
        exit();
    }
}

$stmt->close();
$conn->close();
?>
