<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - IZETA3</title>
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

    <video autoplay muted loop id="background-video">
        <source src="../Images/iz3home.mp4" type="video/mp4">
    </video>

    <section id="terms_conditions">
        <h1 class="main-title">TERMINOS Y CONDICIONES</h1>

        <p class="section-text">By accessing or using this website and its services, you agree to comply with these Terms and Conditions. If you do not agree to these terms, we advise you not to use our services.</p>

        <h2 class="section-title">Use of the Service</h2>
        <p class="section-text">By using this website, you agree to comply with all applicable local, national, and international laws and regulations. Access to certain content, such as music and reviews, may be restricted based on region and subscription type.</p>

        <h2 class="section-title">Intellectual Property</h2>
        <p class="section-text">All content available on this site, including but not limited to logos, images, music, and text, is protected by copyright and other intellectual property laws. You may not reproduce, distribute, or use any of this material without explicit permission from IZETA3.</p>

        <h2 class="section-title">User-Generated Content</h2>
        <p class="section-text">If you choose to upload, post, or share content on the website (e.g., comments or reviews), you grant IZETA3 a non-exclusive, transferable, sublicensable, and royalty-free license to use, modify, publish, and distribute such content in connection with IZETA3's services.</p>

        <h2 class="section-title">Liability</h2>
        <p class="section-text">IZETA3 shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages arising from the use or inability to use this website, including but not limited to data or profit loss, even if IZETA3 has been advised of the possibility of such damages.</p>

        <h2 class="section-title">Changes to the Terms</h2>
        <p class="section-text">IZETA3 reserves the right to modify these Terms and Conditions at any time. Changes will take effect immediately upon being posted on this website. We encourage you to review this page periodically for any updates.</p>

        <h2 class="section-title">Third-Party Links</h2>
        <p class="section-text">This website may contain links to third-party sites. If you click on a third-party link, you will be directed to that site. Please note that these external sites are not operated by us. We strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of third-party sites or services.</p>

        <h2 class="section-title">Termination</h2>
        <p class="section-text">We may suspend or terminate your access to the website if you violate these Terms and Conditions. In the event of termination, all provisions of these Terms and Conditions that, by their nature, should survive (such as intellectual property provisions and liability limitations) will continue to apply.</p>

        <h2 class="section-title">Governing Law</h2>
        <p class="section-text">These Terms and Conditions will be governed by and construed in accordance with the laws of the country in which IZETA3 operates. Any disputes arising out of the use of this website will be resolved by the competent courts in that jurisdiction.</p>
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
