<?php
// Supongamos que ya tienes una conexión a la base de datos y validación del login

// Iniciar sesión
session_start();

// Después de verificar el login exitoso:
// Asegúrate de que $nombre_usuario contenga el nombre del usuario logueado correctamente.
if (isset($nombre_usuario)) {
    $_SESSION['usuario'] = $nombre_usuario; // Almacenas el nombre de usuario en la sesión
    echo "Sesión iniciada correctamente para el usuario: " . htmlspecialchars($nombre_usuario);
} else {
    echo "Error: No se pudo establecer la sesión. Verifica el inicio de sesión.";
}
?>
