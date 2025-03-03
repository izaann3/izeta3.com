<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta - IZETA3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/registro.css">
    <link rel="icon" href="../Images/ha.png" type="image/png">
    <script defer src="../js/gotop.js"></script>
    <script src="../js/scroll.js" defer></script>
    <script src="../js/error.js" defer></script>
    <script src="../js/scroll_header.js" defer></script>
    <script src="../js/clickeye.js" defer></script>
</head>

<div class="loader">
        <span class="loader__element"></span>
        <span class="loader__element"></span>
        <span class="loader__element"></span>
</div>
    
<div class="loader">
        <span class="loader__element"></span>
        <span class="loader__element"></span>
        <span class="loader__element"></span>
</div>

<body>
    <section id="contact" class="contact">
    <img src="../../Images/iz3logo.png" alt="Logo" class="login-logo"> 
    <h2>Registro</h2>
        <p>Por favor, rellene los siguientes datos:</p> 
        <form action="../Php/guardar_registro.php" method="POST">  
            <?php 
            if (isset($_SESSION['error'])) {
                echo '<div class="alert-message error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <input type="text" name="usuario" placeholder="Usuario" required> 
            <input type="email" name="correo" placeholder="Correo electrónico" required> 
            <div class="password-container">
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <img src="../Images/eye_visible.png" alt="Mostrar contraseña" />
                </span>
            </div>       
            <div class="checkbox">
                <input type="checkbox" name="terminos" id="terminos" required>
                <label for="terminos">Acepto los <a href="terminos.php" target="_blank">términos y condiciones</a></label>
            </div>
            <button type="submit">Registrarse</button> 
            <p id="register-text">¿Ya tienes cuenta? <a href="../Html/inicio_registro.php">Inicia sesión</a></p>
        </form> 
    </section>
</body>

</html>
