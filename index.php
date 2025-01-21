<?php
session_start();

require 'include.php';

if (isset($_SESSION['usuario']) && !isset($_SESSION['popup_mostrado'])) {
    $_SESSION['popup_mostrado'] = true; 
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IZETA3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="Images/ha.png" type="image/png">
    <script defer src="js/gotop.js"></script>
    <script src="js/scroll.js" defer></script>
    <script src="js/subscribe.js" defer></script>
    <script src="js/scroll_header.js" defer></script>
    <script src="js/popup.js" defer></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="Images/ha.png" alt="Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="/index.php">INICIO</a></li>
                <li><a href="#music">MÚSICA</a></li>
                <li><a href="Html/valoracion.php">VALORACIONES</a></li>
            </ul>            
        </nav>
        <div class="logotwo">
            <?php 
            session_start();
            if (isset($_SESSION['usuario'])) {
                echo '<div class="user-info" id="usuario-logueado">
                    <img src="Images/login(1).png" alt="Foto de usuario" class="user-icon"> 
                    <span class="username">' . htmlspecialchars($_SESSION['usuario']) . '</span>
                    <a href="Php/cerrar_sesion.php">
                        <img src="Images/logout.png" class="cerrasesion">
                    </a>
                </div>';
            } else {
                echo '<a href="Html/inicio_registro.php">
                        <img src="Images/login(1).png" alt="login"> 
                      </a>';
            }
            ?>
        </div>
        <a class="btn" href="Html/contacto.php"><button>CONTACTO</button></a>
    </header>

    <div id="popup" class="popup" style="display: none;">
        <div class="popup-content">
            <button class="close-btn" onclick="cerrarPopup()">&times;</button>
            <h2>¡AHORA YA ERES UN VERDADERO FAN!</h2>
            <p>Como usuario registrado, te dejamos una pequeña preview de su proximo lanzamiento.</p>
            <a href="Php/descargar_recompensa.php" class="download-btn">DESCARGAR</a>
        </div>
    </div>

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

    <div class="go-top-container">
        <div class="go-top-button">
            <i class="fas fa-chevron-up"></i>
        </div>
    </div>

    <div class="carousel">
        <div class="carousel-slide active">
            <div class="carousel-content">
                <img class="background-image" src="Images/unnamed.jpg" alt="Imagen de fondo">
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-content"></div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-content"></div>
        </div>
    </div>

    <div class="youtube-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/e3_kpaVrAX4?si=1_o2Jfv1_vVEXhob"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <div id="music">
        <div class="iframe-container">
            <iframe style="border-radius:12px"
                src="https://open.spotify.com/embed/artist/1hSW0fGEl6NnWyHfW1CZ95?utm_source=generator" width="100%"
                height="176" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
     
    <div class="newsletter-container">
        <input type="email" id="email" placeholder="Suscríbete a nuestra newsletter" class="email-input">
        <button class="subscribe-btn" onclick="subscribe()">Suscribir</button>
        <div id="success-message" class="success-message"></div> 
    </div>

    <footer>
        <div class="separator"></div>
        <div class="footer-width-fixer">
            <div class="social-icons">
                <a href="https://open.spotify.com/artist/1hSW0fGEl6NnWyHfW1CZ95" target="_blank"><img src="Images/spotify.png" alt="Spotify"></a>
                <a href="https://www.instagram.com/_.izaann3/" target="_blank"><img src="Images/insta.png" alt="Instagram"></a>
                <a href="https://www.youtube.com/@_izaann3/" target="_blank"><img src="Images/yt.png" alt="YouTube"></a>
                <a href="https://music.apple.com/us/artist/izaann3/1647839316" target="_blank"><img src="Images/apple.png" alt="Apple Music"></a>
            </div>
            <div class="footer-links">
                <a href="Html/terminos.php" class="footer-pages">Términos y condiciones</a>
                <span class="divider">|</span>
                <a href="Html/politica_privacidad.php" class="footer-pages">Políticas de Privacidad</a>
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

