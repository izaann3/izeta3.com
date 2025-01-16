<?php
// Configuración de conexión a la base de datos
$servername = "127.0.0.1";
$username = "izeta3php";
$password = "Camello@33";
$dbname = "valoraciones_db";

try {
    // Conexión a la base de datos con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, devolver una respuesta de error
    http_response_code(500);
    echo 'Error de conexión a la base de datos: ' . $e->getMessage();
    exit;
}

// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el correo electrónico desde la solicitud POST
    $email = $_POST['email'] ?? '';

    // Validar el formato del correo electrónico en el servidor
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo 'Correo electrónico no válido.';
        exit;
    }

    try {
        // Preparar la consulta SQL para insertar el correo electrónico
        $stmt = $pdo->prepare('INSERT INTO newsletter_subscribers (email) VALUES (:email)');
        // Ejecutar la consulta con el correo electrónico proporcionado
        $stmt->execute(['email' => $email]);
        // Devolver una respuesta de éxito
        echo 'Suscripción exitosa.';
    } catch (PDOException $e) {
        // Si ocurre un error al insertar, verificar si es por duplicado
        if ($e->getCode() == 23000) { // Código de error para entrada duplicada
            http_response_code(409);
            echo 'Este correo electrónico ya está suscrito.';
        } else {
            // Para otros errores, devolver una respuesta de error genérica
            http_response_code(500);
            echo 'Error al guardar la suscripción: ' . $e->getMessage();
        }
    }
} else {
    // Si no es una solicitud POST, devolver un error 405 Método no permitido
    http_response_code(405);
    echo 'Método no permitido.';
}
?>
    $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: ".$conn->error;
    }
} else {
    echo "Todos los campos son obligatorios. ";
}

// Cerrar la conexión
mysqli_close($conn);    
?>
