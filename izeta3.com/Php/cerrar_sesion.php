<?php
session_start();

require 'conexion.php';

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    $sql_user = "SELECT id FROM usuarios WHERE usuario = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $usuario);
    $stmt_user->execute();
    $result = $stmt_user->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        $sql_delete_token = "DELETE FROM tokens WHERE user_id = ?";
        $stmt_delete_token = $conn->prepare($sql_delete_token);
        $stmt_delete_token->bind_param("i", $user_id);
        $stmt_delete_token->execute();
    }

    session_destroy();
}

header('Location: https://izeta3.com/index.php');
exit();
?>

