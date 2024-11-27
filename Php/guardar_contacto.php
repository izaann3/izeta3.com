<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include 'conexion.php';

// Conectar a la base de datos
$servername = "127.0.0.1";
$username = "user";
$password = "@Mvm2016";
$dbname = "valoraciones_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " .$conn->connect_error);
}

if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {
    // Recibir los datos de contactos y sacarlos para evitar errores.
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO contacto (nombre, correo, mensaje) VALUES ('$nombre','$correo','$mensaje')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Contacto guardado con éxito";
    } else {
        echo "Error: " .$sql. "<br>" .$conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

// Cerrar la conexión
mysqli_close($conn);    
?>
