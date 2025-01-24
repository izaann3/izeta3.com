<?php
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
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['correo'] = $row['correo'];
        header('Location: https://izeta3.com/index.php');
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado.";
}

$conn->close();
?>

