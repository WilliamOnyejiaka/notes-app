const loginPassword = document.querySelector("#password") as HTMLInputElement;
const loginToggleCheck = document.querySelector(
    "#toggle-check"
) as HTMLInputElement;
const loginToggleCheckLabel = document.querySelector(
    "#toggle-check-label"
) as HTMLLabelElement;
const loginEmail = document.querySelector("#email") as HTMLInputElement;
const loginForm = document.querySelector("#login-form") as HTMLFormElement;
const emailAlert = document.querySelector("#email-alert") as HTMLDivElement;
const passwordAlert = document.querySelector(
    "#password-alert"
) as HTMLDivElement;

document.querySelector("#email-alert-btn")!.addEventListener("click", (e) => {
    emailAlert.style.display = "none";
});

document
    .querySelector("#password-alert-btn")!
    .addEventListener("click", (e) => {
        passwordAlert.style.display = "none";
    });

loginToggleCheck.addEventListener("click", (e) => {
    if (loginToggleCheck.checked) {
        loginToggleCheckLabel.textContent = "Hide Password";
        loginPassword.type = "text";
    } else {
        loginToggleCheckLabel.textContent = "Show Password";
        loginPassword.type = "password";
    }
});

loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email: string = loginEmail.value;
    const password: string = loginPassword.value;
    const token: string = loginForm.dataset.token!;

    const res = await fetch("/login/loginAuth", {
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

    const status: Number = await res.status;
    const data = await res.json();

    console.log(data.message);
    
    if (status != 200) {
        const message: string = data.message;
        message == "invalid email" && (emailAlert.style.display = "block");

        message == "invalid password" &&
            (passwordAlert.style.display = "block");
    } else {
        window.location.href = '/home';
    }
});
