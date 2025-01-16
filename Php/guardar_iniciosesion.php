<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
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

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$sql_check = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND correo = '$correo'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($contraseña, $row['contraseña'])) {
        echo "Inicio de sesión correcto.";
        header('Location: https://izeta3.com/index.html');
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado.";
}

$conn->close();
?>
    echo "Usuario no encontrado.";
}

$conn->close();
?>
