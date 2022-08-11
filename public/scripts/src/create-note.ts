const createNoteForm = document.querySelector(
    "#createNoteForm"
) as HTMLFormElement;
const title = document.querySelector("#title") as HTMLInputElement;
const body = document.querySelector("#body") as HTMLInputElement;
const titleAlert = document.querySelector("#titleAlert") as HTMLDivElement;
const bodyAlert = document.querySelector("#bodyAlert") as HTMLDivElement;
const errorAlert = document.querySelector("#errorAlert") as HTMLDivElement;
const createCloseBtns = document.querySelectorAll(".create-close");

createNoteForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    title.value.length == 0 && (titleAlert.style.display = "block");
    body.value.length == 0 && (bodyAlert.style.display = "block");

    if (title.value.length > 0 && body.value.length > 0) {
        const token:string = createNoteForm.dataset.token!;
        const res = await fetch("/create-note", {
            method: "POST",
            headers: {
                "content-type": "application/json",
                credentials: "include",
                "X-CSRF-Token": token,
            },
            body: JSON.stringify({
                title: title.value,
                body: body.value,
            }),
        });
        const data = await res.json();

        if(data.error == true) {
            errorAlert.style.display = "block";
        }else {
            window.location.reload();
        }
    }
});

createCloseBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const alertDiv = (e.currentTarget as Element).closest(
            ".alert"
        ) as HTMLDivElement;
        alertDiv.style.display = "none";
    });
});
