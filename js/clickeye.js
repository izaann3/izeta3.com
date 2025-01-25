function togglePasswordVisibility() {
    const passwordField = document.getElementById("contraseña");
    const passwordIcon = document.querySelector(".toggle-password img");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.src = "../Images/eye_hidden.png";
    } else {
        passwordField.type = "password";
        passwordIcon.src = "../Images/eye_visible.png";
    }
}
