function mostrarSuccess() {
    const successMessage = document.querySelector('.alert-message.success');
    successMessage.style.display = 'block';
    successMessage.style.opacity = 1;

    setTimeout(function() {
        successMessage.style.transition = 'opacity 1s ease-out';
        successMessage.style.opacity = 0;

        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 1000);
    }, 5000);
}

window.onload = function() {
    if (document.querySelector('.alert-message.success')) {
        mostrarSuccess();
    }
};
