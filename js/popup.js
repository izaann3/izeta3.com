window.onload = function() {
    // Verifica si el popup ya ha sido mostrado en la sesión de PHP
    <?php if (isset($_SESSION['popup_mostrado'])): ?>
        console.log("El popup ya se mostró en esta sesión.");
    <?php else: ?>
        // Muestra el popup si no se ha mostrado en esta sesión
        if (document.getElementById('usuario-logueado')) {
            document.getElementById('popup').style.display = 'flex';
            document.getElementById('popup-overlay').style.display = 'block';
        }
    <?php endif; ?>
}

// Función para cerrar el popup
function cerrarPopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('popup-overlay').style.display = 'none';
}

