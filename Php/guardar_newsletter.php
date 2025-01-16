<?php
// Configuración de conexión a la base de datos
$servername = "127.0.0.1";
$username = "izeta3php";
$password = "Camello@33";
$dbname = "valoraciones_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    // Validar que el correo no esté vacío y sea válido
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Insertar el correo en la tabla
    $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Suscripción guardada correctamente.";
    } else {
        if ($conn->errno === 1062) { // Error por duplicado
            echo "El correo ya está registrado.";
        } else {
            echo "Error al guardar la suscripción: " . $conn->error;
        }
    }

    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>

        echo "La valoración ha sido guardada. ";
    } else {
        echo "Error al guardar la valoración: " .$stmt->error;
    }

    // Cerrar la declaración
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
