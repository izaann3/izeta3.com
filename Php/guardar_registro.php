<?php
date_default_timezone_set('Europe/Madrid');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'conexion.php';

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

if (!isset($_POST['terminos'])) {
    session_start();
    $_SESSION['error'] = "Debes aceptar los términos y condiciones para registrarte.";
    header("Location: ../Html/inicio_registro.php");
    exit();
}

$sql_check = "SELECT * FROM usuarios WHERE usuario = ? OR correo = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ss", $usuario, $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El usuario o correo ya están registrados.";
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
            session_start();
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
            echo json_encode([
                'success' => false,
                'message' => 'Error al generar el token'
            ]);
        }

    } else {
        echo "Error al registrar el usuario: " . $stmt_insert->error;
    }
}

$stmt->close();
$conn->close();
?>
