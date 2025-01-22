<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - IZETA3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/principal.css">
    <link rel="icon" href="../Images/ha.png" type="image/png">
    <script defer src="../js/gotop.js"></script>
    <script src="../js/scroll.js" defer></script>
    <script src="../js/subscribe.js" defer></script>
    <script src="../js/scroll_header.js" defer></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../Images/iz3logo.png">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="../index.php">INICIO</a></li>
                <li><a href="../index.php#music">MÚSICA</a></li>
                <li><a href="valoracion.php">VALORACIONES</a></li>
            </ul>
        </nav>
        <div class="logotwo">
            <?php 
            session_start();
            if (isset($_SESSION['usuario'])) {
                echo '<div class="user-info" id="usuario-logueado">
                    <img src="../Images/login(1).png" alt="Foto de usuario" class="user-icon"> 
                    <span class="username">' . htmlspecialchars($_SESSION['usuario']) . '</span>
                    <a href="../Php/cerrar_sesion.php">
                        <img src="../Images/logout.png" class="cerrasesion">
                    </a>
                </div>';
            } else {
                echo '<a href="inicio_registro.php">
                        <img src="../Images/login(1).png" alt="login"> 
                      </a>';
            }
            ?>
        </div>
        <a class="btn" href="contacto.php"><button>CONTACTO</button></a>
    </header>
    
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
    
    <video width="1920" height="1080" autoplay muted loop>
        <source src="../Images/iz3home.mp4" type="video/mp4">
    </video>

    <section id="contact" class="contact">
        <h2>CONTACTO</h2>
        <p></p>
        <form action="../Php/guardar_contacto.php" method="POST">
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="correo" placeholder="Tu correo" required>
            <textarea name="mensaje" rows="5" placeholder="Tu mensaje" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </section>

    <footer>
        <div class="separator"></div>
        <div class="footer-width-fixer">
           <div class="social-icons">
                <a href="https://open.spotify.com/artist/1hSW0fGEl6NnWyHfW1CZ95" target="_blank"><img src="../Images/spotify.png" alt="Spotify"></a>
                <a href="https://www.instagram.com/_.izaann3/" target="_blank"><img src="../Images/insta.png" alt="Instagram"></a>
                <a href="https://www.youtube.com/@_izaann3/" target="_blank"><img src="../Images/yt.png" alt="YouTube"></a>
                <a href="https://music.apple.com/us/artist/izaann3/1647839316" target="_blank"><img src="../Images/apple.png" alt="Apple Music"></a>
            </div>
            <div class="footer-links">
                <a href="terminos.php" class="footer-pages">Términos y condiciones</a>
                <span class="divider">|</span>
                <a href="politica_privacidad.php" class="footer-pages">Políticas de Privacidad</a>
                <span class="divider">|</span>
                <a href="#" class="footer-pages">Políticas de Cookies</a>
                <span class="divider">|</span>
                <a href="#" class="footer-pages">Aviso Legal</a>
            </div>
            <div class="footer-copyright">
                <p>Copyright © 2024 IZETA3 - Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
</body>

</html>
