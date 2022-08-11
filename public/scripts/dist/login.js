"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const loginPassword = document.querySelector("#password");
const loginToggleCheck = document.querySelector("#toggle-check");
const loginToggleCheckLabel = document.querySelector("#toggle-check-label");
const loginEmail = document.querySelector("#email");
const loginForm = document.querySelector("#login-form");
const emailAlert = document.querySelector("#email-alert");
const passwordAlert = document.querySelector("#password-alert");
document.querySelector("#email-alert-btn").addEventListener("click", (e) => {
    emailAlert.style.display = "none";
});
document
    .querySelector("#password-alert-btn")
    .addEventListener("click", (e) => {
    passwordAlert.style.display = "none";
});
loginToggleCheck.addEventListener("click", (e) => {
    if (loginToggleCheck.checked) {
        loginToggleCheckLabel.textContent = "Hide Password";
        loginPassword.type = "text";
    }
    else {
        loginToggleCheckLabel.textContent = "Show Password";
        loginPassword.type = "password";
    }
});
loginForm.addEventListener("submit", (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const email = loginEmail.value;
    const password = loginPassword.value;
    const token = loginForm.dataset.token;
    const res = yield fetch("/login/loginAuth", {
        method: "POST",
        headers: {
            "content-type": "application/json",
            credentials: "include",
            "X-CSRF-Token": token,
        },
        body: JSON.stringify({
            email: email,
            password: password,
        }),
    });
    const status = yield res.status;
    const data = yield res.json();
    console.log(data.message);
    if (status != 200) {
        const message = data.message;
        message == "invalid email" && (emailAlert.style.display = "block");
        message == "invalid password" &&
            (passwordAlert.style.display = "block");
    }
    else {
        window.location.href = '/home';
    }
}));
