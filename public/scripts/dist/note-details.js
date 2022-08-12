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
const noteDetailsTitle = document.querySelector("#noteDetailsTitle");
const noteDetailsBody = document.querySelector("#noteDetailsBody");
const updateBtn = document.querySelector("#update-btn");
const deleteBtn = document.querySelector("#delete-btn");
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
function updateNote(noteId, token, body) {
    return __awaiter(this, void 0, void 0, function* () {
        const res = yield fetch(`/update-note/${noteId}`, {
            method: "PATCH",
            headers: {
                "content-type": "application/json",
                credentials: "include",
                "X-CSRF-Token": token,
            },
            body: JSON.stringify(body),
        });
        const data = yield res.json();
        return data;
    });
}
updateBtn.addEventListener("click", (e) => __awaiter(void 0, void 0, void 0, function* () {
    const noteId = updateBtn.dataset.noteId;
    const title = noteDetailsTitle.textContent.trim();
    const body = noteDetailsBody.textContent.trim();
    const token = noteDetailsTitle.dataset.token;
    if (noteDetailsTitle.getAttribute("contentEditable") ||
        noteDetailsBody.getAttribute("contentEditable")) {
        if (title.length < 1 || body.length < 1) {
            alert("title and body must have a content");
        }
        else {
            const data = yield updateNote(noteId, token, {
                title: title,
                body: body,
            });
            // noteDetailsBody.setAttribute("contentEditable", "false");
            window.location.reload();
        }
    }
}));
deleteBtn.addEventListener("click", (e) => __awaiter(void 0, void 0, void 0, function* () {
    const noteId = deleteBtn.dataset.noteId;
    const token = noteDetailsTitle.dataset.token;
    const res = yield fetch(`/delete-note/${noteId}`, {
        method: "DELETE",
        headers: {
            "content-type": "application/json",
            credentials: "include",
            "X-CSRF-Token": token,
        },
    });
    const data = yield res.json();
    console.log(noteId);
    // window.location.reload();
}));
