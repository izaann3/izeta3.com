<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "127.0.0.1";
$username = "izeta3php";
$password = "Camello@33";
$dbname = "valoraciones_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

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
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $correo;

        header('Location: https://izeta3.com/index.php');
        exit();
    } else {
        echo "Error al registrar el usuario: " . $stmt_insert->error;
    }
}

$stmt->close();
$conn->close();
?>

