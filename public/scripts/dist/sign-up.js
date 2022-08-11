"use strict";
const toggleCheck = document.querySelector("#toggle-check");
const toggleCheckLabel = document.querySelector("#toggle-check-label");
const confirmPassword = document.querySelector("#confirm-password");
const password = document.querySelector("#password");
toggleCheck.addEventListener("click", (e) => {
    if (toggleCheck.checked) {
        toggleCheckLabel.textContent = "Hide Password";
        confirmPassword.type = "text";
        password.type = "text";
    }
    else {
        toggleCheckLabel.textContent = "Show Password";
        confirmPassword.type = "password";
        password.type = "password";
    }
});
