const cards = document.querySelectorAll(".card") as NodeListOf<HTMLDivElement>;

cards.forEach((card) => {
    card.addEventListener("click", (e) => {
        const noteTitle = document.querySelector(
            `#note-title-${card.dataset.noteId}`
        ) as HTMLDivElement;
        const noteBody = document.querySelector(
            `#note-body-${card.dataset.noteId}`
        ) as HTMLDivElement;
        document.querySelector("#noteDetailsTitle")!.textContent =
            noteTitle!.textContent!;
        document.querySelector("#noteDetailsBody")!.textContent =
            noteBody!.textContent!;
        document
            .querySelector("#update-btn")!
            .setAttribute("data-note-id", card.dataset.noteId!);
        document
            .querySelector("#delete-btn")!
            .setAttribute("data-note-id", card.dataset.noteId!);
    });
});
