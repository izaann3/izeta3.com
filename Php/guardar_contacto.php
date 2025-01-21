<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require 'include.php';

if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {

    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);
    
    $sql = "INSERT INTO contacto (nombre, correo, mensaje) VALUES ('$nombre','$correo','$mensaje')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Contacto guardado con éxito";
    } else {
        echo "Error: " .$sql. "<br>" .$conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

mysqli_close($conn);    
?>
