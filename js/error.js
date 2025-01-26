function mostrarMensaje(tipo) {
    const mensaje = document.querySelector(`.alert-message.${tipo}`);
    mensaje.style.display = 'block';
    mensaje.style.opacity = 1;

    setTimeout(function() {
        mensaje.style.transition = 'opacity 1s ease-out';
        mensaje.style.opacity = 0;

        setTimeout(function() {
            mensaje.style.display = 'none';
        }, 1000);
    }, 5000);
}

window.onload = function() {
    if (document.querySelector('.alert-message.error')) {
        mostrarMensaje('error');
    }
    if (document.querySelector('.alert-message.succes')) {
        mostrarMensaje('succes');
    }
};
