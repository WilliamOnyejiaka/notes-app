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
const createNoteForm = document.querySelector("#createNoteForm");
const title = document.querySelector("#title");
const body = document.querySelector("#body");
const titleAlert = document.querySelector("#titleAlert");
const bodyAlert = document.querySelector("#bodyAlert");
const errorAlert = document.querySelector("#errorAlert");
const createCloseBtns = document.querySelectorAll(".create-close");
createNoteForm.addEventListener("submit", (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    title.value.length == 0 && (titleAlert.style.display = "block");
    body.value.length == 0 && (bodyAlert.style.display = "block");
    if (title.value.length > 0 && body.value.length > 0) {
        const token = createNoteForm.dataset.token;
        const res = yield fetch("/create-note", {
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
        const data = yield res.json();
        if (data.error == true) {
            errorAlert.style.display = "block";
        }
        else {
            window.location.reload();
        }
    }
}));
createCloseBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const alertDiv = e.currentTarget.closest(".alert");
        alertDiv.style.display = "none";
    });
});
