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
  const successMessage = document.getElementById("success-message");
  successMessage.textContent = "Te has suscrito correctamente!";
  successMessage.classList.add("show");
  document.getElementById("email").value = "";
  setTimeout(function() {
    successMessage.classList.remove("show");
  }, 4000);
}
