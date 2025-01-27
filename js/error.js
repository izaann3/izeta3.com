function mostrarError() {
    const errorMessage = document.querySelector('.alert-message.error');
    errorMessage.style.display = 'block';
    errorMessage.style.opacity = 1;

    setTimeout(function() {
        errorMessage.style.transition = 'opacity 1s ease-out';
        errorMessage.style.opacity = 0;

        setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 1000);
    }, 5000);
}

window.onload = function() {
    if (document.querySelector('.alert-message.error')) {
        mostrarError();
    }
};
