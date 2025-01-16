function subscribe() {
  const email = document.getElementById("email").value;

  if (email === "") {
    alert("Por favor, ingresa un correo electrónico.");
    return;
  }

  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailPattern.test(email)) {
    alert("Por favor, ingresa un correo electrónico válido.");
    return;
  }
  
  fetch('guardar_newsletter.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({ email: email })
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error en la respuesta del servidor');
    }
    return response.text();
  })
  .then(data => {
    const successMessage = document.getElementById("success-message");
    successMessage.textContent = "¡Te has suscrito correctamente!";
    successMessage.classList.add("show");

    document.getElementById("email").value = "";

    setTimeout(() => {
      successMessage.classList.remove("show");
    }, 4000);
  })
  .catch(error => {
    console.error('Hubo un problema con la solicitud Fetch:', error);
    alert("Hubo un problema al procesar tu suscripción. Por favor, inténtalo de nuevo.");
  });
}


