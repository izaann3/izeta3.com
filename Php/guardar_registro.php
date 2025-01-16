<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "izeta3php";
$password = "Camello@33";
$dbname = "valoraciones_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
/*EL metodo hash sirve para proteger las contraseñas y 
las convierte en un texto de caracteres que no se puede leer*/

// Verificar si el usuario o correo ya existen
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR correo = '$correo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "El usuario o correo ya están registrados.";
} else {
    // Insertar nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES ('$usuario', '$correo', '$contraseña')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro correcto.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
