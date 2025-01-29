window.onload = function() {
    console.log("Verificando si el popup ya fue mostrado...");

    if (document.getElementById('usuario-logueado') && !localStorage.getItem('popup_mostrado')) {
        console.log("El popup no ha sido mostrado aún. Mostrando popup...");

        document.getElementById('popup').style.display = 'flex';
        document.getElementById('popup-overlay').style.display = 'block';

        localStorage.setItem('popup_mostrado', 'true');
        console.log("Popup mostrado y almacenado en localStorage.");
    } else {
        console.log("El popup ya se ha mostrado o el usuario no está logueado.");
    }
}

function cerrarPopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('popup-overlay').style.display = 'none';
}

