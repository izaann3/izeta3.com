<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Privacidad - IZETA3</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2 family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/principal.css">
    <script defer src="../js/gotop.js"></script>
    <script src="../js/scroll.js" defer></script>
    <script src="../js/subscribe.js" defer></script>
    <script src="../js/scroll_header.js" defer></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../Images/ha.png">
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

    <div class="carousel">
        <div class="carousel-slide active">
            <div class="carousel-content">
                <img class="background-image" src="../Images/unnamed.jpg" alt="Description of Image">
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-content">
            </div>
        </div>
        <div class="carousel-slide">
            <div class="carousel-content">
            </div>
        </div>
    </div>

    <section id="politica_privacidad">
	<h1 class="main-title">POLÍTICA DE PRIVACIDAD</h1>

    <p class="section-text">This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service.</p>
    
    <p class="section-text">If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.</p>

    <h2 class="section-title">Information Collection and Use</h2>
    
    <p class="section-text">For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.</p>

    <h2 class="section-title">Log Data</h2>
    
    <p class="section-text">We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer’s Internet Protocol (“IP”) address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>

    <h2 class="section-title">Cookies</h2>
    
    <p class="section-text">Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer’s hard drive.</p>

    <p class="section-text">Our website uses these “cookies” to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.</p>

    <h2 class="section-title">Service Providers</h2>
    
    <p class="section-text">We may employ third-party companies and individuals due to the following reasons:</p>

    <ul class="section-text">
        <li>To facilitate our Service;</li>
        <li>To provide the Service on our behalf;</li>
        <li>To perform Service-related services; or</li>
        <li>To assist us in analyzing how our Service is used.</li>
    </ul>

    <p class="section-text">We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>

    <h2 class="section-title">Security</h2>
    
    <p class="section-text">We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>

    <h2 class="section-title">Links to Other Sites</h2>
    
    <p class="section-text">Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>

    <h2 class="section-title">Children’s Privacy</h2>
    
    <p class="section-text">Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.</p>

    <h2 class="section-title">Changes to This Privacy Policy</h2>
    
    <p class="section-text">We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately after they are posted on this page.</p>
    
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
