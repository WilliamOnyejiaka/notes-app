const toggleCheck = document.querySelector("#toggle-check") as HTMLInputElement;
const toggleCheckLabel = document.querySelector(
    "#toggle-check-label"
) as HTMLLabelElement;
const confirmPassword = document.querySelector(
    "#confirm-password"
) as HTMLInputElement;
const password = document.querySelector("#password") as HTMLInputElement;

toggleCheck.addEventListener("click", (e) => {
    if (toggleCheck.checked) {
        toggleCheckLabel.textContent = "Hide Password";
        confirmPassword.type = "text";
        password.type = "text";
    } else {
        toggleCheckLabel.textContent = "Show Password";
        confirmPassword.type = "password";
        password.type = "password";
    }
});
