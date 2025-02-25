<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - IZETA3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/login.css">
    <link rel="icon" href="../Images/ha.png" type="image/png">
    <script defer src="../js/gotop.js"></script>
    <script src="../js/scroll.js" defer></script>
    <script src="../js/error.js" defer></script>
    <script src="../js/success.js" defer></script>
    <script src="../js/scroll_header.js" defer></script>
    <script src="../js/clickeye.js" defer></script>
</head>

<body>
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

    <section id="contact" class="contact">
    <img src="../../Images/iz3logo.png" alt="Logo" class="login-logo">    
    <h2>Iniciar sesión</h2>
        <p>Por favor, introduce tu usuario o correo electrónico y contraseña:</p>
        <form action="../Php/guardar_iniciosesion.php" method="POST">
            <?php 
            session_start();
            if (isset($_SESSION['error'])) {
                echo '<div class="alert-message error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
            <input type="text" name="identificador" placeholder="Usuario o correo electrónico" required>
            <div class="password-container">
                <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <img src="../Images/eye_visible.png" alt="Mostrar contraseña" />
                </span>
            </div>
            <button type="submit">Continuar</button>
            <p id="register-text">¿No tienes cuenta? <a href="../Html/registro.php">Regístrate</a></p>
        </form>
    </section>
</body>
</html>
