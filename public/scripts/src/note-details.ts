const noteDetailsTitle = document.querySelector(
    "#noteDetailsTitle"
) as HTMLDivElement;
const noteDetailsBody = document.querySelector(
    "#noteDetailsBody"
) as HTMLDivElement;
const updateBtn = document.querySelector("#update-btn") as HTMLButtonElement;
const deleteBtn = document.querySelector("#delete-btn") as HTMLButtonElement;

noteDetailsTitle.addEventListener("click", (e) => {
    if (!noteDetailsTitle.getAttribute("contentEditable")) {
        noteDetailsTitle.setAttribute("contentEditable", "true");
    }
});

noteDetailsBody.addEventListener("click", (e) => {
    if (!noteDetailsBody.getAttribute("contentEditable")) {
        noteDetailsBody.setAttribute("contentEditable", "true");
    }
});

async function updateNote(noteId: string, token: string, body: unknown) {
    const res = await fetch(`/update-note/${noteId}`, {
        method: "PATCH",
        headers: {
            "content-type": "application/json",
            credentials: "include",
            "X-CSRF-Token": token!,
        },
        body: JSON.stringify(body),
    });

    const data = await res.json();

    return data;
}

updateBtn.addEventListener("click", async (e) => {
    const noteId = updateBtn.dataset.noteId;
    const title = noteDetailsTitle.textContent!.trim();
    const body = noteDetailsBody.textContent!.trim();
    const token = noteDetailsTitle.dataset.token!;

    if (
        noteDetailsTitle.getAttribute("contentEditable") ||
        noteDetailsBody.getAttribute("contentEditable")
    ) {
        if (title.length < 1 || body.length < 1) {
            alert("title and body must have a content");
        } else {
            const data = await updateNote(noteId!, token, {
                title: title,
                body: body,
            });
            // noteDetailsBody.setAttribute("contentEditable", "false");
            window.location.reload();
        }
    }
});

deleteBtn.addEventListener("click", async (e) => {
    const noteId = deleteBtn.dataset.noteId;
    const token = noteDetailsTitle.dataset.token!;

    const res = await fetch(`/delete-note/${noteId}`, {
        method: "DELETE",
        headers: {
            "content-type": "application/json",
            credentials: "include",
            "X-CSRF-Token": token!,
        },
    });

    const data = await res.json();
    console.log(noteId);

    // window.location.reload();
});
